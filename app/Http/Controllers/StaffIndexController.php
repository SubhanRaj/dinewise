<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffIndexController extends Controller
{
    public function index()
    {
        return view('staff.index');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login-view')->with('true', 'You are now successfully signed out.');
    }
}
