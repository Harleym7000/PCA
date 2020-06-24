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

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::resource('/news', 'NewsController');
Route::get('/events', 'PagesController@events');
Route::get('/events/index', 'EventsController@index');
Route::get('/events/create', 'EventsController@create')->middleware('can:manage-events');
Route::resource('/contact', 'ContactController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/interest', 'HomeController@interest');

Route::post('/admin/getUserRole', 'Admin\UsersController@getUsersByRole');
Route::post('/admin/getUserByName', 'Admin\UsersController@getUsersByName');
Route::post('admin/users/processResetPass', 'Admin\UsersController@resetUserPassword');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show']]);
    Route::get('/users/resetPass', 'UsersController@displayResetUserPassword');
});




