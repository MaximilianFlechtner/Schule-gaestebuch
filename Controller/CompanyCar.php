<?php


class CompanyCar extends Controller implements ControllerModel
{

    public static function getAll()
    {
        return CompanyCarModel::getAll();
    }

    public static function getById($id)
    {
        if ($id) {
            return CompanyCarModel::getByField($id, 'id');
        }

        return false;
    }

    public static function getByStaff($id)
    {
        if ($id) {
            return CompanyCarModel::getByField($id, 'Mitarbeiter_ID');
        }

        return false;
    }

    public static function start($file)
    {
        $carList = CompanyCarModel::getAll();
        require_once($file);
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