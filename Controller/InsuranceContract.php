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
        if (isset($post) && !empty($post)) {
            $insuranceContract = new InsuranceContractModel(
                '',
                $post['tech-vertragsnummer'],
                $post['tech-abschlussdatum'],
                $post['tech-art'],
                $post['tech-mitarbeiter'],
                $post['tech-fahrzeug'],
                $post['tech-versicherungsnehmer']
            );
            $insuranceContract->create();
        }

        require_once($file);
    }

    public static function delete($file, array $post)
    {
        if (!empty($post) && $post['tech-model-id']) {
            InsuranceContractModel::delete($post['tech-model-id']);
        }

        $insurances = InsuranceContractModel::getAll();
        require_once($file);
    }

    public static function update($file, array $post)
    {
        // TODO: Implement update() method.
    }
}