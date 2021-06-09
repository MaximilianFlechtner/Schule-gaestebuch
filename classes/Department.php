<?php


/**
 * Class DepartmentModel
 */
class DepartmentModel extends Db implements Model
{
    public $id;
    public $abbreviation;
    public $name;
    public $location;


    /**
     * Department constructor.
     * @param $id
     * @param $abbreviation
     * @param $name
     * @param $location
     */
    public function __construct($id, $abbreviation, $name, $location)
    {
        $this->id = $id;
        $this->abbreviation = $abbreviation;
        $this->name = $name;
        $this->location = $location;
    }


    public static function getAll()
    {
        $departmentList = [];

        foreach (self::getAllFromDB('Abteilung') as $department) {
            $departmentList[] = new DepartmentModel(
                $department[0],
                $department[1],
                $department[2],
                $department[3]
            );
        }

        if (empty($departmentList)) return false;

        return $departmentList;
    }

    public static function getById($id)
    {
        $departmentList = [];

        $result = self::query("SELECT * FROM Abteilung WHERE id = " . $id);
        if (!empty($result)) {
            foreach ($result as $department) {
                $departmentList[] = new DepartmentModel(
                    $department[0],
                    $department[1],
                    $department[2],
                    $department[3]
                );
            }
        }

        if (!empty($departmentList)) {
            return $departmentList[0];
        }

        return false;
    }

    /**
     * Department updater.
     * @param $model DepartmentModel
     */
    public static function update($model)
    {
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }
}