<?php


class DamageCase extends Controller implements ControllerModel
{

    public static function start($file)
    {
        $damageList = DamageCaseModel::getAll();
        require_once($file);
    }

    public static function getAll()
    {
        return DamageCaseModel::getAll();
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