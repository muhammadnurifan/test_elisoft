<?php

use Illuminate\Support\Facades\Route;

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



Route::get('/', 'LoginController@index')->name('login');
Route::post('/postlogin', 'LoginController@authenticate');
Route::get('/register', 'LoginController@register')->name('register');
Route::post('/postregister', 'LoginController@postregister');

// API 
Route::get('/users-api', 'UserController@getApi')->name('user-api');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');

    Route::get('/users', 'UserController@index')->name('user-list');
    
    Route::post('/user-post', 'UserController@store')->name('user-store');
    Route::get('/user/{id}/edit', 'UserController@edit')->name('user-edit');
    Route::post('/user/{id}/update', 'UserController@update')->name('user-update');
    Route::get('/user/{id}/delete', 'UserController@destroy')->name('user-delete');

    Route::get('/terbilang', 'UserController@terbilang')->name('terbilang');
});

Route::get('/logout', 'LoginController@logout')->name('logout');



