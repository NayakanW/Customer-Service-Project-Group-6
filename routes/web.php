<?php

use App\Http\Controllers\EmployeeHistory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserHistoryController;
use App\Http\Controllers\UserSettingsController;
use App\Http\Controllers\UserHelpController;
use App\Http\Controllers\UserMoreController;
use App\Http\Controllers\UserProgressController;
use App\Http\Controllers\EmployeeProfileController;
use App\Http\Controllers\EmployeeHistoryController;
use App\Http\Controllers\EmployeeSettingsController;
use App\Http\Controllers\EmployeeHelpController;
use App\Http\Controllers\EmployeeMoreController;
use App\Http\Controllers\EmployeeReportController;
use App\Http\Controllers\UserTicketController;
use App\Http\Controllers\UserMessageController;
use App\Http\Controllers\EmployeeTicketController;
use App\Http\Controllers\EmployeeMessageController;
use App\Http\Controllers\EmployeePhoneController;

Route::get('/employee', function () {
    return view('employee.dashboard');
})->name('employee.dashboard');

Route::get('/user', function () {
    return view('user.dashboard');
})->name('user.dashboard');

// Untuk User
Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
Route::get('/user/history', [UserHistoryController::class, 'index'])->name('user.history');
Route::get('/user/settings', [UserSettingsController::class, 'index'])->name('user.settings');
Route::get('/user/help', [UserHelpController::class, 'index'])->name('user.help');
Route::get('/user/more', [UserMoreController::class, 'index'])->name('user.more');
Route::get('/user/progress', [UserProgressController::class, 'index'])->name('user.progress');
Route::get('/user/ticket', [UserTicketController::class, 'index'])->name('user.ticket');
Route::get('/user/message', [UserMessageController::class, 'index'])->name('user.message');

// Untuk Employee
Route::get('/employee/profile', [EmployeeProfileController::class, 'index'])->name('employee.profile');
Route::get('/employee/history', [EmployeeHistoryController::class, 'index'])->name('employee.history');
Route::get('/employee/settings', [EmployeeSettingsController::class, 'index'])->name('employee.settings');
Route::get('/employee/help', [EmployeeHelpController::class, 'index'])->name('employee.help');
Route::get('/employee/more', [EmployeeMoreController::class, 'index'])->name('employee.more');
Route::get('/employee/report', [EmployeeReportController::class, 'index'])->name('employee.report');
Route::get('/employee/ticket', [EmployeeTicketController::class, 'index'])->name('employee.ticket');
Route::get('/employee/message', [EmployeeMessageController::class, 'index'])->name('employee.message');
Route::get('/employee/phone', [EmployeePhoneController::class, 'index'])->name('employee.phone');
