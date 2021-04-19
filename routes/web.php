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

Route::get('/admin/affinities', 'AdminController@adminAffinities');
Route::post('/admin/updateAffinity', 'AdminController@updateAffinity');
Route::post('/admin/manageAffinity', 'AdminController@manageAffinity');

Route::post('/manageUser','AdminController@manageUser');


Route::get('/portfolio/create', 'PortfolioController@loadPortfolioScreen');
Route::get('/portfolio/viewAll', 'PortfolioController@viewAll');
Route::get('/TogetherPeopleStrong/portfolio/viewAll', 'PortfolioController@viewAll');
Route::post('/portfolio/viewPortfolio', 'PortfolioController@viewPortfolio');

Route::post('/portfolio/userInfo', 'PortfolioController@update');
Route::get('/portfolio/mine', 'PortfolioController@viewMyPortfolio');
Route::get('/editUserInfo', 'UserController@editUserInfo');
Route::post('userInfoUpdate', 'UserController@processUserEdit');

Route::get('affinities', 'UserController@getAllAffinities');
Route::get('/addAffinity', function(){return view('affinityAdd');});
Route::post('/createAffinity', 'UserController@createAffinity');
Route::get('/viewAffinity/addThisAffinity', 'UserController@addThisAffinity');
Route::get('/viewAffinity/removeThisAffinity', 'UserController@removeThisAffinity');
Route::get('/viewAffinity/editThisAffinity', 'UserController@editThisAffinity');
Route::post('viewAffinity/processEditAffinity', 'UserController@processEdit');
Route::get('viewAffinity/deleteThisAffinity', 'UserController@deleteThisAffinity');
// Route::post('/viewAffinity', 'UserController@viewAffinity');
Route::get('/viewAffinity/{id}', 'UserController@viewAffinity');

Route::get('/rest/users', 'RestController@users');
Route::get('/rest/user/{id}', 'RestController@getUser');
Route::get('/rest/users/affinity/{id}', 'RestController@getUsersFromAffinity');
Route::get('/rest/jobs/all', 'RestController@postings');
Route::get('/rest/jobs/name/{name}', 'RestController@postingsByName');
Route::get('/rest/jobs/id/{id}', 'RestController@postingsById');

//Routing for job postings
Route::get('/job_postings',function(){
    $service = new SecurityService();
    $postings = $service->getPostings();
    return view('viewPostings')->with('postings',$postings);
});
Route::get('/view_posting/{id}','UserLevelController@viewPosting');
Route::post('/apply','UserLevelController@addApplication');
Route::post('/search','UserLevelController@searchPostings');

