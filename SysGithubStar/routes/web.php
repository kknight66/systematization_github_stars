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

//Root page
Route::get('/', function () {
    return view('test.welcome');
});

//Authentication route
Auth::routes();

Route::get('/home', 'StarController@viewHome')->name('home');

//JSON Search API 
//Do not need to consider security, use GET method
Route::get('/star/data/{gitHubName}/{page}', 'StarController@getJsonByGitHubNameAndPageAndUserId'); //Unregistered person without userId Not counted in database
Route::get('/star/num/{gitHubName}', 'StarController@getPageNumByGitHubName'); //Get the number of pages corresponding to GitHubName

//Database synchronization routing 
Route::post('/star/database/sync', 'StarController@sync'); // Used to synchronize Star accept JSON parameters example {}
Route::post('/tag/database/sync', 'TagController@sync'); // Used to synchronize Tag accept JSON parameters example {}

Route::get('/test/view/{gitHubName}/{page}','StarController@viewByUserNameAndPageAndUserId')->name('searchView'); //Search View route
Route::get('/test/download','StarController@download')->name('download'); // Used to download files offline

//Useless
//Route::get('/home', 'HomeController@index')->name('home');