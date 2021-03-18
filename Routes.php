<?php

//Gästebuch
Route::set('index.php', function () {
    Index::CreateView("Index");
});

Route::set('indexCreate', function () {
    Index::createModel("Index");
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

?>
