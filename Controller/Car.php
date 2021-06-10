<?php


class Car extends Controller implements ControllerModel
{

    /**
     * @return array|false
     */
    public static function getAll()
    {
        return CarModel::getAll();
    }

    public static function start($file)
    {
        $carList = CarModel::getAll();
        require_once($file);
    }

    /**
     * @param $file
     * @param array $post
     */
    public static function create($file, array $post)
    {
        // TODO: Implement create() method.
    }

    /**
     * @param $file
     * @param array $post
     */
    public static function delete($file, array $post)
    {
        // TODO: Implement delete() method.
    }

    /**
     * @param $file
     * @param array $post
     */
    public static function update($file, array $post)
    {
        // TODO: Implement update() method.
    }
}