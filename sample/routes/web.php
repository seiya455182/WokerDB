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

Route::group(['middleware' => ['auth', 'can:edit-permission']], function () {
  Route::get('admin-index','AdminController@index')->name('admin-index');
});
Route::group(['middleware' => ['auth', 'can:all-permission']], function () {
  Route::get('admin-index2','AdminController@index2')->name('admin-index2');
  Route::post('admin-index2/{id}/chenge_permission', 'AdminController@change_permission')->name('permission');
});

Route::group(['middleware' => 'auth'], function() {
    Route::resource('users','UsersController',['only'=>['index','show','edit','update','destroy']]);
});
