<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('/portfolio', 'VisitorController');

Route::get('/', function () {
    return redirect()->action('VisitorController@index');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['prefix'=>'admin','middleware' => ['web']], function () {

    // Authentication Routes...
    Route::auth();
    Route::resource('/portfolio', 'ProductController');
    Route::resource('portfolio.feature', 'FeatureController');
    Route::post('/spreadsheets/load', 'SpreadsheetController@load');
});
