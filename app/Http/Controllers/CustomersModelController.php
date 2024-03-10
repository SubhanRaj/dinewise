<?php

namespace App\Http\Controllers;

use App\Exports\CustomerExport;
use Illuminate\Http\Request;
use App\Models\CustomersModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class CustomersModelController extends Controller
{
    public function addCustomer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "customer_name" => "required",
            "phone_number" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add new customer',
                'redirect' => '0'
            ]);
        } else {
            $saveData = new CustomersModel();
            $saveData->name = sanitizeInput($request->customer_name);
            $saveData->phone = sanitizeInput($request->phone_number);
            $saveData->email = sanitizeInput($request->email);
            $saveData->dob =  $request->date_of_birth;
            $saveData->doa =  $request->date_of_anniversary;

            $saveStatus = $saveData->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Customer added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add new customer',
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function getCustomersData(Request $request)
    {
        if ($request->ajax()) {

            $data = CustomersModel::orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $btn = "
                            <div class='dropdown action-dropdown'>
                                    <button class='btn dropdown-toggle' type='button'
                                        data-bs-toggle='dropdown'>
                                        <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                    </button>
                                    <div class='dropdown-menu border py-2'>
                                    <a class='dropdown-item'
                                       href='javascript:;' ><i
                                        class='fas fa-edit text-primary'></i> Edit</a>
                                      
                                        <a class='dropdown-item' href='#!'
                                            onclick=single_deleteConfirm('customers',[$id],'false','','')><i
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
                ->editColumn('doa', function ($data) {
                    return showDate($data->doa);
                })
                ->editColumn('dob', function ($data) {
                    return showDate($data->dob);
                })


                ->rawColumns(['action', 'checkbox'])
                ->toJson();
        }
        return view('admin.view-customer');
    }

    public function exportCustomers(Request $request)
    {
        return Excel::download(new CustomerExport(), 'customers-data.xlsx');
    }
}
