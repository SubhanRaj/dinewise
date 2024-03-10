<?php

namespace App\Http\Controllers\customer;

use Exception;
use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\CustomersModel;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class CustomerOrderController extends Controller
{
    public function PlaceOrder($table_no)
    {
        $table_no = base64_decode($table_no);
        // check table status 
        $arr_table_no = [$table_no];
        $orderDetails = Orders::with('customer')->where([
            ['selectedTable', '=', json_encode($arr_table_no)],
            ['table_status', '=', 0],
        ])->get();

        if (count($orderDetails) > 0) {
            $order_id = $orderDetails[0]->order_id;
        } else {
            $order_id = false;
        }
        $getCategory = ProductCategory::orderBy('cat_name', 'asc')->get();
        return view('customer.shop', ['table_no' => $table_no, 'category' => $getCategory, 'order_id' => $order_id]);
    }

    public function placeCustomerOrder(Request $request)
    {
        $products = $request->products;
        $amount = $request->amount;
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $no_of_people = $request->no_of_people;
        $dob = $request->dob;

        $order_instruction = $request->order_instruction;
        $table_no = $request->table_no;

        if ($request->has('order_id')) {
            //  update order and customer data
            DB::beginTransaction();

            $orderId = $request->order_id;
            $orderData = Orders::where([['order_id', '=', $orderId]])->first();

            $order_status = $orderData->status;

            if ($order_status == 'completed') {
                return response()->json([
                    'status' => true,
                    'order_id' => $orderId,
                    'msg' => "Your order has been completed",
                ]);
            } else {
                try {
                    $customer_id = $orderData->customer_id_or_booking_id;
                    // update order  
                    $orderData->productData = json_encode($products);
                    $orderData->no_of_people =   $no_of_people;
                    $orderData->orderInstruction =  $order_instruction;
                    $orderData->total_item =  $amount['items'];
                    $orderData->total_amount =  $amount['total_amount'];
                    $orderData->gst_amount =  $amount['gst'];
                    //code...
                    $order_data_save = $orderData->save();
                } catch (\Throwable $th) {
                    $order_data_save = false;
                    DB::rollBack();
                }

                // update customer 

                if ($order_data_save) {
                    try {
                        $customer_data = CustomersModel::find($customer_id);
                        $customer_data->name = $name;
                        $customer_data->phone = $phone;
                        $customer_data->email = $email;
                        $customer_data->dob = $dob;

                        //code...
                        $customer_data_registration = $customer_data->save();
                        DB::commit();
                        return response()->json([
                            'status' => true,
                            'order_id' => $orderId,
                            'msg' => "Order saved successfully 1",
                        ]);
                    } catch (\Throwable $th) {
                        DB::rollBack();
                        return response()->json([
                            'status' => false,
                            'msg' => "Failed to save order data",
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'msg' => "Failed to save order data",
                    ]);
                }
            }
        } else {
            // insert order and customer data 
            // customer registration 
            DB::beginTransaction();
            try {
                $customer = new CustomersModel();
                $customer->name = $name;
                $customer->phone = $phone;
                $customer->email = $email;
                $customer->dob = $dob;
                $customer_registration = $customer->save();
                $getLastCustomer = CustomersModel::orderBy('id', 'desc')->limit(1)->get();
                $customer_id = $getLastCustomer[0]->id;

                try {
                    $saveData = new Orders();
                    $orderId = generateId('orders_details', 'order_id');
                    $saveData->order_id = $orderId;
                    $saveData->productData = json_encode($products);
                    $saveData->selectedTable =  json_encode($table_no);
                    $saveData->no_of_people =   $no_of_people;
                    $saveData->customer_or_booking = 'customers';
                    $saveData->customer_id_or_booking_id = $customer_id;
                    $saveData->orderInstruction =  $order_instruction;
                    $saveData->total_item =  $amount['items'];
                    $saveData->total_amount =  $amount['total_amount'];
                    $saveData->gst_amount =  $amount['gst'];
                    $saveData->status = 'order taken';

                    //code...
                    $saveData->save();
                    DB::commit();
                    return response()->json([
                        'status' => true,
                        'order_id' => $orderId,
                        'msg' => "Order saved successfully 2",
                    ]);
                } catch (\Throwable $th) {
                    return response()->json([
                        'status' => false,
                        'error' => $th->getMessage(),
                        'msg' => "Failed to save order 2",
                    ]);
                }

            } catch (\Throwable $th) {
                $customer_registration = false;
                DB::rollBack();
            }
            // if ($customer_registration) {
            //     try {
            //         $saveData = new Orders();
            //         $orderId = generateId('orders_details', 'order_id');
            //         $saveData->order_id = $orderId;
            //         $saveData->productData = json_encode($products);
            //         $saveData->selectedTable =  json_encode($table_no);
            //         $saveData->no_of_people =   $no_of_people;
            //         $saveData->customer_or_booking = 'customers';
            //         $saveData->customer_id_or_booking_id = $customer_id;
            //         $saveData->orderInstruction =  $order_instruction;
            //         $saveData->total_item =  $amount['items'];
            //         $saveData->total_amount =  $amount['total_amount'];
            //         $saveData->gst_amount =  $amount['gst'];
            //         $saveData->status = 'order taken';

            //         //code...
            //         $saveData->save();
            //         DB::commit();
            //         return response()->json([
            //             'status' => true,
            //             'order_id' => $orderId,
            //             'msg' => "Order saved successfully 2",
            //         ]);
            //     } catch (\Throwable $th) {
            //         return response()->json([
            //             'status' => false,
            //             'error' => $th->getMessage(),
            //             'msg' => "Failed to save order 2",
            //         ]);
            //     }
            // } else {
            //     return response()->json([
            //         'status' => false,
            //         'msg' => "Failed to save order 3",
            //     ]);
            // }
        }
    }

    public function getOrderDetails(Request $request, $order_id)
    {
        $orderData  = Orders::with('customer')->where('order_id', '=', $order_id)->get();
        return response()->json([
            'order_data' => $orderData[0]
        ]);
    }
}
