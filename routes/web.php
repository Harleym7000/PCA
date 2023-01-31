<?php

use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

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

//Front-end links
Route::get('/', 'PagesController@index')->name('home');
Route::get('/about', 'PagesController@about');
Route::post('/events', 'PagesController@getEventsByFilters');
Route::post('/events/register', 'Events\EventsController@registerEventUser');
Route::get('/red-sails', 'RedSailsController@showFestivalOverview');
Route::get('/red-sails/{date}', 'RedSailsController@showProgrammeForDay');

//News page links
Route::group(['prefix' => 'news'], function() {
    Route::get('/', 'PagesController@news');
    Route::post('/', 'PagesController@getNewsByFilters');
    Route::get('/story/{id}', 'PagesController@showNewsStory');
});

//Events page links
Route::group(['prefix' => 'event'], function() {
    Route::get('/', 'PagesController@events');
    Route::get('/{id}', 'PagesController@showEvent');
    Route::post('/register/guest', 'MailSend@registerEventGuest');
    Route::get('/register/guest', 'MailSend@showRegisterEventGuest');
});

Route::get('/contact-us', 'PagesController@contact');
Route::post('/contact-submit', 'MailSend@contact_us');
Route::post('/subscribe', 'MailSend@subscribe');
Route::get('sub/verify/{token?}', 'MailSend@verified');
Route::get('event/verify/{token?}', 'MailSend@eventVerified');
Route::post('/event/reg/confirm', 'MailSend@validateEventToken');
Route::get('/event/register/cancel/{id?}', 'MailSend@cancelEventRegGuest');
Route::post('/user/create/setPassword/{id}', 'PagesController@createUserPassword');

//Auth Routes
Auth::routes(['verify' => true]);
Route::get('/register', 'Auth\RegisterController@index');
Route::post('/register', 'Auth\RegisterController@create');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/users/resetPass', 'Admin\UsersController@displayResetUserPassword');
    Route::get('/user/profile', 'AccountsController@profile');
    Route::post('/user/profile', 'AccountsController@storeProfile');
    Route::post('/user/profile/update', 'AccountsController@updateProfile');
    Route::post('/user/profile/delete/{id}', 'AccountsController@deleteAccount');
    Route::get('/user/profile/create', 'AccountsController@createProfile');
});

//Member links
Route::get('/member', 'MemberController@index')->name('member')->middleware('auth', 'can:view-policy');
Route::post('/policy/download/{filename}', 'PoliciesController@downloadFile')->middleware('auth', 'can:view-policy');
Route::get('/policies', 'MemberController@viewPolicies')->middleware('auth', 'can:view-policy');

//Event Manager Links
Route::namespace('Events')->prefix('events')->name('events.')->middleware('auth', 'can:manage-events')->group(function(){
    Route::get('/index', 'EventsController@index')->name('event');
    Route::get('/edit/{id}', 'EventsController@edit')->name('event-edit');
    Route::put('/edit/{id}', 'EventsController@update');
    Route::get('/registered/{id}', 'EventsController@showRegistered');
    Route::get('/create', 'EventsController@create');
    Route::post('/create', 'EventsController@store');
    Route::post('/delete', 'EventsController@destroy');
    Route::get('/photo_upload/{id}', 'EventsController@showUploadImages');
    Route::post('/photo_upload/{id}', 'EventsController@uploadImages');
    Route::post('/delete_photos/{id}', 'EventsController@deleteImages');
    Route::post('/search', 'EventsController@searchEvents');
});

//Red Sails Links
Route::get('/events/red-sails', 'RedSailsController@index')->middleware('auth', 'can:manage-events');
Route::post('/events/red-sails/new', 'RedSailsController@addNewFestival')->middleware('auth', 'can:manage-events');
Route::post('/events/red-sails/delete/{id}', 'RedSailsController@deleteFestival')->middleware('auth', 'can:manage-events');
Route::get('/events/red-sails/programme/{id}', 'RedSailsController@addFestivalProgramme')->middleware('auth', 'can:manage-events');
Route::post('/events/red-sails/programme/{id}', 'RedSailsController@addProgramme')->middleware('auth', 'can:manage-events');
Route::get('/events/red-sails/programme/selectEdit/{id}', 'RedSailsController@editFestivalProgramme')->middleware('auth', 'can:manage-events');
Route::get('/events/red-sails/programme/edit/{id}', 'RedSailsController@showEditProgramme')->middleware('auth', 'can:manage-events');
Route::post('/events/red-sails/programme/edit/{id}', 'RedSailsController@updateProgramme')->middleware('auth', 'can:manage-events');
Route::post('/events/red-sails/programme/editDates/{id}', 'RedSailsController@updateFestivalDates')->middleware('auth', 'can:manage-events');
Route::post('/events/red-sails/deleteProgramme/{id}', 'RedSailsController@deleteProgramme')->middleware('auth', 'can:manage-events');


//User links
Route::group(['prefix' => 'user'], function () {
    Route::get('/events', 'AccountsController@events')->middleware('auth', 'can:view-policy');
    Route::get('/committees/{id}', 'AccountsController@showCommittees')->middleware('auth', 'can:view-policy');
    Route::put('/committees/update/{id}', 'Admin\UsersController@updateUserCauses')->middleware('auth', 'can:manage-users')->name('user.committees.update');
    Route::get('/create/verify/{token?}', 'MailSend@validateUserToken');
});

Route::delete('cancel_reg/{id}', [
    'uses' => 'AccountsController@cancelReg'
])->middleware('auth');

//Author links
Route::namespace('News')->prefix('news')->name('news.')->middleware('auth', 'can:manage-news')->group(function(){
Route::get('/index', 'NewsController@index');
Route::get('/edit/{id}', 'NewsController@edit')->name('edit-news');
Route::put('/edit/{id}', 'NewsController@update')->name('news-update');
Route::get('/create', 'NewsController@create');
Route::post('/create', 'NewsController@store');
Route::post('/delete', 'NewsController@destroy');
Route::post('/search', 'NewsController@searchNews');
});

//Admin links
Route::group(['middleware' => 'auth', 'middleware' => 'can:manage-users', 'prefix' => 'admin'], function() {
    Route::get('/contact', 'ContactController@index');
    Route::get('/userstest', 'Admin\UsersController@brdindex');
    Route::get('/dashboard', 'DashboardsController@admin');
    Route::post('users/processResetPass', 'Admin\UsersController@resetUserPassword');
    Route::get('/getContactMessages', 'ContactController@getMessages');
    Route::post('/users/getByFilter', 'Admin\UsersController@getUsersByFilters');
    Route::post('/getUserCauses', 'Admin\UsersController@getUserCauses');
    Route::get('/getCommitteeGrowth', 'DashboardsController@getCommitteeGrowth');
    Route::get('/getSiteTraffic', 'DashboardsController@getSiteTraffic');
    Route::get('/contact/reply/{id}', 'ContactController@show');
    Route::post('/contact/reply/{id}', 'MailSend@contact_response');
    Route::post('/contact/close', 'ContactController@closeRequest');
    Route::post('/contact/flipToRead', 'ContactController@flipToRead');
    Route::post('/contact/flipToUnread', 'ContactController@flipToUnread');
    Route::post('/contact/delete', 'ContactController@destroy');
    Route::post('/contact/filter', 'ContactController@filter');
    Route::get('/events/applications', 'ApproveController@eventApplications');
    Route::post('/events/approve', 'ApproveController@approveEvent');
    Route::post('/events/amendApp', 'ApproveController@amendAppSubmit');
    Route::delete('/events/rejectApp/{id}', 'ApproveController@rejectApp');
    Route::get('/events/amend-application/{id}', 'ApproveController@amendApp');
    Route::post('/users/createNew', 'MailSend@createdUserReg');
});
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show']]);
    Route::post('/users/search', 'UsersController@searchUser');
    Route::get('/users/resetPass', 'UsersController@displayResetUserPassword');
    Route::get('/users/{id}/edit', 'UsersController@edit');
});
Route::post('/meeting/update', 'AdminPagesManagerController@updateMeeting')->middleware('auth', 'can:manage-users');

//Policy links
Route::get('/policy-docs', 'PoliciesController@index')->middleware('auth', 'can:manage-users');
Route::post('/policy/upload', 'PoliciesController@store')->middleware('auth', 'can:manage-users');
Route::get('/policy/download/{filename}', 'PoliciesController@downloadFile')->name('downloadFile')->middleware('auth', 'can:manage-users');
Route::post('/policy/delete/{filename}', 'PoliciesController@destroy')->middleware('auth', 'can:manage-users');







