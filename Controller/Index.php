<?php

/**
 * Class Index
 */
class Index extends Controller
{

    /**
     * @param $file
     */
    public static function start($file)
    {
        $guests = Guestbook::getGuestbook();
        require_once($file);
    }


    /**
     * @param $file
     * @param array $post
     */
    public static function create($file, array $post)
    {
        $val = new Validator($post);
        $val->required('Pleas supply email')->email('Supply valid email')->validate('tech-mail', 'E-Mail');
        $val->required('Name')->validate('tech-name', 'Name');
        $val->required('Gender')->validate('tech-gender', 'Gender');

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
            $guestbook = new Guestbook(strip_tags($post['tech-mail']), strip_tags($post['tech-name']), strip_tags($post['tech-web']), strip_tags($post['tech-comment']), strip_tags($post['tech-gender']));
            $guestbook->create();
            $guests = Guestbook::getGuestbook();

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

}

?>
