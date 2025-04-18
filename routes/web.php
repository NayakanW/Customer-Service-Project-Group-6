<?php

use App\Http\Controllers\EmployeeHistory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\UserHistoryController;
use App\Http\Controllers\EmployeeHistoryController;

Route::get('/employee', function () {
    return view('employee.dashboard');
})->name('employee.dashboard');

Route::get('/user', function () {
    return view('user.dashboard');
})->name('user.dashboard');

// Untuk User
Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
Route::get('/user/history', [UserHistoryController::class, 'index'])->name('user.history');

// Untuk Employee
Route::get('/employee/profile', [EmployeeProfileController::class, 'index'])->name('employee.profile');
Route::get('/employee/history', [EmployeeHistoryController::class, 'index'])->name('employee.history');
