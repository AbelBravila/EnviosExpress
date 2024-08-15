<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');  // Asegúrate de usar 'layout.login' como el nombre de la vista
});


//Route::view('',"")->name('login');