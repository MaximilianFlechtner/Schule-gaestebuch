<?php


class StaffModel extends Db
{
    public $id;
    public $staffNumber;
    public $name;
    public $firstName;
    public $birth;
    public $mobile;
    public $mail;
    public $phone;
    public $room;
    public $departmentID;
    /**
     * @var string
     */
    private $isManager;

    /**
     * Staff constructor.
     * @param $id
     * @param $staffNumber
     * @param $name
     * @param $firstName
     * @param $birth
     * @param $phone
     * @param $mobile
     * @param $mail
     * @param $room
     * @param $departmentID
     * @param $isManager
     */
    public function __construct($id, $staffNumber, $name, $firstName, $birth,$phone ,$mobile, $mail, $room, $departmentID, $isManager)
    {
        $this->id = $id;
        $this->staffNumber = $staffNumber;
        $this->name = $name;
        $this->firstName = $firstName;
        $this->birth = $birth;
        $this->phone = $phone;
        $this->mobile = $mobile;
        $this->mail = $mail;
        $this->room = $room;
        $this->departmentID = $departmentID;
        $this->isManager = $isManager == 'true' ? 'J' : 'N';
    }

    /**
     * @return mixed
     */
    public function getIsManager()
    {
        return $this->isManager == 'J';
    }

    /**
     *
     */
    public function create()
    {
        self::insert(
            'Mitarbeiter',
            ['Personalnummer', 'NAME', 'Vorname', 'Geburtsdatum', 'Telefon', 'Mobil', 'Email', 'Raum', 'Ist_Leiter', 'Abteilung_ID'],
            [$this->staffNumber, $this->name, $this->firstName, $this->birth, $this->phone ,$this->mobile, $this->mail, $this->room, $this->isManager, $this->departmentID]
        );
    }

    /**
     * @return array|false
     */
    static public function getAll()
    {
        $staffList = [];

        foreach (self::query("SELECT * FROM Mitarbeiter") as $staff) {
            $staffList[] = new StaffModel(
                $staff[0],
                $staff[1],
                $staff[2],
                $staff[3],
                $staff[4],
                $staff[5],
                $staff[6],
                $staff[7],
                $staff[8],
                $staff[9],
                $staff[10]
            );
        }

        if (empty($staffList)) return false;

        return $staffList;
    }

    /**
     *
     */
    public function update()
    {

    }

    /**
     * @param $id
     */
    public static function delete($id)
    {
       self::deleteDB('Mitarbeiter', $id);
    }


}