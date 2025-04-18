<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/employee', function () {
    return view('employee.dashboard');
});

Route::get('/user', function () {
    return view('user.dashboard');
});

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
