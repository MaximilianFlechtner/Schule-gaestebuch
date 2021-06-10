<?php


class DamageCaseModel extends Db implements Model
{

    public $id;
    public $Datum;
    public $Ort;
    public $Beschreibung;
    public $Schadenshoehe;
    public $Verletzte;
    public $Mitarbeiter_ID;

    /**
     * DamageCaseModel constructor.
     * @param $id
     * @param $Datum
     * @param $Ort
     * @param $Beschreibung
     * @param $Schadenshoehe
     * @param $Verletzte
     * @param $Mitarbeiter_ID
     */
    public function __construct($id, $Datum, $Ort, $Beschreibung, $Schadenshoehe, $Verletzte, $Mitarbeiter_ID)
    {
        $this->id = $id;
        $this->Datum = $Datum;
        $this->Ort = $Ort;
        $this->Beschreibung = $Beschreibung;
        $this->Schadenshoehe = $Schadenshoehe;
        $this->Verletzte = $Verletzte;
        $this->Mitarbeiter_ID = $Mitarbeiter_ID;
    }

    public static function getAll()
    {
        $damages = [];

        foreach (self::getAllFromDB('Schadensfall') as $damage) {
            $damages[] = new DamageCaseModel(
                $damage[0],
                $damage[1],
                $damage[2],
                $damage[3],
                $damage[4],
                $damage[5],
                $damage[6]
            );
        }

        if (empty($damages)) return false;

        return $damages;
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