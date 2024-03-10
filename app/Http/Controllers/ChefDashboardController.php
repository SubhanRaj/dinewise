<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChefDashboardController extends Controller
{
    public function index()
    {
        return view('chef.index');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login-view');
    }
}
