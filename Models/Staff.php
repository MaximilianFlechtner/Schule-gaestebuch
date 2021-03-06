<?php


class StaffModel extends Db implements Model
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
    public function __construct($id, $staffNumber, $name, $firstName, $birth, $phone, $mobile, $mail, $room, $isManager, $departmentID)
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
        $this->isManager = ($isManager == 'J' ? true : false);
    }

    /**
     * @return array|false
     */
    static public function getAll()
    {
        $staffList = [];

        foreach (self::getAllFromDB('Mitarbeiter') as $staff) {
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

    public static function getById($id)
    {
        $StaffList = [];

        $result = self::query("SELECT * FROM Mitarbeiter WHERE id = " . $id);
        if (!empty($result)) {
            foreach ($result as $staff) {
                $StaffList[] = new StaffModel(
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
        }

        if (!empty($StaffList)) {
            return $StaffList[0];
        }

        return false;
    }

    /**
     *
     * @param StaffModel $model
     */
    public static function update($model)
    {
        $values = array_values(get_object_vars($model));
        if (!empty($values)) {
            $values[10] = $values[10] ? 'J' : 'N';
        }

        return self::updateDb('Mitarbeiter', $model->id, ['Personalnummer', 'NAME', 'Vorname', 'Geburtsdatum', 'Telefon', 'Email', 'Mobil', 'Raum', 'Abteilung_ID', 'Ist_Leiter'], $values);
    }

    /**
     * @param $id
     */
    public static function delete($id)
    {
        self::deleteDB('Mitarbeiter', $id);
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
            [$this->staffNumber, $this->name, $this->firstName, $this->birth, $this->phone, $this->mobile, $this->mail, $this->room, $this->isManager ? 'J' : 'N', $this->departmentID]
        );
    }


}