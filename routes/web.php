<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DoctorsController;

Route::prefix('admin')->name('admin.')->middleware('auth', 'check_type')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/change-password', [AdminController::class, 'change_password'])->name('change_password');

    // admin.departments.index
    // admin.departments.create
    // admin.departments.store
    // admin.departments.edit
    // admin.departments.update
    // admin.departments.destroy
    // admin.departments.show
    Route::resource('departments', DepartmentController::class);
    Route::resource('doctors', DoctorsController::class);

});


Route::get('/', function() {

    // return view('welcome');
})->name('homepage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::view('/not-allowed', 'not_allowed');

Route::get('verify-doctor/{id}', [DoctorsController::class, 'verify_doctor'])->name('verify_doctor');


Route::view('/testtttttt', 'emails.welcome_doctor', ['id' => 5, 'name' => 'ddd']);

