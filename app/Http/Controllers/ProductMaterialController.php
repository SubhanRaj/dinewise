<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductMaterial;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductMaterialController extends Controller
{
    public function addMaterialIndex()
    {
        return view('admin.add-product-material');
    }
    public function saveMaterial(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'material_name' => "required",
            'quantity' => "required",
            'status' => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add material',
                'redirect' => '0'
            ]);
        } else {
            $create = new ProductMaterial();
            $create->material_id = uid_generator();
            $create->material = sanitizeInput($request->material_name);
            $create->qty = sanitizeInput($request->quantity);
            $create->status = sanitizeInput($request->status);
            $saveStatus = $create->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Material added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add material',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function editMaterial($id)
    {
        $data = ProductMaterial::find($id);
        return view('admin.edit-product-material')->with(compact('data'));
    }
    public function updateMaterial(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            'material_name' => "required",
            'quantity' => "required",
            'status' => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update material',
                'redirect' => '0'
            ]);
        } else {
            $update = ProductMaterial::find($id);
            $update->material = sanitizeInput($request->material_name);
            $update->qty = sanitizeInput($request->quantity);
            $update->status = sanitizeInput($request->status);
            $saveStatus = $update->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Material updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update material',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function showMaterial(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductMaterial::orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route("admin.editMaterial", $id);
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
                                        <a class='dropdown-item' href='#!'
                                            onclick=single_deleteConfirm('product_materials',[$id],'false','','')><i
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
                ->editColumn('status', function ($data) {
                    if ($data->status == 'instock') {
                        return "<span class='badge text-bg-success'>In Stock</span>";
                    } else {
                        return "<span class='badge text-bg-danger'>Out Of Stock</span>";
                    }
                })
                ->rawColumns(['action', 'checkbox', 'status'])
                ->toJson();
        }
        return view('admin.view-materials');
    }
}
