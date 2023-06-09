<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');

Route::resource('eixos', 'EixoController');
Route::resource('cursos', 'CursoController');
Route::resource('professores', 'ProfessorController');
Route::resource('disciplinas', 'DisciplinaController');