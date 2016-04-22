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

Route::resource('visitor', 'VisitorController');

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

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () {
        return redirect()->action('ProductController@index');
    });
    // Authentication Routes...
    Route::auth();
    Route::resource('product', 'ProductController');
    Route::resource('product.feature', 'FeatureController');
    Route::post('spreadsheets/load', 'SpreadsheetController@load');
});
