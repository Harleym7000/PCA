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
Auth::routes();
Route::get('/register', 'Auth\RegisterController@index');
Route::post('/register', 'Auth\RegisterController@create');

Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/member', 'MemberController@index')->name('member');
Route::get('/event-manager/index', 'EventsController@index')->name('event');
Route::get('/author', 'AuthorController@index');

Route::get('/send-mail', function(){
    $details = [
        'title' => 'Mail from PCA',
        'body' => 'This is a test mail from PCA'
    ];
    \Mail::to('harleym7000@gmail.com')->send(new \App\Mail\TestMail($details));
    echo "Email has been sent";
});

Route::post('/admin/getUserRole', 'Admin\UsersController@getUsersByRole');
Route::get('/admin/getAllUsers', 'Admin\UsersController@getAllUsers');
Route::post('/admin/getUserByName', 'Admin\UsersController@getUsersByName');
Route::post('/admin/getUserCauses', 'Admin\UsersController@getUserCauses');
Route::post('admin/users/processResetPass', 'Admin\UsersController@resetUserPassword');
Route::get('/admin/getContactMessages', 'ContactController@getMessages');
Route::resource('/contact-messages', 'ContactController');
Route::post('/contact-message/mark-as-read', 'ContactController@markRead');

Route::get('/admin/contact', 'ContactController@index');
Route::get('/admin/dashboard', 'DashboardsController@admin');
Route::get('/admin/pages', 'AdminPagesManagerController@index');
Route::get('/policy-docs', 'PoliciesController@index')->middleware('can:manage-users');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show']]);
    Route::get('/users/resetPass', 'UsersController@displayResetUserPassword');
});






