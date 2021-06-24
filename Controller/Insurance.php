<?php

class Insurance extends Controller implements ControllerModel
{

    public static function start($file)
    {
        $insurances = InsuranceModel::getAll();
        require_once($file);
    }

    public static function getAll()
    {
        return InsuranceModel::getAll();
    }

    public static function create($file, array $post)
    {
        require_once($file);
    }

    public static function delete($file, array $post)
    {
    }

    public static function update($file, array $post)
    {
        // TODO: Implement update() method.
    }
}

?>
