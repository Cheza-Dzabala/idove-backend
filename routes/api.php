<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Api\RegistrationController@store');
Route::post('activate', 'Api\RegistrationController@activate');
Route::post('login', 'Api\LoginController@login');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('trix_uploads', 'Api\TrixUploadsController@upload');
    Route::group(['prefix' => 'profile'], function () {
        Route::get('', 'ProfileController@create');
        Route::post('', 'ProfileController@store');
        Route::patch('{profile}', 'ProfileController@update');
        Route::get('{profile}', 'ProfileController@show');
    });

    Route::group(['prefix' => 'questionnaires'], function () {
        Route::get('', 'QuestionnaireController@index');
        Route::post('', 'QuestionnaireController@store');
        Route::get('count_unfilled', 'QuestionnaireController@count_unfilled');
        Route::get('{questionnaire}', 'QuestionnaireController@show');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('', 'Api\UsersController@index');
    });
});
