<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//admin functions
//just like in wordpress, this routes the admin to the admin login page
Route::get('/admin', function(){return view('admin_login');});
//Admin Login Process
Route::post('/admin_login','AdminController@login');
Route::post('/manageUser','AdminController@manageUser');

Route::get('/portfolio', function(){return view('User_Information');});

Route::post('/userInfo', 'PortfolioController@update');