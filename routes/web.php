<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EmployeeProfileController;
// use App\Http\Controllers\ProfileController;

Route::get('/employee', function () {
    return view('employee.dashboard');
});

Route::get('/user', function () {
    return view('user.dashboard');
});

// Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Untuk User
Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');

// Untuk Employee
Route::get('/employee/profile', [EmployeeProfileController::class, 'index'])->name('employee.profile');
