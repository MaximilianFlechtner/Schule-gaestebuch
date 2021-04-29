<?php
require_once('db_config.php');
require_once('config.php');

error_reporting(E_ALL);
spl_autoload_register(function ($class_name) {
    if (file_exists('classes/' . $class_name . '.php')) {
        require_once('classes/' . $class_name . '.php');
    }
    if (file_exists('Controller/' . $class_name . '.php')) {
        require_once('Controller/' . $class_name . '.php');
    }

});

require_once('classes/Validation.php');
require_once('Routes.php');
?>
