<?php

class Validator {

    protected $messages = array();
    protected $errors = array();
    protected $rules = array();
    protected $fields = array();
    protected $functions = array();
    protected $arguments = array();
    protected $filters = array();
    protected $data = null;
    protected $validData = array();

    /**
     * Constructor.
     * Define values to validate.
     *
     * @param array $data
     */
    function __construct(array $data = null) {
        if (!empty($data)) $this->setData($data);
    }

    /**
     * set the data to be validated
     *
     * @access public
     * @param mixed $data
     * @return FormValidator
     */
    public function setData(array $data) {
        $this->data = $data;
        return $this;
    }


    /**
     * Field, if completed, has to be a valid email address.
     *
     * @param string $message
     * @return FormValidator
     */
    public function email($message = null) {
        $this->setRule(__FUNCTION__, function($email) {
            if (strlen($email) == 0) return true;
            $isValid = true;
            $atIndex = strrpos($email, '@');
            if (is_bool($atIndex) && !$atIndex) {
                $isValid = false;
            } else {
                $domain = substr($email, $atIndex+1);
                $local = substr($email, 0, $atIndex);
                $localLen = strlen($local);
                $domainLen = strlen($domain);
                if ($localLen < 1 || $localLen > 64) {
                    $isValid = false;
                } else if ($domainLen < 1 || $domainLen > 255) {
                    // domain part length exceeded
                    $isValid = false;
                } else if ($local[0] == '.' || $local[$localLen-1] == '.') {
                    // local part starts or ends with '.'
                    $isValid = false;
                } else if (preg_match('/\\.\\./', $local)) {
                    // local part has two consecutive dots
                    $isValid = false;
                } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
                    // character not valid in domain part
                    $isValid = false;
                } else if (preg_match('/\\.\\./', $domain)) {
                    // domain part has two consecutive dots
                    $isValid = false;
                } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))) {
                    // character not valid in local part unless
                    // local part is quoted
                    if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
                        $isValid = false;
                    }
                }
                // check DNS
                if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
                    $isValid = false;
                }
            }
            return $isValid;
        }, $message);
        return $this;
    }

    /**
     * Field must be filled in.
     *
     * @param string $message
     * @return FormValidator
     */
    public function required($message = null) {
        $this->setRule(__FUNCTION__, function($val) {
            if (is_scalar($val)) {
                $val = trim($val);
            }
            return !empty($val);
        }, $message);
        return $this;
    }


    /**
     * Field has to be valid internet address.
     *
     * @param string $message
     * @return FormValidator
     */
    public function url($message = null) {
        $this->setRule(__FUNCTION__, function($val) {
            return (strlen(trim($val)) === 0 || filter_var($val, FILTER_VALIDATE_URL) !== FALSE);
        }, $message);
        return $this;
    }

    /**
     * Date format.
     *
     * @return string
     */
    protected function _getDefaultDateFormat() {
        return 'd/m/Y';
    }

    /**
     * callback
     * @param   string  $name
     * @param   mixed   $function
     * @param   string  $message
     * @param   mixed   $params
     * @return  FormValidator
     */
    public function callback($callback, $message = '', $params = array()) {
        if (is_callable($callback)) {

            // If an array is callable, it is a method
            if (is_array($callback)) {
                $func = new ReflectionMethod($callback[0], $callback[1]);
            } else {
                $func = new ReflectionFunction($callback);
            }

            if (!empty($func)) {
                // needs a unique name to avoild collisions in the rules array
                $name = 'callback_' . sha1(uniqid());
                $this->setRule($name, function($value) use ($func, $params, $callback) {
                    // Creates merged arguments array with validation target as first argument
                    $args = array_merge(array($value), (is_array($params) ? $params : array($params)));
                    if (is_array($callback)) {
                        // If callback is a method, the object must be the first argument
                        return $func->invokeArgs($callback[0], $args);
                    } else {
                        return $func->invokeArgs($args);
                    }
                }, $message, $params);
            }

        } else {
            throw new Exception(sprintf('%s is not callable.', $function));
        }

        return $this;
    }

    // ------------------ PRE VALIDATION FILTERING -------------------
    /**
     * add a filter callback for the data
     *
     * @param mixed $callback
     * @return FormValidator
     */
    public function filter($callback) {
        if(is_callable($callback)) {
            $this->filters[] = $callback;
        }

        return $this;
    }

    /**
     * applies filters based on a data key
     *
     * @access protected
     * @param string $key
     * @return void
     */
    protected function _applyFilters($key) {
        $this->_applyFilter($this->data[$key]);
    }

    /**
     * recursively apply filters to a value
     *
     * @access protected
     * @param mixed $val reference
     * @return void
     */
    protected function _applyFilter(&$val) {
        if (is_array($val)) {
            foreach($val as $key => &$item) {
                $this->_applyFilter($item);
            }
        } else {
            foreach($this->filters as $filter) {
                $val = $filter($val);
            }
        }
    }

    /**
     * validate
     * @param string $key
     * @param string $label
     * @return bool
     */
    public function validate($key, $recursive = false, $label = '', $htmlSpecial = true) {
        // set up field name for error message
        $this->fields[$key] = (empty($label)) ? 'Field with the name of "' . $key . '"' : $label;

        // apply filters to the data
        $this->_applyFilters($key);

        $val = $this->_getVal($key);

        // validate the piece of data
        $this->_validate($key, $val, $recursive, $htmlSpecial);

        // reset rules
        $this->rules = array();
        $this->filters = array();
        return $val;
    }

    /**
     * recursively validates a value
     *
     * @access protected
     * @param string $key
     * @param mixed $val
     * @return bool
     */
    protected function _validate($key, $val, $recursive = false, $htmlSpecial = true)
    {
        if ($recursive && is_array($val)) {
            // run validations on each element of the array
            foreach($val as $index => $item) {
                if (!$this->_validate($key, $item, $recursive)) {
                    // halt validation for this value.
                    return FALSE;
                }
            }
            return TRUE;

        } else {

            // try each rule function
            foreach ($this->rules as $rule => $is_true) {
                if ($is_true) {
                    $function = $this->functions[$rule];
                    $args = $this->arguments[$rule]; // Arguments of rule

                    $valid = (empty($args)) ? $function($val) : $function($val, $args);

                    if ($valid === FALSE) {
                        $this->registerError($rule, $key);

                        $this->rules = array();  // reset rules
                        $this->filters = array();
                        return FALSE;
                    }
                }
            }

            $val = strip_tags($val);
            if ($htmlSpecial) {
                $val = htmlspecialchars($val);
            }

            $this->validData[$key] = $val;
            return TRUE;
        }
    }

    /**
     * Whether errors have been found.
     *
     * @return bool
     */
    public function hasErrors() {
        return (count($this->errors) > 0);
    }

    /**
     * Get specific error.
     *
     * @param string $field
     * @return string
     */
    public function getError($field) {
        return $this->errors[$field];
    }

    /**
     * Get all errors.
     *
     * @return array
     */
    public function getAllErrors($keys = true) {
        return ($keys == true) ? $this->errors : array_values($this->errors);
    }

    public function getValidData()
    {
        return $this->validData;
    }

    /**
     * _getVal with added support for retrieving values from numeric and
     * associative multi-dimensional arrays. When doing so, use DOT notation
     * to indicate a break in keys, i.e.:
     *
     * key = "one.two.three"
     *
     * would search the array:
     *
     * array('one' => array(
     *      'two' => array(
     *          'three' => 'RETURN THIS'
     *      )
     * );
     *
     * @param string $key
     * @return mixed
     */
    protected function _getVal($key) {
        // handle multi-dimensional arrays
        if (strpos($key, '.') !== FALSE) {
            $arrData = NULL;
            $keys = explode('.', $key);
            $keyLen = count($keys);
            for ($i = 0; $i < $keyLen; ++$i) {
                if (trim($keys[$i]) == '') {
                    return false;
                } else {
                    if (is_null($arrData)) {
                        if (!isset($this->data[$keys[$i]])) {
                            return false;
                        }
                        $arrData = $this->data[$keys[$i]];
                    } else {
                        if (!isset($arrData[$keys[$i]])) {
                            return false;
                        }
                        $arrData = $arrData[$keys[$i]];
                    }
                }
            }
            return $arrData;
        } else {
            return (isset($this->data[$key])) ? $this->data[$key] : FALSE;
        }
    }

    /**
     * Register error.
     *
     * @param string $rule
     * @param string $key
     * @param string $message
     */
    protected function registerError($rule, $key, $message = null) {
        if (empty($message)) {
            $message = $this->messages[$rule];
        }

        $this->errors[$key] = sprintf($message, $this->fields[$key]);
    }


    /**
     * Set rule.
     *
     * @param string $rule
     * @param closure $function
     * @param string $message
     * @param array $args
     */
    public function setRule($rule, $function, $message = '', $args = array()) {
        if (!array_key_exists($rule, $this->rules)) {
            $this->rules[$rule] = TRUE;
            if (!array_key_exists($rule, $this->functions)) {
                if (!is_callable($function)) {
                    die('Invalid function for rule: ' . $rule);
                }
                $this->functions[$rule] = $function;
            }
            $this->arguments[$rule] = $args; // Specific arguments for rule

            $this->messages[$rule] = (empty($message)) ? '' : $message;
        }
    }

}
