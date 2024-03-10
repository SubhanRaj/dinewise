<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceptionDashboardController extends Controller
{
    public function index()
    {
        return view('reception.index');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('login-view')->with('true', 'You are now successfully signed out.');
    }
}
