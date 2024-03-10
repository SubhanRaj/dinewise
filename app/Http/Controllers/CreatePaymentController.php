<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreatePaymentModel;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\CreatedPaymentExport;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class CreatePaymentController extends Controller
{
    public function createPayment()
    {
        return view('admin.create-payment');
    }
    public function saveCreatePayment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required",
            "year" => "required",
            "month" => "required",
            "deduction" => "required",
            "bonus" => "required",
            "final_amount" => "required",
            "comment" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add data',
                'redirect' => '0'
            ]);
        } else {

            $saveData  = new CreatePaymentModel();
            $saveData->uid = trim($request->staff);
            $saveData->year = trim($request->year);
            $saveData->month = trim($request->month);
            $saveData->deduction = trim($request->deduction);
            $saveData->bonus = trim($request->bonus);
            $saveData->final_amount = trim($request->final_amount);
            $saveData->comment = trim($request->comment);

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
    public function editCreatePayment($id)
    {
        $data = CreatePaymentModel::where('id', '=', $id)->get();
        return view('admin.edit-created-payment')->with(compact('data'));
    }
    public function updateCreatePayment(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required",
            "year" => "required",
            "month" => "required",
            "deduction" => "required",
            "bonus" => "required",
            "final_amount" => "required",
            "comment" => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update data',
                'redirect' => '0'
            ]);
        } else {

            $saveData  =  CreatePaymentModel::where('id', '=', $id)->get();
            $saveData[0]->uid = trim($request->staff);
            $saveData[0]->year = trim($request->year);
            $saveData[0]->month = trim($request->month);
            $saveData[0]->deduction = trim($request->deduction);
            $saveData[0]->bonus = trim($request->bonus);
            $saveData[0]->final_amount = trim($request->final_amount);
            $saveData[0]->comment = trim($request->comment);
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
    public function showCreatedPayment()
    {
        return view('admin.show-created-payment');
    }
    public function getCreatedPayment(Request $request)
    {
        if ($request->ajax()) {
            $data = CreatePaymentModel::orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route('admin.editCreatePayment', $id);
                    $profile = route('admin.staffProfile', $data->uid);
                    if ($data->status == '0') {
                        $release_url = route('admin.releasePaymentIndex', $id);
                        $release = " <a class='dropdown-item' href='$release_url'  ><i  class='fas fa-hand-holding-usd text-primary'></i> Release Payment</a>";
                    } else {
                        $release = '';
                    }
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
                                                $release
                                        <a class='dropdown-item' href='#!'
                                            onclick=single_deleteConfirm('create_payment',[$id],'false','','')><i
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
                ->editColumn('final_amount', function ($data) {
                    return IND_num_format($data->final_amount);
                })
                ->editColumn('deduction', function ($data) {
                    return IND_num_format($data->deduction);
                })
                ->editColumn('bonus', function ($data) {
                    return IND_num_format($data->bonus);
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == '0') {
                        return "<span class='badge text-bg-warning'>Unpaid</span>";
                    } else {
                        return "<span class='badge text-bg-success'>Paid</span>";
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
                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'name', 'status'])
                ->toJson();
        }

        return view('admin.show-created-payment');
    }

    public function exportCreatedPayment()
    {
        return Excel::download(new CreatedPaymentExport(), 'created_payment.xlsx');
    }
}
