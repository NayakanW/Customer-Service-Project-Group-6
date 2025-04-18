<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserMoreController extends Controller
{
    public function index()
    {
        return view('user.more');
    }
}
