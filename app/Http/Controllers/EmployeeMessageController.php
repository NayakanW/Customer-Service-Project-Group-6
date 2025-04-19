<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeMessageController extends Controller
{
    public function index()
    {
        return view('employee.message');
    }
}
