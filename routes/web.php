<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\EventsController;
use App\Http\Middleware\IsEventManager;
use App\ContentPolicy;
use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('/about', [PagesController::class, 'about']);
Route::get('/events', [PagesController::class, 'events']);
Route::get('/news', [PagesController::class, 'news']);
Route::get('/contact-us', [PagesController::class, 'contact_us']);

Route::middleware(['auth', Spatie\Csp\AddCspHeaders::class . ':' . ContentPolicy::class])->middleware(IsEventManager::class)->group(function () {
    Route::get('/manage-events', [EventsController::class, 'index']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/register', [PagesController::class, 'register']);
