<?php

//Installer
if (!defined('INSTALL')) {
    Route::set('installer', function () {
        Installer::CreateView("Installer");
    });

    Route::set('installerCheck', function () {
        Installer::createModel('../Installer');
    });

    Route::set('installerData', function () {
        Installer::createTables('Installer');
    });
    Route::set('installerDataTest', function () {
        Installer::createTables('Installer', 1);
    });
    Route::set('installerDataVersicherung', function () {
        Installer::createTables('Installer', 2);
    });
    Route::set('installerDone', function () {
        Installer::done();
    });
}

//Gästebuch
Route::set('index', function () {
    Index::CreateView("Index");
});

Route::set('indexCreate', function () {
    Index::createModel("Index");
});

//Captcha
Route::set('captcha', function () {
    include_once('includes/phpcaptcha/index.php');
});


//Versicherungsnehmer
Route::set('insurance', function () {
    Insurance::CreateView("Insurance");
});

//Versicherungsgeselschaft
Route::set('insuranceCompany', function () {
    InsuranceCompany::CreateView("InsuranceCompany");
});
Route::set('insuranceCompanyCreate', function () {
    InsuranceCompany::createModel("InsuranceCompanyCreate");
});

//Versicherungsvertrag
Route::set('insuranceContract', function () {
    InsuranceContract::CreateView("InsuranceContract");
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
Route::set('companycar', function () {
    CompanyCar::CreateView("CompanyCar");
});

//Schadensfall
Route::set('damageCase', function () {
    DamageCase::CreateView("DamageCase");
});


//Fahrzeug
Route::set('car', function () {
    Car::CreateView('Car');
});

Route::def(function () {
    Index::CreateView("Index");
});


?>
