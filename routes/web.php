<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\GradeController;
use Illuminate\Support\Facades\Route;

// Ajout de la route d'accueil qui redirige vers la liste des étudiants
Route::get('/', function () {
    return redirect()->route('students.index');
});

Route::resource('students', StudentController::class);
Route::get('students/{student}/grades/create', [GradeController::class, 'create'])->name('grades.create');
Route::post('students/{student}/grades', [GradeController::class, 'store'])->name('grades.store');
Route::get('students/{student}/average', [GradeController::class, 'calculateAverage'])->name('grades.average');
