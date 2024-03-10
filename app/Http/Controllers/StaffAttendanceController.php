<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\AttendanceModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class StaffAttendanceController extends Controller
{
    public function addAttendance()
    {
        $loginData = loginData(session()->get('abcdefgh'));
        $session_user_id = $loginData['user_id'];
        $uid = $session_user_id;
        return view('staff.add-attendance');
    }
    public function saveAttendance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to save attendance',
                'redirect' => '0'
            ]);
        } else {
            $checkData = AttendanceModel::where(
                [
                    ['date', '=', date('Y-m-d')],
                    ['uid', '=', $request->uid],
                ]
            )->get();
            if (count($checkData) != 0) {
                //   update data 
                $checkData[0]->status = $request->status;
                $checkData[0]->login = $request->login;
                $checkData[0]->logout = $request->logout;
                $saveStatus = $checkData[0]->save();
            } else {
                // insert data 
                $saveData = new AttendanceModel();
                $saveData->uid = $request->uid;
                $saveData->status = $request->status;
                $saveData->login = $request->login;
                $saveData->logout = $request->logout;
                $saveData->year =  date('Y');
                $saveData->month = strtoupper(date('F'));
                $saveData->date =  date('Y-m-d');
                $saveData->attendance_rule =   getActiveAttendanceRule();
                $saveStatus = $saveData->save();
            }

            if ($saveStatus === true) {
                $getAttenData = AttendanceModel::where(
                    [
                        ['date', '=', date('Y-m-d')],
                        ['uid', '=', $request->uid],
                    ]
                )->get();
                $id = $getAttenData[0]->id;
                $mail_data = [
                    "subject" => "Attendance Details",
                    "data" => $id,
                    "path" => array(),
                    "view" => 'emails.attendance-mail'
                ];

                Mail::to(companyEmail())->send(new SendMail($mail_data));

                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Attendance saved successfully',
                    'redirect' => route('staff.addAttendance')
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to save attendance',
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function showAttendance()
    {
        return view('staff.show-attendance');
    }

    public function editAttendance($id)
    {
        $data = AttendanceModel::where('id', '=', $id)->get();
        return view('staff.edit-attendance')->with(compact('data'));
    }
    public function  updateAttendance(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'status' => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update attendance',
                'redirect' => '0'
            ]);
        } else {
            $checkData = AttendanceModel::where('id', '=', $id)->get();

            //   update data 
            $checkData[0]->status = $request->status;
            $checkData[0]->login = $request->login;
            $checkData[0]->logout = $request->logout;
            $saveStatus = $checkData[0]->save();

            if ($saveStatus === true) {
                $mail_data = [
                    "subject" => "Attendance Details",
                    "data" => $id,
                    "path" => array(),
                    "view" => 'emails.attendance-mail'
                ];

                Mail::to(companyEmail())->send(new SendMail($mail_data));

                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Attendance updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update attendance',
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function getAttendanceData(Request $request)
    {
        $loginData = loginData(session()->get('abcdefgh'));
        $session_user_id = $loginData['user_id'];
        if ($request->ajax()) {
            $data = AttendanceModel::where('uid', '=', $session_user_id)->orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $editUrl = route('staff.editAttendance', $id);
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
                                    </div>
                                </div>
                        ";
                    return $btn;
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
                ->rawColumns(['action', 'created_at', 'date', 'status'])
                ->toJson();
        }

        return view('staff.show-attendance');
    }
}
