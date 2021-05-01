<?php

/**
 * Class Index
 */
class Installer extends Controller
{

    /**
     * @param $file
     */
    public static function start($file)
    {
        require_once($file);
    }


    /**
     * @param $file
     * @param array $post
     */
    public static function create($file, array $post)
    {
        $val = new Validator($post);
        $val->required('Bitte alle Felder ausfüllen')->validate('tech-host', 'Host');
        $val->required('Bitte alle Felder ausfüllen')->validate('tech-db', 'DB');
        $val->required('Bitte alle Felder ausfüllen')->validate('tech-user', 'User');
        $val->required('Bitte alle Felder ausfüllen')->validate('tech-password', 'Password');

        $error = false;

        if ($val->hasErrors()) {
            ob_start(); ?>
            <div class="alert alert-danger">
                Ein Fehler ist Aufgetreten:
                <?php foreach ($val->getAllErrors() as $error): ?>
                    <?= $error ?>
                <?php endforeach; ?>
            </div>
            <?php
            $message = ob_get_clean();
            $error = true;

        } else {
            $data = $val->getValidData();
            $pdo_work = true;

            try {
                $pdo = new PDO("mysql:host=" . $data['tech-host'] . ";dbname=" . $data['tech-db'] . ";charset=utf8", $data['tech-user'], $data['tech-password']);
            } catch (Exception $e) {
                ob_start(); ?>
                <div class="alert alert-danger">
                    Ein Fehler ist Aufgetreten: Die Eingabe scheint nicht zu stimmen!!
                </div>
                <?php
                $message = ob_get_clean();
                $pdo_work = false;
                $error = true;
            }

            if ($pdo_work) {

                $code = "<?php 
                    define('DBHOST','" . $data['tech-host'] . "');
                    define('DBNAME','" . $data['tech-db'] . "');
                    define('DBUSER','" . $data['tech-user'] . "');
                    define('DBPASS','" . $data['tech-password'] . "');
                       ?>";

                if (!is_writable("db_config.php")) {
                    ob_start(); ?>
                    <div class="alert alert-danger">
                        Ein Fehler ist Aufgetreten: db_config.php Kann nicht modifiziert werden !!
                    </div>
                    <?php
                    $message = ob_get_clean();
                    $error = true;
                } else {
                    $fi = fopen('db_config.php', 'wb');
                    fwrite($fi, $code);
                    fclose($fi);
                    ob_start(); ?>

                    <div class="alert alert-success">
                        Eingabe wurde gespeichert
                    </div>
                    <?php
                    $message = ob_get_clean();
                }
            }

        }

        if (!$error) {
            header("Location: /installer");
        }else {
            require_once($file);
        }
    }


    /**
     * @param $file
     * @param array $post
     */
    public static function delete($file, array $post)
    {
    }

    /**
     * @return bool
     */
    public static function check()
    {
        if (!defined('DBHOST') || !defined('DBNAME') || !defined('DBUSER') && !defined('DBPASS')) {
            return false;
        }
        try {
            $pdo = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8", DBUSER, DBPASS);
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
     * @param $view_name
     * @param false $test
     */
    public static function createTables($view_name, $database = 0)
    {
        $pdo = new PDO("mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8", DBUSER, DBPASS);

        switch ($database){
            case 1:
                $query = file_get_contents(__DIR__ . '/../sql/installer_test.sql');
                break;
            case 2:
                $query = file_get_contents(__DIR__ . '/../sql/installer_versicherung.sql');
                break;
            default:
                $query = file_get_contents(__DIR__ . '/../sql/installer_default.sql');
                break;
        }

        $smt = $pdo->prepare($query);

        if ($smt->execute()) {
            $message = "<div class='alert alert-success'>Tabellen Wurden erstellt</div>";
        } else {
            $message = "<div class='alert alert-danger'>Ein Fehler ist aufgetreten</div>";
        }

        include_once('templates/nav.php');
        if (file_exists("./View/$view_name.php")) {
            require_once("./View/$view_name.php");
        }
        include_once('templates/footer.php');
    }

    /**
     *
     */
    public static function done()
    {
        $code = "<?php define('INSTALL','true'); ?>";

        if (!is_writable("config.php")) {
            ob_start(); ?>
            <div class="alert alert-danger">
                Ein Fehler ist Aufgetreten: config.php Kann nicht modifiziert werden !!
            </div>
            <?php
            $message = ob_get_clean();
        } else {
            $fi = fopen('config.php', 'wb');
            fwrite($fi, $code);
            fclose($fi);
            ob_start(); ?>

            <div class="alert alert-success">
                Eingabe wurde gespeichert
            </div>
            <?php
            $message = ob_get_clean();
        }

        header("Location: /index.php");
    }

}

?>
