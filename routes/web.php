<?php

use App\Http\Controllers\PagesController;
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
Route::get('/news', 'PagesController@news');
Route::get('/events', 'PagesController@events');
Route::resource('/story', 'NewsController');
Route::resource('/event', 'EventsController');
Route::get('/events/create', 'EventsController@create')->middleware('can:manage-events');
Route::get('/contact-us', 'PagesController@contact');
Route::post('/contact-submit', 'ContactController@store');
Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/interest', 'HomeController@interest');

Route::post('/admin/getUserRole', 'Admin\UsersController@getUsersByRole');
Route::post('/admin/getUserByName', 'Admin\UsersController@getUsersByName');
Route::post('admin/users/processResetPass', 'Admin\UsersController@resetUserPassword');
Route::get('/admin/getContactMessages', 'ContactController@getMessages');
Route::resource('/contact-messages', 'ContactController');
Route::post('/contact-message/mark-as-read', 'ContactController@markRead');

Route::get('/event-manager/index', 'EventsController@index')->middleware('can:manage-events');
Route::get('/admin/contact', 'ContactController@index')->middleware('can:manage-users');
Route::get('/admin/dashboard', 'DashboardsController@admin')->middleware('can:manage-users');
Route::get('/admin/pages', 'AdminPagesManagerController@index');
Route::get('/policy-docs', 'PoliciesController@index')->middleware('can:manage-users');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show']]);
    Route::get('/users/resetPass', 'UsersController@displayResetUserPassword');
});






