<?php

namespace App\Http\Controllers;

use App\Models\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserAccessController extends Controller
{
    public function addUsers()
    {
        return view('admin.add-users');
    }
    public function saveUsers(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required|unique:logins,user_id",
            "two_fa" => "required",

        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add data',
                'redirect' => '0'
            ]);
        } else {

            $staffData = getStaffDetailsUsingUid($request->staff);


            $saveData  = new LoginModel();
            $saveData->user_id = trim($request->staff);
            $saveData->role = "STAFF";
            $saveData->email = $staffData[0]->email;
            $saveData->phone = $staffData[0]->phone;
            $saveData->two_fa_email = $request->two_fa;

            $saveStatus = $saveData->save();
            if ($saveStatus === true) {
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
    public function editUsers($id)
    {
        $data = LoginModel::where('id', '=', $id)->get();
        return view('admin.edit-user')->with(compact('data'));
    }
    public function updateUsers(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required|unique:logins,user_id,$id",
            "two_fa" => "required",
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update data',
                'redirect' => '0'
            ]);
        } else {

            $staffData = getStaffDetailsUsingUid($request->staff);


            $saveData  = LoginModel::where('id', '=', $id)->get();
            $saveData[0]->user_id = trim($request->staff);
            $saveData[0]->role = "STAFF";
            $saveData[0]->email = $staffData[0]->email;
            $saveData[0]->phone = $staffData[0]->phone;
            $saveData[0]->two_fa_email = $request->two_fa;

            $saveStatus = $saveData[0]->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Data update successfully',
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
    public function showUsers()
    {
        return view('admin.show-user');
    }
    public function getUsersData(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('logins')->where('role', '=', "STAFF")->orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route("admin.editUsers", $id);
                    $profile = route('admin.staffProfile', $data->user_id);
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
                                        href='$edit_url'><i
                                            class='fas fa-edit text-primary'></i> Edit</a>
                                    <a class='dropdown-item' href='#!'
                                        onclick=single_deleteConfirm('logins',[$id],'false','','')><i
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
                    $staffData  = getStaffDetailsUsingUid($data->user_id);
                    if ($staffData != false) {
                        $fileArr = json_decode($staffData[0]->profile_picture, true);
                        $file = getMediaFile($fileArr[0]['file_id']);
                        return $file;
                    } else {
                        return "<span class='badge rounded-pill text-bg-danger'>Not Found</span>";
                    }
                })
                ->addColumn('name', function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->user_id);
                    if ($staffData != false) {
                        $staffData  = getStaffDetailsUsingUid($data->user_id);
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
                ->editColumn('two_fa_email', function ($data) {
                    if ($data->two_fa_email == 'YES') {
                        return "<span class='badge text-bg-success'>Enabled</span>";
                    } else {
                        return "<span class='badge text-bg-danger'>Disabled</span>";
                    }
                })

                ->setRowClass(function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->user_id);
                    if ($staffData != false) {
                        return '';
                    } else {
                        return 'table-danger';
                    }
                })
                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'two_fa_email'])
                ->toJson();
        }

        return view('admin.show-user');
    }
}
