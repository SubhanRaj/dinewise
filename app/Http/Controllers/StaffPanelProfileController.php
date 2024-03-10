<?php

namespace App\Http\Controllers;

use App\Models\StaffModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class StaffPanelProfileController extends Controller
{
    public function profile($uid)
    {
        $staffData = StaffModel::where('uid', '=', $uid)->get();
        return view('staff.staff-profile')->with(compact('staffData'));
    }
}
