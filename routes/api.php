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

Route::get('maps', 'MapsController@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Api\RegistrationController@store');
Route::post('activate', 'Api\RegistrationController@activate');
Route::post('login', 'Api\LoginController@login');

Route::group(['prefix' => 'auth'], function (){
    Route::post('reset_password', 'Api\ResetPasswordController@index');
    Route::post('reset_password/confirm/{token}', 'Api\ResetPasswordController@store');
});

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

    Route::group(['prefix' => 'status'], function () {
        Route::post('update', 'StatusUpdatesController@store');
        Route::get('update', 'StatusUpdatesController@index');
        Route::post('{update}/comment', 'StatusUpdatesController@comment');
        Route::post('{update}/like', 'LikesController@create');
    });

    Route::group(['prefix' => 'notifications'], function () {
        Route::get('', 'NotificationsController@index');
        Route::get('all', 'NotificationsController@show');
    });

    Route::group(['prefix' => 'groups'], function () {
        Route::post('create', 'GroupsController@create');
        Route::get('', 'GroupsController@index');
        Route::patch('{group}/invites/accept', 'GroupsInvitationsController@respond');
        Route::patch('{group}/invite/{user}', 'GroupsInvitationsController@create');
        Route::get('{group}/invites', 'GroupsInvitationsController@show');
        Route::group(['middleware' => 'group.users'], function () {
            Route::get('{group}/members', 'GroupUsersController@show');
            Route::get('{group}/messages', 'GroupMessageBoardController@index');
            Route::post('{group}/messages', 'GroupMessageBoardController@create');
            Route::post('{group}/messages/{message}/comment', 'GroupMessageBoardCommentsController@create');
            Route::patch('{group}/messages/{message}/like', 'GroupMessageBoardLikesController@create');
        });
    });

    Route::group(['prefix' => 'connections'], function () {
        Route::post('requests', 'ConnectionRequestController@create');
        Route::get('requests', 'ConnectionRequestController@show');
        Route::patch('requests/{request}/accept', 'ConnectionRequestController@accept');
    });

    Route::group(['prefix' => 'projects'], function () {
        Route::get('', 'ProjectsController@index');
        Route::get('{filter}', 'ProjectsController@filter');
        Route::post('', 'ProjectsController@create');
        Route::post('/{project}', 'ProjectsController@show');
    });

    Route::group(['prefix' => 'forums'], function () {
        Route::get('', 'ForumsController@index');
        Route::post('', 'ForumsController@create');
        Route::post('{forum:slug}', 'TopicsController@create');
        Route::get('{forum:slug}', 'TopicsController@index');
        Route::post('{forum:slug}/{topic:slug}', 'PostsController@create');
        Route::get('{forum:slug}/{topic:slug}', 'PostsController@index');
        Route::get('{forum:slug}/{topic:slug}/{post:slug}', 'PostsController@show');
        Route::post('{forum:slug}/{topic:slug}/{post}/comment', 'CommentsController@create');
        Route::post('comment/{comment}/like', 'CommentsController@like');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoriesController@index');
    });

    Route::group(['prefix' => 'newsfeed'], function () {
        Route::get('', 'NewsfeedController@index');
    });
});
