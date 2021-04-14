<?php
use App\Services\Businesses\SecurityService;
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

//Routing for job posting management
Route::get('/admin/postings',function(){
    $service = new SecurityService();
    $postings = $service->getPostings();
    return view('admin_postings')->with('postings',$postings);
});
Route::get('/admin/users', 'AdminController@viewUsers');
Route::get('/admin/new_posting',function(){return view('new_posting');});
Route::post('/admin/submit_new_posting','AdminController@newPosting');
Route::post('/admin/managePosting','AdminController@changePosting');
Route::post('/admin/updatePosting','AdminController@updatePosting');
Route::post('/admin/deleteConfirmed','AdminController@deleteConfirmation');

Route::post('/manageUser','AdminController@manageUser');


Route::get('/portfolio/create', function(){return view('User_Information');});

Route::post('/userInfo', 'PortfolioController@update');

