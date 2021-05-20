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
     * Custom Router for normal Routes
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

    /**
     * Custom Router for api Routes
     * @param $route
     * @param $function
     */
    public static function setApi($route, $function)
    {
        self::$validRoutes[] = 'api/' . $route;
        if ($_GET['url'] == 'api/' . $route) {
            $function->__invoke();
        }
    }

    /**
     * Default route (404 Page)
     */
    public static function def() {
        if (!in_array($_GET['url'], self::$validRoutes)) {
            Controller::CreateView('404');
        }
    }
}

?>
