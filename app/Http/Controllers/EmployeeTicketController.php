<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeTicketController extends Controller
{
    public function index()
    {
        return view('employee.ticket');
    }
}
