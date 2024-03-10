<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ChefPanelOrderDetails extends Controller
{
    public function singleOrder($order_id)
    {
        $orderData = Orders::where('order_id', '=', $order_id)->first();
        return view('chef.order-details')->with(compact('orderData'));
    }

    public function updateOrder(Request $request, $order_id)
    {
        $validator = Validator::make($request->all(), [
            'order_status' => "required",
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update status',
                'redirect' => '0'
            ]);
        } else {

            try {
                $orderData = Orders::where('order_id', '=', $order_id)->first();
                $productData = json_decode($orderData->productData, true);

                $index = $request->index;
                $order_status = $request->order_status;

                for ($i = 0; $i < count($index); $i++) {
                    $single_product = $productData[$index[$i]];
                    $status = $order_status[$index[$i]];
                    $single_product['order_status'] = $status;
                    $productData[$index[$i]] = $single_product;
                }

                $orderData->productData = $productData;
                $saveStatus = $orderData->save();
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Status updated successfully',
                    'redirect' => '0'
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => $th->getMessage(),
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function allOrder(Request $request)
    {
        if ($request->ajax()) {

            $data = Orders::orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()

                ->editColumn('created_at', function ($data) {
                    return showDateTime($data->created_at);
                })
                ->editColumn('updated_at', function ($data) {
                    return showDateTime($data->updated_at);
                })


                ->editColumn('view', function ($data) {
                    $href = route('chef.singleOrder', $data->order_id);
                    return  "<a href='$href' class='text-primary'>View</a>";
                })
                ->editColumn('chef_status', function ($data) {
                    if ($data->chef_status == 'RECEIVED') {
                        return "<span class='badge text-bg-primary font-14'>RECEIVED</span>";
                    } elseif ($data->chef_status  == 'PREPARING') {
                        return "<span class='badge text-bg-info font-14'>PREPARING</span>";
                    } elseif ($data->chef_status  == 'PREPARED') {
                        return "<span class='badge text-bg-success font-14'>PREPARED</span>";
                    } else {
                        return $data->status;
                    }
                })

                ->rawColumns(['chef_status', 'view'])
                ->toJson();
        }

        return view('chef.all-orders');
    }
}
