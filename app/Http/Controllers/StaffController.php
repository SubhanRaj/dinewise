<?php

namespace App\Http\Controllers;

use App\Models\StaffModel;
use App\Exports\StaffExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function addStaffIndex()
    {
        return view('admin.add-staff');
    }

    public function addStaffSave(Request $request)
    {



        $validator = Validator::make($request->all(), [
            "uid" => "required|unique:staffs,uid",
            "name" => "required",
            "email" => "required|email|unique:staffs,email",
            "phone_number" => "required|unique:staffs,phone",
            "experience" => "required",
            "designation" => "required",
            "date_of_joining" => "required",
            "address" => "required",
            "profile_picture" => "required",
            "documents" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add staff details',
                'redirect' => '0'
            ]);
        } else {
            // $profile_pic =  json_decode($request->profile_picture, true);
            // $documents = json_decode($request->documents, true);


            $email = $request->email;
            $phone_number = $request->phone_number;
            $checkEmailPhone = StaffModel::where('email', '=', $email)
                ->orWhere('phone', '=', $phone_number)
                ->get();

            if (count($checkEmailPhone) != 0) {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add staff. Trying to submit duplicate email or phone number.',
                    'redirect' => '0'
                ]);
            } else {


                $saveData = new StaffModel();
                $saveData->uid = trim($request->uid);
                $saveData->name = trim($request->name);
                $saveData->email = trim($request->email);
                $saveData->phone = trim($request->phone_number);
                $saveData->work_ex = trim($request->experience);
                $saveData->designation = trim($request->designation);
                $saveData->doj = trim($request->date_of_joining);
                $saveData->address = trim($request->address);
                $saveData->profile_picture =  $request->profile_picture;
                $saveData->documents = $request->documents;
                $saveStatus = $saveData->save();
                if ($saveStatus === true) {
                    return response()->json([
                        'status' => true,
                        'errors' => '',
                        'message' => 'Staff added successfully',
                        'redirect' => '0'
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'errors' => '',
                        'message' => 'Failed to add staff',
                        'redirect' => '0'
                    ]);
                }
            }
        }
    }

    public function showStaffIndex()
    {
        return view('admin.show-staff');
    }

    public function editStaffIndex($id)
    {
        $data = StaffModel::where('id', '=', $id)->get();
        return view('admin.edit-staff')->with(compact('data'));
    }
    public function updateStaffIndex(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "uid" => "required|unique:staffs,uid,$id",
            "name" => "required",
            "email" => "required|email|unique:staffs,email,$id",
            "phone_number" => "required|unique:staffs,phone,$id",
            "experience" => "required",
            "designation" => "required",
            "date_of_joining" => "required",
            "address" => "required"

        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update staff details',
                'redirect' => '0'
            ]);
        } else {

            $saveData = StaffModel::where('id', '=', $id)->get();
            if ($request->has('profile_picture') && $request->profile_picture != '') {
                $profile_picture = $request->profile_picture;
            } else {
                $profile_picture = $saveData[0]->profile_picture;
            }
            if ($request->has('documents')  && $request->documents != '') {
                $documents = $request->documents;
            } else {
                $documents = $saveData[0]->documents;
            }



            $saveData[0]->uid = trim($request->uid);
            $saveData[0]->name = trim($request->name);
            $saveData[0]->email = trim($request->email);
            $saveData[0]->phone = trim($request->phone_number);
            $saveData[0]->work_ex = trim($request->experience);
            $saveData[0]->designation = trim($request->designation);
            $saveData[0]->doj = trim($request->date_of_joining);
            $saveData[0]->address = trim($request->address);
            $saveData[0]->profile_picture = $profile_picture;
            $saveData[0]->documents = $documents;

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
                    'message' => 'Failed to update staff details',
                    'redirect' => '0'
                ]);
            }
        }
    }




    public function getStaffData(Request $request)
    {
        if ($request->ajax()) {
            $data = StaffModel::orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $profile = route('admin.staffProfile', $data->uid);
                    $edit_url = route("admin.editStaffIndex", $id);
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
                                        onclick=single_deleteConfirm('staffs',[$id],'false','','')><i
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
                ->editColumn('profile_picture', function ($data) {
                    $fileArr = json_decode($data->profile_picture, true);
                    $file = getMediaFile($fileArr[0]['file_id']);
                    return $file;
                })
                ->editColumn('documents', function ($data) {
                    $img_url = asset('admin-assets/assets/images/icons/folders.png');
                    return "<img src='$img_url' class='table-documents' onclick=showDocuments('$data->uid')>";
                })
                ->editColumn('doj', function ($data) {
                    return showDate($data->doj);
                })
                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'documents', 'doj'])
                ->toJson();
        }

        return view('admin.show-staff');
    }



    public function export()
    {
        return Excel::download(new StaffExport, 'stafff.xlsx');
    }
}
