<?php


class CompanyCarModel extends Db implements Model
{

    public $id;
    public $indicator;
    public $color;
    public $typeId;
    public $staffId;

    /**
     * CompanyCarModel constructor.
     * @param $id
     * @param $indicator
     * @param $color
     * @param $typeId
     * @param $staffId
     */
    public function __construct($id, $indicator, $color, $typeId, $staffId)
    {
        $this->id = $id;
        $this->indicator = $indicator;
        $this->color = $color;
        $this->typeId = $typeId;
        $this->staffId = $staffId;
    }

    public static function getAll()
    {
        $cars = [];

        foreach (self::getAllFromDB('Dienstwagen') as $car) {
            $cars[] = new CompanyCarModel(
                $car[0],
                $car[1],
                $car[2],
                $car[3],
                $car[4]
            );
        }

        if (empty($cars)) return false;

        return $cars;
    }

    public static function getByField($id, $field)
    {
        $cars = [];

        $result = self::query("SELECT * FROM Dienstwagen WHERE " . $field . " = " . $id);
        if (!empty($result)) {
            foreach ($result as $car) {
                $cars[] = new CompanyCarModel(
                    $car[0],
                    $car[1],
                    $car[2],
                    $car[3],
                    $car[4]
                );
            }
        }

        if (!empty($cars)) {
            return $cars[0];
        }


        return false;
    }

    public static function update($model)
    {
        // TODO: Implement update() method.
    }

    public static function delete($id)
    {
        self::deleteDB('Dienstwagen', $id);
    }

    public function create()
    {
        self::insert(
            'Dienstwagen',
            ['Kennzeichen', 'Farbe', 'Fahrzeugtyp_ID', 'Mitarbeiter_ID'],
            [$this->indicator, $this->color, $this->typeId, $this->staffId]
        );
    }
}