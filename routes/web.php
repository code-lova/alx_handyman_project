<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    return "Cleared!";
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route for email verification code
Route::get('/verification', [App\Http\Controllers\Auth\RegisterController::class, 'verifyPage']);
Route::post('/verification', [App\Http\Controllers\Auth\RegisterController::class, 'verifyNow'])->name('verifyuser');







Route::controller(\App\Http\Controllers\Frontend\FrontendController::class)->group(function() {
    Route::get('/', 'Index')->name('front.page');

});
