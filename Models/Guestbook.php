<?php


class Guestbook extends Db implements Model
{
    public $email;
    public $name;
    public $website;
    public $text;
    public $gender;

    /**
     * Guestbook constructor.
     * @param $email
     * @param $name
     * @param $website
     * @param $text
     * @param $gender
     */
    public function __construct($email, $name, $website = '', $text = '', $gender = '')
    {
        $this->email = $email;
        $this->name = $name;
        $this->website = $website;
        $this->text = $text;
        $this->gender = $gender;
    }


    /**
     * @return array
     */
    static function getAll()
    {
        $guestbook = [];
        foreach (self::getAllFromDB('Guestbook') as $raw) {
            $guestbook[] = new Guestbook($raw[1], $raw[2], $raw[3], $raw[4], $raw[5]);
        }

        return $guestbook;
    }

    public static function update($model)
    {

    }

    public static function delete($id)
    {

    }

    public function create()
    {
        self::insert('Guestbook', ['name', 'email', 'website', 'text', 'gender'], [$this->name, $this->email, $this->website, $this->text, $this->gender]);
    }


}