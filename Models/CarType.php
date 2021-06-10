<?php


class CarTypeModel extends Db implements Model
{
    public $id;
    public $name;
    public $manufacturerID;

    /**
     * CarTypeModel constructor.
     * @param $id
     * @param $name
     * @param $manufacturerID
     */
    public function __construct($id, $name, $manufacturerID)
    {
        $this->id = $id;
        $this->name = $name;
        $this->manufacturerID = $manufacturerID;
    }

    public static function getById($id)
    {
        $carTypes = [];

        $result = self::query("SELECT * FROM Fahrzeugtyp WHERE id = " . $id);
        if (!empty($result)) {
            foreach ($result as $carType) {
                $carTypes[] = new CarTypeModel(
                    $carType[0],
                    $carType[1],
                    $carType[2]
                );
            }
        }

        if (!empty($carTypes)) {
            return $carTypes[0];
        }

        return false;
    }


    public static function getAll()
    {
        // TODO: Implement getAll() method.
    }

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