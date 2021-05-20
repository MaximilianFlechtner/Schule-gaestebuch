<?php

/**
 * Class Db
 */
class Db
{


    /**
     * @return PDO
     */
    private static function con()
    {
        if (!defined('DBHOST') || !defined('DBNAME') || !defined('DBUSER') && !defined('DBPASS')) {
            header("Location: /installer");
        }else {
            try {
                $pdo = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8", DBUSER, DBPASS);
            }catch(Exception $e){
                die('<div class="alert alert-danger" role="alert">Bitte geben Sie die richtigen Daten zur Datenbank an (<a href="/installer">Instalieren</a>)</div>');
            }
            $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
    }



    /**
     * @param $query
     * @param array $params
     * @return array
     */
    public static function query($query, $params = array())
    {
        try {
            $stmt = self::con()->prepare($query);
        }catch(Exception $e){
            die('<div class="alert alert-danger">Die Tabelle existiert nicht, bitte überprüfen Sie ihre Datenbank(<a href="/installer">Installiren</a>)</div>');
        }

        $stmt->execute($params);
        $data = $stmt->fetchAll();
        return $data;
    }

    public static function getAllFromDB($db) {
        return self::query("SELECT * FROM ". $db);
    }



    /**
     * @param $table
     * @param $fields
     * @param array $params
     */
    public static function insert($table, $fields, $params = array()) {
        $val = [];
        foreach ($fields as $field) {
            $val[] = '?';
        }

        $sql = 'INSERT INTO ' . $table . '(' . implode(', ', $fields) .') VALUES (' . implode(', ', $val) . ')';

        self::query($sql, $params);
    }

    public static function updateDb($table, $id,$fields, $params = array()) {
        $sql = 'UPDATE ' . $table . ' SET ' . chop(implode('=?, ', $fields), ','). '=? WHERE id = ' . $id;

        array_shift($params);

        return self::query($sql, $params);
    }



    /**
     * @param $table
     * @param $id
     */
    public static function deleteDB($table, $id) {
        $stmt= self::con()->prepare("DELETE FROM ". $table ." WHERE id=:id");
        $stmt->bindParam(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
    }

}

?>
