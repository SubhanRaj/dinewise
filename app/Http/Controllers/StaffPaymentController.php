<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StaffAccountDetails;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class StaffPaymentController extends Controller
{
    public function accountDetails()
    {
        $loginData = loginData(session()->get('abcdefgh'));
        $session_user_id = $loginData['user_id'];
        $data = StaffAccountDetails::where('uid', '=', $session_user_id)->get();
        return view('staff.account-details')->with(compact('data'));
    }
    public function incrementedPaymentDetails(Request $request)
    {

        $loginData = loginData(session()->get('abcdefgh'));
        $session_user_id = $loginData['user_id'];
        if ($request->ajax()) {
            $data = DB::table('salary_increment')->where('uid', '=', $session_user_id)->orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('amount', function ($data) {
                    return IND_num_format($data->amount);
                })
                ->rawColumns(['created_at', 'updated_at'])
                ->toJson();
        }

        return view('staff.incremented-payment');
    }
    public function advancePaymentDetails(Request $request)
    {
        $loginData = loginData(session()->get('abcdefgh'));
        $session_user_id = $loginData['user_id'];
        if ($request->ajax()) {
            $data = DB::table('advance_payment')->where('uid', '=', $session_user_id)->orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()





                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('amount', function ($data) {
                    return IND_num_format($data->amount);
                })
                ->editColumn('date', function ($data) {
                    return showDate($data->date);
                })

                ->toJson();
        }
        return view('staff.advance-payment');
    }
    public function receivedPaymentDetails(Request $request)
    {
        $loginData = loginData(session()->get('abcdefgh'));
        $session_user_id = $loginData['user_id'];
        if ($request->ajax()) {
            $data = DB::table('released_payment')->where('uid', '=', $session_user_id)->orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()



                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->editColumn('date_time', function ($data) {
                    return showDateTime($data->date_time);
                })

                ->rawColumns(['created_at', 'updated_at'])
                ->toJson();
        }
        return view('staff.received-payment');
    }
}
