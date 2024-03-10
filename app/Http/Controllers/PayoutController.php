<?php

namespace App\Http\Controllers;

use App\Exports\DefineSalaryExport;
use App\Exports\IncrementSalaryExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\StaffAccountDetails;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use App\Exports\StaffAccountDetailsExport;
use App\Models\DefineSalaryModal;
use App\Models\IncrementSalaryModel;
use Symfony\Component\CssSelector\Node\FunctionNode;

class PayoutController extends Controller
{
    // ============= Staff Account Details Start===============
    public function addAccountDetailsIndex()
    {
        return view('admin.add-staff-account-details');
    }

    public function accountDetailsIndex()
    {
        return view('admin.show-staff-account-details');
    }

    public function saveAccountDetails(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required|unique:staff_account_details,uid",
            "bank_name" => "required",
            "account_holder_name" => "required",
            "account_number" => "required|unique:staff_account_details,acc_no",
            "ifsc_code" => "required",
            "phone_number" => "required",

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add account details',
                'redirect' => '0'
            ]);
        } else {

            $saveData  = new StaffAccountDetails();
            $saveData->uid = trim($request->staff);
            $saveData->bank_name = trim($request->bank_name);
            $saveData->account_holder_name = trim($request->account_holder_name);
            $saveData->acc_no = trim($request->account_number);
            $saveData->ifsc_code = trim($request->ifsc_code);
            $saveData->phone_number = trim($request->phone_number);
            $saveData->gpay = trim($request->gpay_number);
            $saveData->phonepay = trim($request->phone_pay_number);
            $saveData->paytm = trim($request->paytm_number);
            $saveStatus = $saveData->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Account details added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add account details',
                    'redirect' => '0'
                ]);
            }
        }
    }



    public function getStaffAccountDetails(Request $request)
    {

        if ($request->ajax()) {
            $data = StaffAccountDetails::orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {

                    $id = $data->id;
                    $profile = route('admin.staffProfile', $data->uid);
                    $edit_url = route('admin.editAccountDetailsIndex', $id);
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
                                            onclick=single_deleteConfirm('staff_account_details',[$id],'false','','')><i
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
                ->setRowClass(function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        return '';
                    } else {
                        return 'table-danger';
                    }
                })
                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'name'])
                ->toJson();
        }

        return view('admin.show-staff-account-details');
    }


    public  function editAccountDetailsIndex($id)
    {
        $data = StaffAccountDetails::where('id', '=', $id)->get();
        return view('admin.edit-staff-account-details')->with(compact('data'));
    }

    public function updateAccountDetailsIndex(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required|unique:staff_account_details,uid, $id",
            "bank_name" => "required",
            "account_holder_name" => "required",
            "account_number" => "required|unique:staff_account_details,acc_no, $id",
            "ifsc_code" => "required",
            "phone_number" => "required",

        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update account details',
                'redirect' => '0'
            ]);
        } else {

            $saveData  =  StaffAccountDetails::where('id', '=', $id)->get();
            $saveData[0]->uid = trim($request->staff);
            $saveData[0]->bank_name = trim($request->bank_name);
            $saveData[0]->account_holder_name = trim($request->account_holder_name);
            $saveData[0]->acc_no = trim($request->account_number);
            $saveData[0]->ifsc_code = trim($request->ifsc_code);
            $saveData[0]->phone_number = trim($request->phone_number);
            $saveData[0]->gpay = trim($request->gpay_number);
            $saveData[0]->phonepay = trim($request->phone_pay_number);
            $saveData[0]->paytm = trim($request->paytm_number);
            $saveStatus = $saveData[0]->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Account details updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update account details',
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function staffAccountDetailsExport()
    {
        return Excel::download(new StaffAccountDetailsExport(), 'staff-account-details.xlsx');
    }

    // ================ Staff Account Details End ===================

    public function defineSalaryIndex()
    {
        return view('admin.define-salary');
    }
    public function saveDefineSalary(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required|unique:define_salary,uid",
            "amount" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add salary details',
                'redirect' => '0'
            ]);
        } else {

            $saveData  = new DefineSalaryModal();
            $saveData->uid = trim($request->staff);
            $saveData->starting_salary = trim($request->amount);
            $saveData->current_salary = trim($request->amount);

            $saveStatus = $saveData->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Salary details added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add salary details',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function showDefineSalaryIndex()
    {
        return view('admin.show-salary-details');
    }
    public function editDefineSalaryIndex($id)
    {
        $data = DefineSalaryModal::where('id', '=', $id)->get();
        return view('admin.edit-defined-salary')->with(compact('data'));
    }
    public function updateDefineSalary(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required|unique:define_salary,uid, $id",
            "amount" => "required"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update salary details',
                'redirect' => '0'
            ]);
        } else {
            $saveData  = DefineSalaryModal::where('id', '=', $id)->get();

            $checkIncrement = IncrementSalaryModel::where('uid', '=', $request->staff)->get();
            if (count($checkIncrement) != 0) {
                $total_increment = 0;
                foreach ($checkIncrement as $incrementitem) {
                    $total_increment += $incrementitem->amount;
                }
                $saveData[0]->current_salary = $total_increment + trim($request->amount);
            } else {
                $saveData[0]->current_salary = trim($request->amount);
            }

            $saveData[0]->uid = trim($request->staff);
            $saveData[0]->starting_salary = trim($request->amount);


            $saveStatus = $saveData[0]->save();
            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Salary details updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update salary details',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function getDefineSalary(Request $request)
    {
        if ($request->ajax()) {
            $data = DefineSalaryModal::orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $profile = route('admin.staffProfile', $data->uid);
                    $edit_url = route('admin.editDefineSalaryIndex', $id);
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
                                            onclick=single_deleteConfirm('define_salary',[$id],'false','','')><i
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
                ->addColumn('salary_incremented', function ($data) {
                    $incrementData  = getIncrementedSalary($data->uid);
                    if ($incrementData != false) {
                        $totalIncrement = 0;
                        foreach ($incrementData as $single_increment) {
                            $totalIncrement = $single_increment->amount + $totalIncrement;
                        }
                        return IND_num_format($totalIncrement);
                    } else {
                        return "0";
                    }
                })
                ->addColumn('increment_count', function ($data) {
                    $incrementData  = getIncrementedSalary($data->uid);
                    if ($incrementData != false) {
                        return count($incrementData);
                    } else {
                        return "0";
                    }
                })
                ->addColumn('current_salary', function ($data) {
                    $incrementData  = getIncrementedSalary($data->uid);
                    if ($incrementData != false) {
                        $totalIncrement = 0;
                        foreach ($incrementData as $single_increment) {
                            $totalIncrement = $single_increment->amount + $totalIncrement;
                        }
                        return IND_num_format($totalIncrement + $data->starting_salary);
                    } else {
                        return IND_num_format($data->starting_salary);
                    }
                })
                ->addColumn('per_day', function ($data) {
                    $incrementData  = getIncrementedSalary($data->uid);
                    if ($incrementData != false) {
                        $totalIncrement = 0;
                        foreach ($incrementData as $single_increment) {
                            $totalIncrement = $single_increment->amount + $totalIncrement;
                        }
                        return IND_num_format(round(($totalIncrement + $data->starting_salary) / 30, 2));
                    } else {
                        return IND_num_format(round(($data->starting_salary) / 30, 2));
                    }
                })
                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })
                ->editColumn('starting_salary', function ($data) {
                    return IND_num_format($data->starting_salary);
                })
                ->setRowClass(function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        return '';
                    } else {
                        return 'table-danger';
                    }
                })
                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'name', 'salary_incremented', 'increment_count', 'current_salary', 'per_day'])
                ->toJson();
        }

        return view('admin.show-staff-account-details');
    }
    public function exportDefineSalary()
    {
        return Excel::download(new DefineSalaryExport(), 'staff-salary-details.xlsx');
    }

    // ============= Salary Increment Start

    public function addSalaryIncrementIndex()
    {
        return view('admin.add-salary-increment');
    }
    public function saveSalaryIncrement(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required",
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

            $DefineSalary = DefineSalaryModal::where('uid', '=', $request->staff)->get();
            if (count($DefineSalary) != 0) {
                $Define_current_salary  = $DefineSalary[0]->current_salary;
                $DefineSalary[0]->current_salary = $Define_current_salary + $request->amount;
                $DefineSalary[0]->save();

                $saveData  = new IncrementSalaryModel();
                $saveData->uid = trim($request->staff);
                $saveData->amount = trim($request->amount);


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
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add data. Salary Not Defined',
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function showSalaryIncrement()
    {
        return view('admin.show-incremented-salary');
    }
    public function  editSalaryIncrement($id)
    {
        $data = IncrementSalaryModel::where('id', '=', $id)->get();
        return view('admin.edit-salary-increment')->with(compact('data'));
    }
    public function  updateSalaryIncrement(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "staff" => "required",
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


            $saveData  = IncrementSalaryModel::where('id', '=', $id)->get();

            $saveData[0]->uid = trim($request->staff);
            $saveData[0]->amount = trim($request->amount);
            $saveStatus = $saveData[0]->save();

            $DefineSalary = DefineSalaryModal::where('uid', '=', $request->staff)->get();
            $IncrementedSalary = IncrementSalaryModel::where('uid', '=', $request->staff)->get();

            if (count($DefineSalary) != 0) {
                $total_increment = 0;
                foreach ($IncrementedSalary as $incrementitem) {
                    $total_increment += $incrementitem->amount;
                }
                $DefineSalary[0]->current_salary = $total_increment + $DefineSalary[0]->starting_salary;
                $DefineSalary[0]->save();
            }

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


    public function getSalaryIncrementData(Request $request)
    {
        if ($request->ajax()) {
            $data = IncrementSalaryModel::orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route('admin.editSalaryIncrement', $id);
                    $profile = route('admin.staffProfile', $data->uid);
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
                                            onclick=single_deleteConfirm('salary_increment',[$id],'false','','')><i
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
                ->editColumn('amount', function ($data) {
                    return IND_num_format($data->amount);
                })


                ->setRowClass(function ($data) {
                    $staffData  = getStaffDetailsUsingUid($data->uid);
                    if ($staffData != false) {
                        return '';
                    } else {
                        return 'table-danger';
                    }
                })
                ->rawColumns(['action', 'checkbox', 'created_at', 'profile_picture', 'name'])
                ->toJson();
        }

        return view('admin.show-incremented-salary');
    }

    public function exportSalaryIncrementData()
    {
        return Excel::download(new IncrementSalaryExport(), 'staff-salary-increment-details.xlsx');
    }
    // ============= Salary Increment End
}
