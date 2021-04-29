<?php

/**
 * Class Route
 */
class Route
{
    /**
     * @var array
     */
    public static $validRoutes = array();


    /**
     * @param $route
     * @param $function
     */
    public static function set($route, $function)
    {
        self::$validRoutes[] = $route;
        if ($_GET['url'] == $route) {
            $function->__invoke();
        }
    }

    public static function def() {
        if (!in_array($_GET['url'], self::$validRoutes)) {
            Controller::CreateView('404');
        }
    }
}

?>
