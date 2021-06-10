<?php


class CarModel extends Db implements Model
{
    public $id;
    public $Kennzeichen;
    public $Farbe;
    public $Fahrzeugtyp_ID;

    /**
     * CarModel constructor.
     * @param $id
     * @param $Kennzeichen
     * @param $Farbe
     * @param $Fahrzeugtyp_ID
     */
    public function __construct($id, $Kennzeichen, $Farbe, $Fahrzeugtyp_ID)
    {
        $this->id = $id;
        $this->Kennzeichen = $Kennzeichen;
        $this->Farbe = $Farbe;
        $this->Fahrzeugtyp_ID = $Fahrzeugtyp_ID;
    }

    public static function getAll()
    {
        $cars = [];

        foreach (self::getAllFromDB('Fahrzeug') as $car) {
            $cars[] = new CarModel(
                $car[0],
                $car[1],
                $car[2],
                $car[3]
            );
        }

        if (empty($cars)) return false;

        return $cars;
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