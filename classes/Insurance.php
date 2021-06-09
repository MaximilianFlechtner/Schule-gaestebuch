<?php


class InsuranceModel extends Db implements Model
{
    public $id;
    public $name;
    public $firstName;
    public $birth;
    public $license;
    public $location;
    public $plz;
    public $street;
    public $streetNumber;
    public $ownCustomer;

    /**
     * Insurance constructor.
     * @param $id
     * @param $name
     * @param $firstName
     * @param $birth
     * @param $license
     * @param $location
     * @param $plz
     * @param $street
     * @param $streetNumber
     * @param $ownCustomer
     */
    public function __construct($id, $name, $firstName, $birth, $license, $location, $plz, $street, $streetNumber, $ownCustomer)
    {
        $this->id = $id;
        $this->name = $name;
        $this->firstName = $firstName;
        $this->birth = $birth;
        $this->license = $license;
        $this->location = $location;
        $this->plz = $plz;
        $this->street = $street;
        $this->streetNumber = $streetNumber;
        $this->ownCustomer = $ownCustomer;
    }

    /**
     * @return array|false
     */
    static public function getAll()
    {
        $insuranceList = [];

        foreach (self::getAllFromDB('Versicherungsnehmer') as $raw) {
            $insuranceList[] = new InsuranceModel(
                $raw[0],
                $raw[1],
                $raw[2],
                $raw[3],
                $raw[4],
                $raw[5],
                $raw[6],
                $raw[7],
                $raw[8],
                $raw[9]
            );
        }

        if (empty($insuranceList)) return false;

        return $insuranceList;
    }

    /**
     *
     */
    public static function update($post)
    {

    }

    /**
     *
     */
    public static function delete($id)
    {

    }

    /**
     *
     */
    public function create()
    {

    }


}