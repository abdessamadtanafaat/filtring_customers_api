<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/custom-login',
    [App\Http\Controllers\AuthController::class, 'showLoginForm'])
    ->name('custom-login');

Route::post('/custom-login',
    [App\Http\Controllers\AuthController::class, 'handleLogin']);

Route::get('/user-page', function () {
    return view('user-page');
})->name('user-page')->middleware('is_logged');


Route::get('/user-page', function () {
    return view('user-page');
})->name('user-page')->middleware('is_logged');

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome')->middleware('is_logged');

Route::get('/customers',
    [App\Http\Controllers\CustomerController::class, 'index'])
    ->middleware('is_logged');

//Route::get('/customers', [CustomerController::class, 'index'])->name('customers');

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::post('/custom-login', function () {
//    return view('custom-login');
//});

//Route::get('/user-page', function () {
//    return view('user-page');
//})->middleware('is_logged');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
