<?php

/**
 * Class Db
 */
class Db
{
    protected static $host = "localhost";
    protected static $dbname = "schule";
    protected static $user = "schule";
    protected static $pass = "schule";



    /**
     * @return PDO
     */
    private static function con()
    {
        $pdo = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", self::$user, self::$pass);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }



    /**
     * @param $query
     * @param array $params
     * @return array
     */
    public static function query($query, $params = array())
    {
        $stmt = self::con()->prepare($query);
        $stmt->execute($params);
        $data = $stmt->fetchAll();
        return $data;
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
