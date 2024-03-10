<?php

namespace App\Http\Controllers;

use App\Models\StaffModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class StaffProfileController extends Controller
{
    public function staffProfile($uid)
    {
        $staffData = StaffModel::where('uid', '=', $uid)->get();

        return view('admin.staff-profile')->with(compact('staffData'));
    }


    public function getStaffProfileAttendance(Request $request)
    {
        $uid = $request->uid;
        if ($request->ajax()) {
            $data = DB::table('attendance')->where('uid', '=', $uid)->orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $editUrl = route('admin.editAttendance', $data->id);
                    $btn = "
                            <div class='dropdown action-dropdown'>
                                    <button class='btn dropdown-toggle' type='button'
                                        data-bs-toggle='dropdown'>
                                        <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                    </button>
                                    <div class='dropdown-menu border py-2'>
                                        <a class='dropdown-item'
                                            href='$editUrl'><i
                                                class='fas fa-edit text-primary'></i> Edit</a>
                                        <a class='dropdown-item' href='#!'
                                            onclick=single_deleteConfirm('attendance',[$id],'false','','')><i
                                                class='fas fa-trash text-danger'></i>
                                            Delete</a>
                                        
                                    </div>
                                </div>
                        ";
                    return $btn;
                })
                ->addColumn('checkbox', function ($data) {
                    $checkbox = $data->id;
                    return $checkbox;
                })

                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->editColumn('date', function ($data) {
                    return showDate($data->date);
                })
                ->editColumn('login', function ($data) {
                    return ($data->login == null) ? '---' : showTime($data->login);
                })
                ->editColumn('logout', function ($data) {
                    return ($data->logout == null) ? '---' : showTime($data->logout);
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == 'PP') {
                        return "<span class='rounded-circle bg-success attendance-status'>PP</span>";
                    } elseif ($data->status == 'AA') {
                        return "<span class='rounded-circle bg-danger attendance-status'>AA</span>";
                    } elseif ($data->status == 'WH') {
                        return "<span class='rounded-circle bg-warning attendance-status'>WH</span>";
                    } elseif ($data->status == 'OL') {
                        return "<span class='rounded-circle bg-info attendance-status'>OL</span>";
                    }
                })

                ->setRowClass(function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        return '';
                    } else {
                        return 'table-danger';
                    }
                })
                ->rawColumns(['action', 'checkbox', 'created_at',  'date', 'status'])
                ->toJson();

            return view('admin.staff-profile');
        }
    }
    public function getStaffProfileleave(Request $request)
    {
        if ($request->ajax()) {
            $uid = $request->uid;
            $data = DB::table('leaves')->where('uid', '=', $uid)->orderBy('id', 'desc')->get();


            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route("admin.editLeave", $id);
                    $btn = "
                        <div class='dropdown action-dropdown'>
                                <button class='btn dropdown-toggle' type='button'
                                    data-bs-toggle='dropdown'>
                                    <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                </button>
                                <div class='dropdown-menu border py-2'>
                                    
                                    <a class='dropdown-item'
                                        href='$edit_url'><i
                                            class='fas fa-edit text-primary'></i> Edit</a>
                                    <a class='dropdown-item' href='#!'
                                        onclick=single_deleteConfirm('leaves',[$id],'false','','')><i
                                            class='fas fa-trash text-danger'></i>
                                        Delete</a>
                                    
                                </div>
                            </div>
                    ";
                    return $btn;
                })
                ->addColumn('checkbox', function ($data) {
                    $checkbox = $data->id;
                    return $checkbox;
                })

                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->editColumn('l_from', function ($data) {
                    return showDate($data->l_from);
                })

                ->editColumn('l_to', function ($data) {
                    return showDate($data->l_to);
                })

                ->editColumn('date', function ($data) {
                    return showDate($data->date);
                })

                ->editColumn('des', function ($data) {
                    return  "<p style='max-width:300px'> $data->des </p>";
                })

                ->editColumn('status', function ($data) {
                    if ($data->status == 'Approved') {
                        return "<span class='badge text-bg-success'>$data->status</span>";
                    } elseif ($data->status == 'Denied') {
                        return "<span class='badge text-bg-danger'>$data->status</span><br><p><b>Reason :</b> $data->reject_reason</p>";
                    } elseif ($data->status == 'Pending') {
                        return "<span class='badge text-bg-warning'>$data->status</span>";
                    }
                })
                ->setRowClass(function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        return '';
                    } else {
                        return 'table-danger';
                    }
                })
                ->rawColumns(['action', 'checkbox', 'created_at',  'status', 'des'])
                ->toJson();
            return view('admin.staff-profile');
        }
    }
    public function getStaffProfileworksheet(Request $request)
    {
        if ($request->ajax()) {
            $uid = $request->uid;
            $data = DB::table('worksheet')->where('uid', '=', $uid)->orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()

                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->editColumn('date', function ($data) {
                    return showDate($data->date);
                })
                ->editColumn('description', function ($data) {
                    return  "<p >$data->description</p>";
                })

                ->setRowClass(function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        return '';
                    } else {
                        return 'table-danger';
                    }
                })
                ->rawColumns(['created_at', 'status', 'description'])
                ->toJson();
        }
    }
    public function getStaffProfilepayout(Request $request)
    {
        if ($request->ajax()) {
            $uid = $request->uid;
            $data = DB::table('released_payment')->where('uid', '=', $uid)->orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route('admin.editReleasePayment', $id);

                    $btn = "
                            <div class='dropdown action-dropdown'>
                                    <button class='btn dropdown-toggle' type='button'
                                        data-bs-toggle='dropdown'>
                                        <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                    </button>
                                    <div class='dropdown-menu border py-2'>
                                        
                                        <a class='dropdown-item'
                                            href='$edit_url'><i
                                                class='fas fa-edit text-primary'></i> Edit</a>
                                             
                                        <a class='dropdown-item' href='#!'
                                            onclick=single_deleteConfirm('released_payment',[$id],'false','','')><i
                                                class='fas fa-trash text-danger'></i>
                                            Delete</a>
                                    </div>
                                </div>
                        ";
                    return $btn;
                })
                ->addColumn('checkbox', function ($data) {
                    $checkbox = $data->id;
                    return $checkbox;
                })


                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->editColumn('date_time', function ($data) {
                    return showDateTime($data->date_time);
                })

                ->setRowClass(function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        return '';
                    } else {
                        return 'table-danger';
                    }
                })
                ->rawColumns(['action', 'checkbox', 'created_at',])
                ->toJson();
        }
    }
}
