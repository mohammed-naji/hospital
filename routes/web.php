<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'check_type')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
});


Route::get('/', function() {

    // return view('welcome');
})->name('homepage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/not-allowed', 'not_allowed');
