<?php

namespace App\Http\Controllers;

use App\Exports\AdvancePaymentExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\AdvancePaymentModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class AdvancePaymentController extends Controller
{
    public function addAdvancePaymentIndex()
    {
        return view('admin.add-advance-payment');
    }
    public function saveAdvancePayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required",
            "year" => "required",
            "month" => "required",
            "date" => "required",
            "amount" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add data',
                'redirect' => '0'
            ]);
        } else {

            $saveData  = new AdvancePaymentModel();
            $saveData->uid = trim($request->staff);
            $saveData->amount = trim($request->amount);
            $saveData->month = trim($request->month);
            $saveData->year = trim($request->year);
            $saveData->date = trim($request->date);

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
    public function editAdvancePaymentIndex($id)
    {
        $data = AdvancePaymentModel::where('id', '=', $id)->get();
        return view('admin.edit-advance-payment')->with(compact('data'));
    }
    public function updateAdvancePayment(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required",
            "year" => "required",
            "month" => "required",
            "date" => "required",
            "amount" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update data',
                'redirect' => '0'
            ]);
        } else {

            $saveData  = AdvancePaymentModel::where('id', '=', $id)->get();
            $saveData[0]->uid = trim($request->staff);
            $saveData[0]->amount = trim($request->amount);
            $saveData[0]->month = trim($request->month);
            $saveData[0]->year = trim($request->year);
            $saveData[0]->date = trim($request->date);

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
    public function showAdvancePaymentIndex()
    {
        return view('admin.show-advance-payment');
    }
    public function getAdvancePaymentData(Request $request)
    {
        if ($request->ajax()) {
            $data = AdvancePaymentModel::orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $profile = route('admin.staffProfile', $data->uid);
                    $edit_url = route('admin.editAdvancePaymentIndex', $id);
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
                                            onclick=single_deleteConfirm('advance_payment',[$id],'false','','')><i
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
                    // return '';
                })
                ->addColumn('name', function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        $staffData  = getStaffDetailsUsingUid($data->uid);
                        return $staffData[0]->name;
                    } else {
                        return "<span class='badge rounded-pill text-bg-danger'>Not Found</span>";
                    }
                    return '';
                })


                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->editColumn('amount', function ($data) {
                    return IND_num_format($data->amount);
                })
                ->editColumn('date', function ($data) {
                    return showDate($data->date);
                })

                ->setRowClass(function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        return '';
                    } else {
                        return 'table-danger';
                    }
                })
                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'name', 'date'])
                ->toJson();
        }

        return view('admin.show-advance-payment');
    }

    public function exportAdvancePaymentData(Request $request)
    {
        return Excel::download(new AdvancePaymentExport($request->year, $request->month), 'advance-payment-details.xlsx');
    }
}
