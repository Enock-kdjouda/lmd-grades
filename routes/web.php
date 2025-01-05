<?php
use App\Http\Controllers\UniteEnseignementController;
use App\Http\Controllers\ElementConstitutifController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;

// Ajout de la route d'accueil qui redirige vers la liste des étudiants
Route::get('/', function () {
    return view('welcome');
});

