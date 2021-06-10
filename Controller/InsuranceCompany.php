<?php


class InsuranceCompany extends Controller implements ControllerModel
{

    public static function start($file)
    {
        $insurances = InsuranceCompanyModel::getAll();
        require_once($file);
    }

    /**
     * @return array|false
     */
    public static function getAll()
    {
        return InsuranceCompanyModel::getAll();
    }

    /**
     * @param $id
     * @return false|InsuranceCompanyModel|mixed
     */
    public static function getById($id)
    {
        if ($id) {
            return InsuranceCompanyModel::getById($id);
        }
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