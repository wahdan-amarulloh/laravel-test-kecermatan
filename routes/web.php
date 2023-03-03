<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('homepage');
});

Route::get('/dashboard', DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::get('/test', function () {
    return view('test.member');
})->name('test');

Route::middleware(['auth'])->group(function () {
    Route::resource('menu', MenuController::class);
    Route::resource('subscription', SubscriptionController::class);
    Route::resource('user', UserController::class);
});

Route::get('/docs', function () {
    return view('docs');
})->name('docs');

require __DIR__.'/auth.php';
