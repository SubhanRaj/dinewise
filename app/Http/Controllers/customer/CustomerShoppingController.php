<?php

namespace App\Http\Controllers\customer;

use App\Models\Orders;
use Illuminate\Http\Request;
use App\Models\CustomersModel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class CustomerShoppingController extends Controller
{
    public function customerShopping(Request $request, $table_no  = null)
    {
        if ($table_no != null) {
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
            return view('customer.shop', ['table_no' => $table_no,  'order_id' => $order_id]);
        } else {
            return view('customer.shop', ['table_no' => $table_no,  'order_id' => false]);
        }
    }

    public function customerShoppingPayment()
    {
        return view('customer.payment');
    }

    public function placeOrder(Request $request)
    {
        $products = $request->products;
        $amount = $request->amount;
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $no_of_people = $request->no_of_people;
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
                    'redirect' => route('customer.orderDetails', $orderId),
                ]);
            } else {
                try {
                    // merge old product data and new product data 

                    $customer_id = $orderData->customer_id_or_booking_id;
                    // update order  
                    $orderData->productData = json_encode($products);
                    $orderData->no_of_people =   $no_of_people;
                    $orderData->orderInstruction =  $order_instruction;
                    $orderData->total_item =  $amount['items'] + $orderData->total_item;
                    $orderData->total_amount =  $amount['total_amount'] + $orderData->total_amount;
                    $orderData->gst_amount =  $amount['gst'] + $orderData->gst_amount;

                    $orderData->save();
                    DB::commit();
                    return response()->json([
                        'status' => true,
                        'order_id' => $orderId,
                        'ordered_products' =>  $products,
                        'msg' => "Order saved successfully updated",
                        'redirect' => route('customer.orderDetails', $orderId),
                    ]);

                    // return response()->json([
                    //     'data' => json_encode($new_product_data)
                    // ]);
                } catch (\Throwable $th) {
                    $order_data_save = false;
                    DB::rollBack();

                    return response()->json([
                        'status' => false,
                        'error' => $th->getMessage(),
                        'msg' => "Failed to save order",
                    ]);
                }
            }
        } else {
            // check if the table is free or not
            $orderDetails = Orders::with('customer')->where([
                ['selectedTable', '=', json_encode($table_no)],
                ['table_status', '=', 0],
            ])->get();
            if (count($orderDetails) > 0) {
                return response()->json([
                    'status' => false,
                    'error' => '',
                    'msg' => "This table is under process for another order.",
                ]);
            } else {
                // insert order and customer data 
                // customer registration           
                DB::beginTransaction();
                try {
                    // check if customer already registered or not using phone number
                    $checkCustomerRegistration  = CustomersModel::where('phone', '=', $phone)->get();
                    if (count($checkCustomerRegistration) > 0) {
                        $customer_id = $checkCustomerRegistration[0]->id;
                    } else {
                        $customer = new CustomersModel();
                        $customer->name = $name;
                        $customer->phone = $phone;
                        $customer->email = $email;
                        $customer_registration = $customer->save();
                        $getLastCustomer = CustomersModel::orderBy('id', 'desc')->limit(1)->get();
                        $customer_id = $getLastCustomer[0]->id;
                    }
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
                        $saveData->date  = date('Y-m-d');
                        $saveData->month  = date('F');
                        $saveData->year  = date('Y');
                        //code...
                        $saveData->save();
                        DB::commit();
                        return response()->json([
                            'status' => true,
                            'order_id' => $orderId,
                            'ordered_products' =>  $products,
                            'msg' => "Order saved successfully",
                            'redirect' => route('customer.orderDetails', $orderId),
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

                    return response()->json([
                        'status' => false,
                        'error' => $th->getMessage(),
                        'msg' => "Failed to save order",
                    ]);
                }
            }
        }
    }

    public function orderDetails($order_id)
    {
        $orderData  = Orders::with('customer')->where('order_id', '=', $order_id)->get();
        return view('customer.order-details', ['orderData' => $orderData]);
    }

    public function paymentData($order_id)
    {
        $orderData  = Orders::with('customer')->where('order_id', '=', $order_id)->get();
        return view('customer.generate-bill', ['orderData' => $orderData]);
    }
    public function generateBill(Request $request)
    {
        try {
            $order_id = sanitizeInput($request->order_id);
            $payment_method = sanitizeInput($request->payment_method);

            $orderData = Orders::with('customer')->where('order_id', '=', $order_id)->first();
            $orderData->discount_amount = 0;
            $orderData->payable_amount = $orderData->total_amount + $orderData->gst_amount - $orderData->discount_amount - $orderData->loyalty_discount;
            $orderData->payment_method = $payment_method;
            $orderData->grand_amount =  $orderData->total_amount + $orderData->gst_amount;
            $orderData->payment_status =  'done';
            $orderData->save();

            if (!is_null($orderData)) {
                $pdf = Pdf::loadView('admin.pdf-bill',  compact('order_id'));
                $pdf->setOption(['defaultFont' => 'Courier']);
                $fileName = time() . mt_rand(100, 10000) . '.pdf';
                $pdf->save(public_path() . "/tempPdf/" . $fileName);
                $pdf = url('public/tempPdf') . '/' . $fileName;
                return response()->json([
                    'status' => true,
                    'url' => $pdf,
                    'filename' => $fileName
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Order not completed'
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'error' => $th,
                'msg' => 'Order not completed'
            ]);
        }
    }

    public function getOrderDetails(Request $request, $order_id)
    {
        $orderData  = Orders::with('customer')->where('order_id', '=', $order_id)->get();
        return response()->json([
            'order_data' => $orderData[0],
            'order_detail_url' => route('customer.orderDetails', $order_id)
        ]);
    }
}
