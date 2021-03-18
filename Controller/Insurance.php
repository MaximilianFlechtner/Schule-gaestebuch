<?php

class Insurance extends Controller
{

    public static function start($file)
    {
        $insurances = InsuranceModel::getAll();
        require_once($file);
    }

    public static function create($file, array $post)
    {
        require_once($file);
    }

    public static function delete($file, array $post)
    {
    }

}

?>
