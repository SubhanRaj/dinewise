<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use App\Models\LeaveModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class StaffLeaveController extends Controller
{
    public function  leaveRequest()
    {
        return view('staff.add-leave-request');
    }
    public function  saveLeaveRequest(Request $request)

    {
        $validator = Validator::make($request->all(), [
            "uid" => "required",
            "leave_from" => "required",
            "leave_to" => "required",
            "description" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add data',
                'redirect' => '0'
            ]);
        } else {

            $saveData  = new LeaveModel();
            $saveData->year = date('Y');
            $saveData->month = date('F');
            $saveData->date = date('Y-m-d');
            $saveData->uid = trim($request->uid);
            $saveData->l_from = trim($request->leave_from);
            $saveData->l_to = trim($request->leave_to);
            $saveData->type = "REQUEST";
            $saveData->status = "Pending";
            $saveData->des = trim($request->description);

            $saveStatus = $saveData->save();
            if ($saveStatus === true) {

                $mail_data = [
                    "subject" => "New Leave Request",
                    "data" => $request->toArray(),
                    "path" => array(),
                    "view" => 'emails.apply-leave'
                ];

                Mail::to(companyEmail())->send(new SendMail($mail_data));

                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Data added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add data',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function  editLeaveRequest($id)
    {
        $data = LeaveModel::where('id', '=', $id)->get();
        return view('staff.edit-leave-request')->with(compact('data'));
    }
    public function  updateLeaveRequest(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "leave_from" => "required",
            "leave_to" => "required",
            "description" => "required",
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update data',
                'redirect' => '0'
            ]);
        } else {

            $saveData  =  LeaveModel::where('id', '=', $id)->get();

            $saveData[0]->l_from = trim($request->leave_from);
            $saveData[0]->l_to = trim($request->leave_to);
            $saveData[0]->des = trim($request->description);
            $saveData[0]->status = "Pending";

            $saveStatus = $saveData[0]->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Data updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update data',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function  showLeaveRequest()
    {
        return view('staff.show-leave-request');
    }
    public function  getLeaveRequest(Request $request)
    {
        $loginData = loginData(session()->get('abcdefgh'));
        $session_user_id = $loginData['user_id'];

        if ($request->ajax()) {
            $data = DB::table('leaves')->where('uid', '=', $session_user_id)->orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route("staff.editLeaveRequest", $id);
                    if ($data->status == 'Pending') {
                        $delete = "<a class='dropdown-item' href='#!'
                        onclick=single_deleteConfirm('leaves',[$id],'false','','')><i
                            class='fas fa-trash text-danger'></i>
                        Cancel</a>";
                    } else {
                        $delete = '';
                    }
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
                                            $delete
                                    
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
                ->editColumn('l_from', function ($data) {
                    return showDate($data->l_from);
                })

                ->editColumn('l_to', function ($data) {
                    return showDate($data->l_to);
                })

                ->editColumn('date', function ($data) {
                    return showDate($data->date);
                })

                ->editColumn('status', function ($data) {
                    if ($data->status == 'Approved') {
                        return "<span class='badge text-bg-success'>$data->status</span>";
                    } elseif ($data->status == 'Denied') {
                        return "<span class='badge text-bg-danger'>$data->status</span>";
                    } elseif ($data->status == 'Pending') {
                        return "<span class='badge text-bg-warning'>$data->status</span>";
                    }
                })

                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'status'])
                ->toJson();
        }
        return view('staff.show-leave-request');
    }
}
