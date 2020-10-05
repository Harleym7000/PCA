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

//Redirect



//Front-end links
Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/news', 'PagesController@news');
Route::get('/events', 'PagesController@events');
Route::post('/events/register/guest', 'Events\EventsController@register');
Route::post('/events/register', 'Events\EventsController@registerEventUser');
Route::resource('/story', 'NewsController');
Route::resource('/event', 'EventsController');
Route::get('/contact-us', 'PagesController@contact');
Route::post('/contact-submit', 'MailSend@contact_us');
Route::post('/subscribe', 'MailSend@subscribe');

//Auth Routes
Auth::routes();
Route::get('/register', 'Auth\RegisterController@index');
Route::post('/register', 'Auth\RegisterController@create');

Route::get('/member', 'MemberController@index')->name('member');
Route::get('/users/resetPass', 'Admin\UsersController@displayResetUserPassword');

Route::get('/events/dashboard', 'DashboardsController@event');


//Event Manager Links
Route::namespace('Events')->prefix('events')->name('events.')->middleware('can:manage-events')->group(function(){
    Route::get('/index', 'EventsController@index')->name('event');
    Route::get('/edit/{id}', 'EventsController@edit')->name('event-edit');
    Route::put('/edit/{id}', 'EventsController@update');
    Route::get('/create', 'EventsController@create');
    Route::post('/create', 'EventsController@store');
});

// Route::get('/events/dashboard', 'DashboardsController@events');

//User links
Route::get('/user/profile', 'AccountsController@profile')->middleware('can:view-policy');
Route::post('/user/profile', 'AccountsController@update')->middleware('can:view-policy');
Route::get('/user/settings', 'AccountsController@settings')->middleware('can:view-policy');
Route::get('/user/events', 'AccountsController@events')->middleware('can:view-policy');
Route::delete('cancel_reg/{id}', [
    'uses' => 'AccountsController@cancelReg'
]);

//Author links
Route::namespace('News')->prefix('news')->name('news.')->middleware('can:manage-news')->group(function(){
Route::get('/index', 'NewsController@index');
Route::get('/edit/{id}', 'NewsController@edit')->name('edit-news');
});

//Admin links
Route::get('/admin/contact', 'ContactController@index');
Route::get('/admin/userstest', 'Admin\UsersController@brdindex');
Route::get('/admin/dashboard', 'DashboardsController@admin');
Route::get('/admin/pages', 'AdminPagesManagerController@index');
Route::get('/policy-docs', 'PoliciesController@index')->middleware('can:manage-users');
Route::post('/policy/upload', 'PoliciesController@store')->middleware('can:manage-users');
Route::get('/policy/download/{filename}', 'PoliciesController@downloadFile')->name('downloadFile');
Route::post('admin/users/processResetPass', 'Admin\UsersController@resetUserPassword');
Route::get('/admin/getContactMessages', 'ContactController@getMessages');
Route::post('/admin/getUserRole', 'Admin\UsersController@getUsersByRole');
Route::get('/admin/getAllUsers', 'Admin\UsersController@getAllUsers');
Route::post('/admin/getUserByName', 'Admin\UsersController@getUsersByName');
Route::post('/admin/getUserCauses', 'Admin\UsersController@getUserCauses');
Route::get('/admin/getCommitteeGrowth', 'DashboardsController@getCommitteeGrowth');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show']]);
    Route::get('/users/resetPass', 'UsersController@displayResetUserPassword');
    Route::get('/users/{id}/edit', 'UsersController@edit');
});






