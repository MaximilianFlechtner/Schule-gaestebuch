<?php


/**
 * Class InsuranceCompanyModel
 */
class InsuranceCompanyModel extends Db implements Model
{

    public $id;
    public $name;
    public $location;

    /**
     * InsuranceCompanyModel constructor.
     * @param $id
     * @param $name
     * @param $location
     */
    public function __construct($id, $name, $location)
    {
        $this->id = $id;
        $this->name = $name;
        $this->location = $location;
    }

    /**
     *
     */
    public static function getAll()
    {
        $insuranceList = [];

        foreach (self::getAllFromDB('Versicherungsgesellschaft') as $raw) {
            $insuranceList[] = new InsuranceCompanyModel(
                $raw[0],
                $raw[1],
                $raw[2]
            );
        }

        if (empty($insuranceList)) return false;

        return $insuranceList;
    }

    /**
     * @param $id
     * @return false|InsuranceCompanyModel|mixed
     */
    public static function getById($id)
    {
        $insuranceCompanyList = [];

        $result = self::query("SELECT * FROM Versicherungsgesellschaft WHERE id = " . $id);
        if (!empty($result)) {
            foreach ($result as $department) {
                $insuranceCompanyList[] = new InsuranceCompanyModel(
                    $department[0],
                    $department[1],
                    $department[2]
                );
            }
        }

        if (!empty($insuranceCompanyList)) {
            return $insuranceCompanyList[0];
        }

        return false;
    }

    /**
     * @param $model
     */
    public static function update($model)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     */
    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    /**
     *
     */
    public function create()
    {
        self::insert(
            'Versicherungsgesellschaft',
            ['Bezeichnung', 'Ort'],
            [$this->name, $this->location]
        );
    }
}