<?php


class CarManufacturer extends Controller implements ControllerModel
{

    public static function getById($id)
    {
        if($id) {
            return CarManufacturerModel::getById($id);
        }

        return false;
    }

    public static function create($file, array $post)
    {
        // TODO: Implement create() method.
    }

    public static function delete($file, array $post)
    {
        // TODO: Implement delete() method.
    }

    public static function update($file, array $post)
    {
        // TODO: Implement update() method.
    }
}