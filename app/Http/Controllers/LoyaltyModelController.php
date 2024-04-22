<?php

namespace App\Http\Controllers;

use App\Models\LoyaltyModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class LoyaltyModelController extends Controller
{
    public function loyaltySetup()
    {
        return view('admin.add-loyalty');
    }
    public function saveLoyaltySetup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "min_order_amount" => "required",
            "loyalty_points" => "required",
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add loyalty.',
                'redirect' => '0'
            ]);
        } else {

            try {

                $saveData  = new LoyaltyModel();
                $saveData->amount = sanitizeInput($request->min_order_amount);
                $saveData->points = sanitizeInput($request->loyalty_points);

                $saveData->save();

                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Loyalty added successfully',
                    'redirect' => '0'
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add loyalty.',
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function  editLoyaltySetup($id)
    {
        $data = LoyaltyModel::findOrFail($id);
        return view('admin.edit-loyalty', ['data' => $data]);
    }

    public function  updateLoyaltySetup(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "min_order_amount" => "required",
            "loyalty_points" => "required",
        ]);



        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update loyalty.',
                'redirect' => '0'
            ]);
        } else {

            try {

                $saveData = LoyaltyModel::find($id);
                $saveData->amount = sanitizeInput($request->min_order_amount);
                $saveData->points = sanitizeInput($request->loyalty_points);

                $saveData->save();

                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Loyalty updated successfully',
                    'redirect' => '0'
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update loyalty.',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function showLoyaltySetup(Request $request)
    {
        if ($request->ajax()) {
            $data = LoyaltyModel::orderBy('id', 'desc')->get();
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route("admin.editLoyaltySetup", $id);

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
                                            onclick=single_deleteConfirm('loyalty',[$id],'false','','')><i
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

                ->rawColumns(['action', 'checkbox',])
                ->toJson();
        }
        return view('admin.show-loyalty');
    }

    public function getLoyaltySetup(Request $request)
    {
        $loyaltyData = LoyaltyModel::orderBy('amount', 'ASC')->get();
        if (count($loyaltyData) > 0) {
            return $loyaltyData;
        } else {
            return response()->json([
                'status' => false
            ]);
        }
    }
}
