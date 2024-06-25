<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function aboutMe()
    {
        $user = Auth::user();
        return view('about-me', compact('user'));
    }
}
