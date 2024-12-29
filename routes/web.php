<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UniteEnseignementController;
use App\Http\Controllers\ElementConstitutifController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('unites_enseignement', UniteEnseignementController::class);

Route::resource('elements_constitutifs', ElementConstitutifController::class);
