<?php


class Department extends Controller implements ControllerModel
{
    public static function getAll()
    {
        return DepartmentModel::getAll();
    }

    public static function getById($id) {
        if ($id) {
            return DepartmentModel::getById($id);
        }
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