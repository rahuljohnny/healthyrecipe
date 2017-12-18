<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function getLogout()
    {
        Auth::logout();
        return redirect()->to('/login')->with(['message' => "Logged out!!"]);
    }
}
