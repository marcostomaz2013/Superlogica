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
//Rotas do exercício 1
Route::get('/exercicio1/indexExercicio1','App\Http\Controllers\Exercicio1\Exercicio1Controller@index')->name('exercicio1.index');
Route::post('/exercicio1/save','App\Http\Controllers\Exercicio1\Exercicio1Controller@save')->name('exercicio1.save');

//Rotas do exercício 2
Route::get('/exercicio2/indexExercicio2','App\Http\Controllers\Exercicio2\Exercicio2Controller@index')->name('exercicio2.index');

