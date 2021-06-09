<?php

/**
 * Class Index
 */
class Index extends Controller implements ControllerModel
{

    /**
     * @param $file
     */
    public static function start($file)
    {
        $guests = Guestbook::getAll();
        require_once($file);
    }


    /**
     * @param $file
     * @param array $post
     */
    public static function create($file, array $post)
    {
        $val = new Validator($post);
        $val->required('Pleas supply email')->email('Supply valid email')->validate('tech-mail', 'E-Mail', '', false);
        $val->required('Name')->validate('tech-name', 'Name');
        $val->required('Gender')->validate('tech-gender', 'Gender');
        $val->url('Die Eingegebene Url ist nicht richtig')->validate('tech-web', 'Webseite');
        $val->required('Bitte Gebe einen Text ein')->validate('tech-comment', 'Kommentar');

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

        } else {
            $data = $val->getValidData();

            $guestbook = new Guestbook($data['tech-mail'], $data['tech-name'], $data['tech-web'], $data['tech-comment'], $data['tech-gender']);
            $guestbook->create();
            $guests = Guestbook::getAll();

            ob_start(); ?>
            <div class="alert alert-success">
                Eingabe wurde gespeichert
            </div>
            <?php
            $message = ob_get_clean();
        }

        require_once($file);
    }


    /**
     * @param $file
     * @param array $post
     */
    public static function delete($file, array $post)
    {
    }

    public static function update($file, array $post)
    {
        // TODO: Implement update() method.
    }
}

?>
