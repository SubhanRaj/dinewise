<?php

namespace App\Http\Controllers;

use App\Models\TableModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class TableModelController extends Controller
{
    public function addTableIndex()
    {
        return view('admin.add-table');
    }
    public function saveTable(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'table_number' => "required|unique:tables,table_no",
            'capacity' => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add table',
                'redirect' => '0'
            ]);
        } else {
            $create = new TableModel();
            $create->table_no = sanitizeInput($request->table_number);
            $create->capacity = sanitizeInput($request->capacity);
            $saveStatus = $create->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Table added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add table',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function editTable($id)
    {
        $data = TableModel::find($id);
        return view('admin.edit-table')->with(compact('data'));
    }
    public function updateTable(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'table_number' => "required|unique:tables,table_no, $id",
            'capacity' => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update table',
                'redirect' => '0'
            ]);
        } else {
            $update = TableModel::find($id);
            $update->table_no = sanitizeInput($request->table_number);
            $update->capacity = sanitizeInput($request->capacity);
            $saveStatus = $update->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Table update successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update table',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function showTable(Request $request)
    {
        if ($request->ajax()) {
            $data = TableModel::orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route("admin.editTable", $id);
                    $generate_qr = route("admin.generateTableQr", $data->table_no);
                    $btn = "
                            <div class='dropdown action-dropdown'>
                                    <button class='btn dropdown-toggle' type='button'
                                        data-bs-toggle='dropdown'>
                                        <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                    </button>
                                    <div class='dropdown-menu border py-2'>
                                        <a class='dropdown-item'
                                            href='$generate_qr'><i
                                                class='fas fa-qrcode text-primary'></i> Generate QR</a>
                                        <a class='dropdown-item'
                                            href='$edit_url'><i
                                                class='fas fa-edit text-primary'></i> Edit</a>
                                        <a class='dropdown-item' href='#!'
                                            onclick=single_deleteConfirm('tables',[$id],'false','','')><i
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
                ->editColumn('table_no', function ($data) {
                    return   "<div class='table-box-design'> <span> $data->table_no </span></div> ";
                })


                ->rawColumns(['action', 'checkbox', 'table_no'])
                ->toJson();
        }

        return view('admin.view-table-data');
    }

    public function generateTableQr($table_no)
    {
        $customer_order_url = route('customer.customerShopping', base64_encode($table_no));
        return view('admin.table-qr', ['url' => $customer_order_url]);
    }
}
