<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardUser extends Controller
{
    public function index()
    {
        return view('user.home');
    }
}
