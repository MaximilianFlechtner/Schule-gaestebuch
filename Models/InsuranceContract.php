<?php


class InsuranceContractModel extends Db implements Model
{
    public $id;
    public $Vertragsnummer;
    public $Abschlussdatum;
    public $Art;
    public $Mitarbeiter_ID;
    public $Fahrzeug_ID;
    public $Versicherungsnehmer_ID;

    /**
     * InsuranceContractModel constructor.
     * @param $id
     * @param $Vertragsnummer
     * @param $Abschlussdatum
     * @param $Art
     * @param $Mitarbeiter_ID
     * @param $Fahrzeug_ID
     * @param $Versicherungsnehmer_ID
     */
    public function __construct($id, $Vertragsnummer, $Abschlussdatum, $Art, $Mitarbeiter_ID, $Fahrzeug_ID, $Versicherungsnehmer_ID)
    {
        $this->id = $id;
        $this->Vertragsnummer = $Vertragsnummer;
        $this->Abschlussdatum = $Abschlussdatum;
        $this->Art = $Art;
        $this->Mitarbeiter_ID = $Mitarbeiter_ID;
        $this->Fahrzeug_ID = $Fahrzeug_ID;
        $this->Versicherungsnehmer_ID = $Versicherungsnehmer_ID;
    }

    /**
     * @return array|false
     */
    public static function getAll()
    {
        $insuranceList = [];

        foreach (self::getAllFromDB('Versicherungsvertrag') as $raw) {
            $insuranceList[] = new InsuranceContractModel(
                $raw[0],
                $raw[1],
                $raw[2],
                $raw[3],
                $raw[4],
                $raw[5],
                $raw[6]
            );
        }

        if (empty($insuranceList)) return false;

        return $insuranceList;
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
        // TODO: Implement create() method.
    }
}