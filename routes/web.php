<?php

use Illuminate\Support\Facades\Route;

Route::get('/employee', function () {
    return view('employee.dashboard');
});

Route::get('/user', function () {
    return view('user.dashboard');
});


