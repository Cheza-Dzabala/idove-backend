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
    return view('welcome');
});

Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');

// Users Route
Route::get('/users', 'UsersController@index')->name('users.all');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users/create', 'UsersController@store')->name('users.store');
Route::get('/password-reset/{username}', 'PasswordController@create')->name('password.create');
Route::post('/password-reset/{username}', 'PasswordController@store')->name('password.store');
