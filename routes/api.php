<?php

use Illuminate\Http\Request;

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

// Route::get('/rest/users', 'RestController@users');
// Route::get('/rest/user/{id}', 'RestController@getUser');
// Route::get('/rest/users/affinity/{id}', 'RestController@getUsersFromAffinity');
// Route::get('/rest/jobs', 'RestController@postings');
// Route::get('/rest/jobs/name/{name}', 'RestController@postingsByName');
// Route::get('/rest/jobs/id/{id}', 'RestController@postingsById');