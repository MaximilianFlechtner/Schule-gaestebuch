<?php


class CarManufacturerModel extends Db implements Model
{

    public $id;
    public $name;
    public $country;

    /**
     * CarManufacturerModel constructor.
     * @param $id
     * @param $name
     * @param $country
     */
    public function __construct($id, $name, $country)
    {
        $this->id = $id;
        $this->name = $name;
        $this->country = $country;
    }

    public static function getById($id){
        $carManufacturer = [];

        $result = self::query("SELECT * FROM Fahrzeughersteller WHERE id = ". $id);
        if (!empty($result)) {
            foreach($result as $carManufacture) {
                $carManufacturer[] = new CarManufacturerModel(
                    $carManufacture[0],
                    $carManufacture[1],
                    $carManufacture[2]
                );
            }
        }

        if (!empty($carManufacturer)) {
            return $carManufacturer[0];
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