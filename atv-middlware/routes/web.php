<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('templates.main')->with('titulo', "");
})->name('index');

Route::resource('eixos', 'EixoController');
Route::resource('cursos', 'CursoController');
Route::resource('professores', 'ProfessorController');
Route::resource('disciplinas', 'DisciplinaController');
Route::resource('alunos','AlunoController');
Route::get('aulas','AulaController@index')->name('aulas.index');
Route::post('aulas','AulaController@store')->name('aulas.store');
Route::get('/matriculas/{id}', 'MatriculaController@index')->name('matriculas.index');
Route::post('/matriculas/store', 'MatriculaController@store')->name('matriculas.store');
