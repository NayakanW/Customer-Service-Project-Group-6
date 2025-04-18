<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeHelpController extends Controller
{
    public function index()
    {
        return view('employee.help');
    }
}
