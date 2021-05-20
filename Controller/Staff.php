<?php

class Staff extends Controller implements ControllerModel
{

    public static function start($file)
    {
        $staffList = StaffModel::getAll();
        require_once($file);
    }

    public static function create($file, array $post)
    {
        if (isset($post) && !empty($post)) {
            $staff = new StaffModel(
                '',
                $post['tech-personalnummer'],
                $post['tech-name'],
                $post['tech-vorname'],
                $post['tech-geburtsdatum'],
                $post['tech-telefon'],
                $post['tech-mobile'],
                $post['tech-email'],
                $post['tech-raum'],
                $post['tech-abteilung'],
                isset($post['tech-ist-leiter']) ? $post['tech-ist-leiter'] : false
            );
            $staff->create();
        }

        require_once($file);
    }

    public static function delete($file, array $post)
    {

        if (!empty($post) && $post['tech-staff-id']) {
            StaffModel::delete($post['tech-staff-id']);
        }

        $staffList = StaffModel::getAll();
        require_once($file);
    }

    public static function update($file, array $post)
    {
          if (isset($post) && !empty($post)) {
              $staff = new StaffModel(
                  $post['tech-staff-id'],
                  $post['tech-personalnummer'],
                  $post['tech-name'],
                  $post['tech-vorname'],
                  $post['tech-geburtsdatum'],
                  $post['tech-telefon'],
                  $post['tech-mobile'],
                  $post['tech-email'],
                  $post['tech-raum'],
                  isset($post['tech-ist-leiter']) ? $post['tech-ist-leiter'] ? 'J' : 'N' : 'N',
                  $post['tech-abteilung']
              );

              StaffModel::update($staff);
          }
        $staffList = StaffModel::getAll();

        require_once($file);
    }
}

?>
