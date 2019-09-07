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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//admin
Route::group(['namespace' => 'Admin'], function () {
    Route::group(['prefix' => 'backend', 'middleware' => 'auth'], function () {
        Route::resource('user', 'UserController', ['except' => [
            'show'
        ]]);

        Route::get('/', 'DashboardController@index');
        Route::resource('setting', 'SettingController');
        Route::resource('cate-movie', 'CateMovieController');
        Route::post('cate-movie/deleteAll', ['as' => 'cate-movie.deleteAll', 'uses' => 'CateMovieController@deleteAll']);
        Route::resource('movie', 'MovieController');
        Route::post('movie/deleteAll', ['as' => 'movie.deleteAll', 'uses' => 'MovieController@deleteAll']);
        Route::resource('banner', 'BannerController');
        Route::post('banner/deleteAll', ['as' => 'banner.deleteAll', 'uses' => 'BannerController@deleteAll']);
        Route::resource('actor', 'ActorController');
        Route::post('actor/deleteAll', ['as' => 'actor.deleteAll', 'uses' => 'ActorController@deleteAll']);
        Route::resource('episode', 'EpisodeController');
        Route::post('episode/deleteAll', ['as' => 'episode.deleteAll', 'uses' => 'EpisodeController@deleteAll']);
        Route::resource('menu', 'MenuController');
    });
});

//frontend
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('album/{slug}.htm', 'HomeMovieController@movies')->name('movies');
    Route::get('chi-tiet/{slug}-{id}.html', 'HomeMovieController@detail')->name('movies.detail');
    Route::get('video/{slug}-{id}.html', 'HomeMovieController@video')->name('movies.video');
    Route::get('find', 'HomeController@find')->name('home.find');
});

Route::get('login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout');
