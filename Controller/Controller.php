<?php

/**
 * Class Controller
 */
class Controller extends Db
{

    /**
     * @param $view_name
     */
    public static function CreateView($view_name)
    {
        include_once('templates/nav.php');
        if (file_exists("./View/$view_name.php")) {
            static::start("./View/$view_name.php");
        }
        include_once('templates/footer.php');
    }

    public static function start($file)
    {
        require_once($file);
    }

    /**
     * @param $view_name
     */
    public static function createModel($view_name)
    {
        include_once('templates/nav.php');
        if (file_exists("./View/Create/$view_name.php")) {
            static::create("./View/Create/$view_name.php", $_POST);
        }
        include_once('templates/footer.php');
    }

    /**
     * @param $view_name
     */
    public static function deleteModel($view_name)
    {
        include_once('templates/nav.php');
        if (file_exists("./View/$view_name.php")) {
            static::delete("./View/$view_name.php", $_POST);
        }
        include_once('templates/footer.php');
    }

    public static function updateModel($view_name)
    {
        include_once('templates/nav.php');
        if (file_exists("./View/$view_name.php")) {
            static::update("./View/$view_name.php", $_POST);
        }
        include_once('templates/footer.php');
    }

}

?>
