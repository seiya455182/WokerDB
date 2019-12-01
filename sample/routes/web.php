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

// Route::resource('users','UsersController',['only'=>['index','show']]);
Route::group(['middleware' => ['auth', 'can:browse-permission']], function () {
  // ユーザ一覧

});

Route::group(['middleware' => ['auth' or 'can:edit-permission']], function() {

});
    Route::resource('users','UsersController',['only'=>['index','show','edit','update']]);
