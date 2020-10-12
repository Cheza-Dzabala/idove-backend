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

Route::get('/', 'WebsiteController@index');
Route::get('/forums', 'WebsiteForumsController@index');
Route::get('/posts/{forum}/{topic}/{post}', 'WebsitePostsController@show');
Route::get('/idovers', 'WebsiteUsersController@index');
Route::get('/idovers/{profile}', 'WebsiteUsersController@show');
Route::get('/projects','WebsiteProjectsController@index');
Route::get('/projects/{project}','WebsiteProjectsController@show');
Route::get('/contact-us','WebsiteContactController@index');
Route::get('/resources','WebsiteResourcesController@index');
Route::get('/activities','WebsiteActivityController@index');
Route::get('/resources/download/{resource}','WebsiteResourcesController@show');
Route::get('/organizers', 'WebsiteOrganizerController@index');
Route::get('/about', 'WebsiteAboutController@index');
