<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeMoreController extends Controller
{
    public function index()
    {
        return view('employee.more');
    }
}
