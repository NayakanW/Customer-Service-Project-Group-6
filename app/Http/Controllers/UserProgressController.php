<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProgressController extends Controller
{
    public function index()
    {
        return view('user.progress');
    }
}
