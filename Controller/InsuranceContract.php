<?php


class InsuranceContract extends Controller implements ControllerModel
{
    public static function start($file)
    {
        $insurances = InsuranceContractModel::getAll();
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