<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserTicketController extends Controller
{
    public function index()
    {
        return view('user.ticket');
    }
}
