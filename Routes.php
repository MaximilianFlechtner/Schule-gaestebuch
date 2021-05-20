<?php

//Installer
if (!defined('INSTALL')) {
    Route::set('installer', function() {
        Installer::CreateView("Installer");
    });

    Route::set('installerCheck', function() {
        Installer::createModel('Installer');
    });

    Route::set('installerData', function() {
        Installer::createTables('Installer');
    });
    Route::set('installerDataTest', function() {
        Installer::createTables('Installer', 1);
    });
    Route::set('installerDataVersicherung', function() {
        Installer::createTables('Installer', 2);
    });
    Route::set('installerDone', function() {
        Installer::done();
    });
}

//Gästebuch
Route::set('index.php', function () {
    Index::CreateView("Index");
});

Route::set('indexCreate', function () {
    Index::createModel("Index");
});

//Captcha
Route::set('captcha', function() {
    include_once('includes/phpcaptcha/index.php');
});



//Versicherungsnehmer
Route::set('insurance', function () {
    Insurance::CreateView("Insurance");
});


//Mitarbeiter
Route::set('staff', function () {
    Staff::CreateView("Staff");
});

Route::set('staffCreate', function () {
    Staff::createModel("StaffCreate");
});

Route::set('staffDelete', function () {
    Staff::deleteModel("Staff");
});

Route::set('staffUpdate', function () {
    Staff::updateModel("Staff");
});


//Dienstwagen
Route::set('companycar', function() {
   CompanyCar::CreateView("companyCar");
});

Route::def();


?>
