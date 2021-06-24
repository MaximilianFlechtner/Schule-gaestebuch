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
        if (isset($post) && !empty($post)) {
            $insuranceCompany = new InsuranceCompanyModel(
                '',
                $post['tech-name'],
                $post['tech-location']
            );
            $insuranceCompany->create();
        }

        require_once($file);
    }

    /**
     * @param $file
     * @param array $post
     */
    public static function delete($file, array $post)
    {
        if (!empty($post) && $post['tech-model-id']) {
            InsuranceCompanyModel::delete($post['tech-model-id']);
        }

        $insurances = InsuranceCompanyModel::getAll();
        require_once($file);
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