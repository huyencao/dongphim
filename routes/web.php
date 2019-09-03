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
Route::group(['namespace' => 'Admin'], function() {
	Route::group(['prefix' => 'backend','middleware' => 'auth'], function() {
		Route::resource('user', 'UserController', [ 'except' => [
		    'show'
		]]);

		Route::get('/', 'DashboardController@index');
		Route::resource('setting', 'SettingController');
        Route::resource('cate-movie', 'CateMovieController');
        Route::post('cate-movie/deleteAll', ['as' => 'cate-movie.deleteAll', 'uses' => 'CateMovieController@deleteAll']);
//        Route::resource('news', 'NewsController');
//        Route::post('news/deleteAll', ['as' => 'news.deleteAll', 'uses' => 'NewsController@deleteAll']);
        Route::resource('banner', 'BannerController');
        Route::post('banner/deleteAll', ['as' => 'banner.deleteAll', 'uses' => 'BannerController@deleteAll']);
    });
});

Route::get('login',['as'=>'login', 'uses'=>'Auth\LoginController@getLogin']);
Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');
