<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'MateriaController@index')->name('home');
Route::get('/', 'MateriaController@index')->name('welcome');

Route::get('/inserir', 'MateriaController@inserir')->name('materia.inserir');
Route::get('/show/{id}', 'MateriaController@show')->name('materia.show');

//->middleware('jwt.auth')
