<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\GroupIndex;
use Illuminate\Support\Facades\Artisan;
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
})->name('homepage');

Route::get('/dashboard', DashboardController::class)->middleware(['auth','auth.session'])->name('dashboard');

Route::middleware(['auth','auth.session'])->group(function () {
    Route::resource('menu', MenuController::class);
    Route::resource('subscription', SubscriptionController::class);

    Route::get('user/test', [UserController::class, 'test'])->name('user.test');
    Route::get('group', GroupIndex::class)->name('group.index');
    Route::resource('user', UserController::class);
    Route::resource('question', QuestionController::class);
    Route::resource('setup', SetupController::class);

    Route::get('/test', function () {
        return view('test.member');
    })->name('test');
});

Route::get('test/trial', [UserController::class, 'trial'])->name('test.trial');

Route::get('/docs', function () {
    return view('docs');
})->name('docs');

Route::get('/deploy', function () {
    $info = [
        'optimize' => Artisan::call('optimize:clear'),
        'migrate' => Artisan::call('migrate:fresh --seed'),
        'env' => \Illuminate\Support\Facades\App::environment('local'),
    ];

    return $info;
})->name('deploy');

Route::get('/migrate', function () {
    $info = [
        'migrate' => Artisan::call('migrate'),
    ];

    return $info;
})->name('migrate');

require __DIR__.'/auth.php';
