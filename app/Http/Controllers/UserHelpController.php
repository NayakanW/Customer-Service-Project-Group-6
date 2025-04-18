<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHelpController extends Controller
{
    public function index()
    {
        return view('user.help');
    }
}
