<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttendanceModel;
use App\Exports\AttendanceExport;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function addAttendance()
    {
        return view('admin.add-attendance');
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
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Attendance saved successfully',
                    'redirect' => route('admin.addAttendance')
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
    public function editAttendance($id)
    {
        $data = AttendanceModel::where('id', '=', $id)->get();
        return view('admin.edit-attendance')->with(compact('data'));
    }
    public function updateAttendance(Request $request, $id)
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
            $updateData = AttendanceModel::where('id', '=', $id)->get();

            //   update data 
            $updateData[0]->status = $request->status;
            $updateData[0]->login = $request->login;
            $updateData[0]->logout = $request->logout;
            $saveStatus = $updateData[0]->save();


            if ($saveStatus === true) {
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

    public function showAttendance()
    {
        return view('admin.show-attendance');
    }
    public function getAttendanceData(Request $request)
    {
        if ($request->ajax()) {
            $data = AttendanceModel::orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $profile = route('admin.staffProfile', $data->uid);
                    $editUrl = route('admin.editAttendance', $data->id);
                    $btn = "
                            <div class='dropdown action-dropdown'>
                                    <button class='btn dropdown-toggle' type='button'
                                        data-bs-toggle='dropdown'>
                                        <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                    </button>
                                    <div class='dropdown-menu border py-2'>
                                        <a class='dropdown-item'
                                            href='$profile'><i
                                                class='fas fa-user text-primary'></i> Profile</a>
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
                ->addColumn('profile_picture', function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        $fileArr = json_decode($staffData[0]->profile_picture, true);
                        $file = getMediaFile($fileArr[0]['file_id']);
                        return $file;
                    } else {
                        return "<span class='badge rounded-pill text-bg-danger'>Not Found</span>";
                    }
                })
                ->addColumn('name', function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        $staffData  = getStaffDetailsUsingUid($data->uid);
                        return $staffData[0]->name;
                    } else {
                        return "<span class='badge rounded-pill text-bg-danger'>Not Found</span>";
                    }
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
                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'name', 'date', 'status'])
                ->toJson();
        }

        return view('admin.show-attendance');
    }

    public function exportAttendanceData(Request $request)
    {
        return Excel::download(new AttendanceExport($request->year, $request->month), 'attendance-data.xlsx');
    }
}
