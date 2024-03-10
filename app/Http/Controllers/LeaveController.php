<?php

namespace App\Http\Controllers;

use App\Models\LeaveModel;
use App\Exports\LeaveExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use PDO;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class LeaveController extends Controller
{
    public function addLeave()
    {
        return view('admin.add-leave');
    }
    public function saveLeave(Request $request)

    {
        $validator = Validator::make($request->all(), [
            "year" => "required",
            "month" => "required",
            "date" => "required",
            "staff" => "required",
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
            $saveData->year = trim($request->year);
            $saveData->month = trim($request->month);
            $saveData->date = trim($request->date);
            $saveData->uid = trim($request->staff);
            $saveData->l_from = trim($request->leave_from);
            $saveData->l_to = trim($request->leave_to);
            $saveData->status = "Approved";
            $saveData->des = trim($request->description);

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

    public function editLeave($id)
    {
        $data = LeaveModel::where('id', '=', $id)->get();
        return view('admin.edit-leave')->with(compact('data'));
    }
    public function updateLeave(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "year" => "required",
            "month" => "required",
            "date" => "required",
            "staff" => "required",
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

            $saveData  = LeaveModel::where('id', '=', $id)->get();

            if ($request->has('reason') && $request->reason != '') {
                $saveData[0]->reject_reason = trim($request->reason);
            }

            $saveData[0]->year = trim($request->year);
            $saveData[0]->month = trim($request->month);
            $saveData[0]->date = trim($request->date);
            $saveData[0]->uid = trim($request->staff);
            $saveData[0]->l_from = trim($request->leave_from);
            $saveData[0]->l_to = trim($request->leave_to);
            $saveData[0]->des = trim($request->description);
            $saveData[0]->status = $request->status;

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
    public function showAllLeave()
    {
        return view('admin.show-leave');
    }
    public function showPendingLeave()
    {
        return view('admin.show-pending-leave');
    }
    public function getLeaveData(Request $request)
    {
        if ($request->ajax()) {
            if ($request->has('status')) {
                $data = LeaveModel::where('status', '=', ucfirst($request->status))->orderBy('id', 'desc')->get();
            } else {
                $data = LeaveModel::orderBy('id', 'desc')->get();
            }

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $profile = route('admin.staffProfile', $data->uid);
                    $edit_url = route("admin.editLeave", $id);
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
                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'status'])
                ->toJson();
        }

        return view('admin.show-leave');
    }
    public function exportLeaveData()
    {
        return Excel::download(new LeaveExport(), 'leave-details.xlsx');
    }
}
