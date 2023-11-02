<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
//Rotas de alunos
Route::get('/aluno/indexAluno','App\Http\Controllers\Aluno\AlunoController@index')->name('aluno.index');
Route::post('/aluno/save','App\Http\Controllers\Aluno\AlunoController@save')->name('aluno.save');
Route::get('/aluno/create','App\Http\Controllers\Aluno\AlunoController@create')->name('aluno.create');
Route::get('/aluno/update','App\Http\Controllers\Aluno\AlunoController@update')->name('aluno.update');
Route::get('/aluno/delete','App\Http\Controllers\Aluno\AlunoController@delete')->name('aluno.delete');

//Rotas de disciplinas
Route::get('/disciplina/indexDisciplina','App\Http\Controllers\Disciplina\DisciplinaController@index')->name('disciplina.index');
Route::post('/disciplina/save','App\Http\Controllers\Disciplina\DisciplinaController@save')->name('disciplina.save');
Route::get('/disciplina/create','App\Http\Controllers\Disciplina\DisciplinaController@create')->name('disciplina.create');
Route::get('/disciplina/update','App\Http\Controllers\Disciplina\DisciplinaController@update')->name('disciplina.update');
Route::get('/disciplina/delete','App\Http\Controllers\Disciplina\DisciplinaController@delete')->name('disciplina.delete');

//Rotas de matriculas
Route::get('/matricula/indexMatricula','App\Http\Controllers\Matricula\MatriculaController@index')->name('matricula.index');
Route::post('/matricula/save','App\Http\Controllers\Matricula\MatriculaController@save')->name('matricula.save');
Route::get('/matricula/create','App\Http\Controllers\Matricula\MatriculaController@create')->name('matricula.create');
Route::get('/matricula/update','App\Http\Controllers\Matricula\MatriculaController@update')->name('matricula.update');
Route::get('/matricula/delete','App\Http\Controllers\Matricula\MatriculaController@delete')->name('matricula.delete');

