<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeePhoneController extends Controller
{
    public function index()
    {
        return view('employee.phone');
    }
}
