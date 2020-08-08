<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

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

//Auth Routes
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@create');

// Password Reset Routes...
Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/interest', 'HomeController@interest');

Route::get('/send-mail', function(){
    $details = [
        'title' => 'Mail from PCA',
        'body' => 'This is a test mail from PCA'
    ];
    \Mail::to('harleym7000@gmail.com')->send(new \App\Mail\TestMail($details));
    echo "Email has been sent";
});

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






