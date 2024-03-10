<?php

namespace App\Http\Controllers;

use App\Models\PricingUnit;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class PricingUnitController extends Controller
{

    // product category add page 
    // product category add page 

    public function addPricingUnitIndex()
    {
        return view('admin.add-pricing-units');
    }


    // Add Product Category 
    // Add Product Category 

    public function savePricingUnit(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            'pricing_unit' => "required|unique:pricing_units,unit",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add pricing unit',
                'redirect' => '0'
            ]);
        } else {
            $create = new PricingUnit();
            $create->unit_id = uid_generator();
            $create->unit = sanitizeInput($request->pricing_unit);
            $saveStatus = $create->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Pricing unit added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add pricing unit',
                    'redirect' => '0'
                ]);
            }
        }
    }


    // Show Product Category 
    // Show Product Category 

    public function showPricingUnit(Request $request)
    {
        if ($request->ajax()) {
            $data = PricingUnit::orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route("admin.editPricingUnit", $id);
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
                                            onclick=single_deleteConfirm('pricing_units',[$id],'false','','')><i
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
                ->rawColumns(['action', 'checkbox'])
                ->toJson();
        }

        return view('admin.view-pricing-units');
    }


    // Edit Product Category 
    // Edit Product Category 

    public function  editPricingUnit($id)
    {
        $data = PricingUnit::find($id);
        return view('admin.edit-pricing-units')->with(compact('data'));
    }

    // Update Product Category
    // Update Product Category
    public function updatePricingUnit(Request $request, $id)
    {

        $validator =  Validator::make($request->all(), [
            'pricing_unit' => "required|unique:pricing_units,unit, $id",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update pricing unit',
                'redirect' => '0'
            ]);
        } else {
            $update = PricingUnit::find($id);
            $update->unit = sanitizeInput($request->pricing_unit);
            $saveStatus = $update->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Pricing unit updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update pricing unit',
                    'redirect' => '0'
                ]);
            }
        }
    }
}
