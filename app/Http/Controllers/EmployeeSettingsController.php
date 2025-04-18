<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeSettingsController extends Controller
{
    public function index()
    {
        return view('employee.settings');
    }
}
