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


// Home page
// Route::get('/', 'HomeController@index');

Route::get('/', function () {
    return redirect('home?&keyword={keyword}&matchtype={matchtype}&creative={creative}&gclid={gclid}');
});


Route::get('/home', [
    'uses' => 'HomeController@index',
    'keyword' => '{keyword}',
    'matchtype' => '{matchtype}',
    'creative' => '{matchtype}',
    'gclid' => '{gclid}'
]);


Route::get('/signup', 'HomeController@signup');
Route::get('/watching', 'HomeController@watching');
// Movies
Route::get('movie/show/{id}', 'MovieController@show');
Route::get('movie/toprated/{id}', 'MovieController@toprated');
Route::get('movie/upcoming/{id}', 'MovieController@upcoming');
Route::get('movie/nowplaying/{id}', 'MovieController@nowplaying');

// TV shows
Route::get('tv/airing/{id}', 'TvController@airing');
Route::get('tv/onair/{id}', 'TvController@onair');
Route::get('tv/popular/{id}', 'TvController@popular');
Route::get('tv/show/{id}', 'TvController@show');