<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function addOrder()
    {
        return view('admin.add-order');
    }
    public function saveOrder(Request $request)
    {
        if ($request->has('isset_save_order_details')) {
            $productData = $request->productData;
            $selectedTable = $request->selectedTable;
            $customer_or_booking = $request->customer_or_booking;
            $customer_id_or_booking_id = $request->customer_id_or_booking_id;
            $orderInstruction = $request->orderInstruction;
            $total_item = $request->total_item;
            $total_amount = $request->total_amount;
            $gst_amount = $request->gst_amount;
            $discount_amount = $request->discount_amount;
            $paid_amount = $request->paid_amount;
            $due_amount = $request->due_amount;
            $payment_method = $request->payment_method;
            $other_method = $request->other_method;
            $grand_amount = $request->grand_amount;
            $no_of_people = $request->no_of_people;


            // check payment is done or not 
            if ($payment_method === '' || $payment_method === null || $payment_method === 'null') {
                $payment_status = 'not done';
            } else {
                if ($paid_amount == '' || $paid_amount === null || $paid_amount === 'null') {
                    $payment_status =  "not done";
                } else {
                    $payment_status = 'done';
                }
            }

            $saveData = new Orders();
            $orderId = generateId('orders_details', 'order_id');
            $saveData->order_id = $orderId;
            $saveData->productData = trim($productData);
            $saveData->selectedTable = trim($selectedTable);
            $saveData->no_of_people = trim($no_of_people);
            $saveData->customer_or_booking = trim($customer_or_booking);
            $saveData->customer_id_or_booking_id = trim($customer_id_or_booking_id);
            $saveData->orderInstruction = trim($orderInstruction);
            $saveData->total_item = trim($total_item);
            $saveData->total_amount = trim($total_amount);
            $saveData->gst_amount = trim($gst_amount);
            $saveData->discount_amount = trim($discount_amount);
            $saveData->paid_amount = trim($paid_amount);
            $saveData->due_amount = trim($due_amount);
            $saveData->payment_method = trim($payment_method);
            $saveData->other_method = trim($other_method);
            $saveData->grand_amount = trim($grand_amount);
            $saveData->payment_status = trim($payment_status);
            $saveData->status = 'order taken';

            $saveStatus = $saveData->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'data' => $orderId,
                    'msg' => "Order saved successfully",
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => "Failed to save order",
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Failed to save order',
            ]);
        }
    }


    public function updateOrder(Request $request)
    {
        if ($request->has('isset_save_order_details')) {
            $order_id = $request->order_id;
            $productData = $request->productData;
            $selectedTable = $request->selectedTable;
            $customer_or_booking = $request->customer_or_booking;
            $customer_id_or_booking_id = $request->customer_id_or_booking_id;
            $orderInstruction = $request->orderInstruction;
            $total_item = $request->total_item;
            $total_amount = $request->total_amount;
            $gst_amount = $request->gst_amount;
            $discount_amount = $request->discount_amount;
            $paid_amount = $request->paid_amount;
            $due_amount = $request->due_amount;
            $payment_method = $request->payment_method;
            $other_method = $request->other_method;
            $grand_amount = $request->grand_amount;
            $no_of_people = $request->no_of_people;

            // check payment is done or not 
            if ($payment_method === '' || $payment_method === null || $payment_method === 'null') {
                $payment_status = 'not done';
            } else {
                if ($paid_amount == '' || $paid_amount === null || $paid_amount === 'null') {
                    $payment_status =  "not done";
                } else {
                    $payment_status = 'done';
                }
            }

            $saveData = Orders::where('order_id', '=', $order_id)->get();
            $saveData[0]->productData = trim($productData);
            $saveData[0]->selectedTable = trim($selectedTable);
            $saveData[0]->no_of_people = trim($no_of_people);
            $saveData[0]->customer_or_booking = trim($customer_or_booking);
            $saveData[0]->customer_id_or_booking_id = trim($customer_id_or_booking_id);
            $saveData[0]->orderInstruction = trim($orderInstruction);
            $saveData[0]->total_item = trim($total_item);
            $saveData[0]->total_amount = trim($total_amount);
            $saveData[0]->gst_amount = trim($gst_amount);
            $saveData[0]->discount_amount = trim($discount_amount);
            $saveData[0]->paid_amount = trim($paid_amount);
            $saveData[0]->due_amount = trim($due_amount);
            $saveData[0]->payment_method = trim($payment_method);
            $saveData[0]->other_method = trim($other_method);
            $saveData[0]->grand_amount = trim($grand_amount);
            $saveData[0]->payment_status = trim($payment_status);
            $saveData[0]->status = 'order taken';

            $saveStatus = $saveData[0]->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'data' => $order_id,
                    'msg' => "Order saved successfully",
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => "Failed to save order",
                ]);
            }
        } else {
            return response()->json([
                'status' => false,
                'msg' => 'Failed to save order',
            ]);
        }
    }


    public function orderCompleted(Request $request)
    {
        if ($request->has('isset_save_and_settle_order')) {
            $order_id = $request->order_id;
            $get_OrderData = Orders::where('order_id', '=', $order_id)->first();
            if (!is_null($get_OrderData)) {


                $payment_status = $get_OrderData->payment_status;

                if ($payment_status == 'done') {
                    $get_OrderData->table_status = '1';
                    $get_OrderData->status = 'completed';
                    $saveStatus = $get_OrderData->save();

                    if ($saveStatus === true) {
                        return response()->json([
                            'status' => true,
                            'msg' => 'Order completed'
                        ]);
                    } else {
                        return response()->json([
                            'status' => false,
                            'msg' => 'Unable to complete order'
                        ]);
                    }
                } else {
                    return response()->json([
                        'status' => false,
                        'msg' => 'Payment not done'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => false,
                    'msg' => 'Unable to complete order'
                ]);
            }
        }
    }

    public function getOrderDetails(Request $request)
    {

        $order_id = $request->order_id;
        $getOrderData = Orders::where('order_id', '=', $order_id)->first();

        $OrderData = [];

        if (!is_null($getOrderData)) {
            $productData = $getOrderData->productData;
            $selectedTable = $getOrderData->selectedTable;
            $no_of_people = $getOrderData->no_of_people;
            $customer_or_booking = $getOrderData->customer_or_booking;
            $customer_id_or_booking_id = $getOrderData->customer_id_or_booking_id;
            $orderInstruction = $getOrderData->orderInstruction;
            $total_item = $getOrderData->total_item;
            $total_amount = $getOrderData->total_amount;
            $gst_amount = $getOrderData->gst_amount;
            $discount_amount = $getOrderData->discount_amount;
            $paid_amount = $getOrderData->paid_amount;
            $due_amount = $getOrderData->due_amount;
            $payment_method = $getOrderData->payment_method;
            $other_method = $getOrderData->other_method;
            $grand_amount = $getOrderData->grand_amount;
            $payment_status = $getOrderData->payment_status;
            $status = $getOrderData->status;

            // get customer details  
            if ($customer_or_booking == 'customers') {
                $customerData = getCustomer('customers', $customer_id_or_booking_id);
            } else {
                $customerData = getCustomer('bookings', $customer_id_or_booking_id);
            }

            $OrderData['productData']  = getProductNameUsingProductData($productData);
            $OrderData['selectedTable']  = $selectedTable;
            $OrderData['no_of_people']  = $no_of_people;
            $OrderData['customer_or_booking']  = $customer_or_booking;
            $OrderData['customer_id_or_booking_id']  = $customer_id_or_booking_id;
            $OrderData['orderInstruction']  = $orderInstruction;
            $OrderData['total_item']  = $total_item;
            $OrderData['total_amount']  = $total_amount;
            $OrderData['gst_amount']  = $gst_amount;
            $OrderData['discount_amount']  = $discount_amount;
            $OrderData['paid_amount']  = $paid_amount;
            $OrderData['due_amount']  = $due_amount;
            $OrderData['payment_method']  = $payment_method;
            $OrderData['other_method']  = $other_method;
            $OrderData['grand_amount']  = $grand_amount;
            $OrderData['payment_status']  = $payment_status;
            $OrderData['status']  = $status;
            $OrderData['customerData']  = $customerData;
        }

        return $OrderData;
    }

    public function showOrderDetails(Request $request)
    {
        if ($request->ajax()) {

            $data = Orders::orderBy('id', 'desc')->get();

            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $order_id = $data->order_id;
                    $redirect = route('admin.addOrder');
                    $view = route('admin.orderDetails', $data->order_id);
                    $btn = "
                            <div class='dropdown action-dropdown'>
                                    <button class='btn dropdown-toggle' type='button'
                                        data-bs-toggle='dropdown'>
                                        <span class='fas fa-ellipsis-h fs--1 text-primary'></span>
                                    </button>
                                    <div class='dropdown-menu border py-2'>
                                    <a class='dropdown-item'
                                       href='$view' ><i
                                        class='fas fa-eye text-primary'></i> View</a>
                                    <a class='dropdown-item'
                                       href='javascript:;' onclick=editOrder('$order_id','$redirect')><i
                                        class='fas fa-edit text-primary'></i> Edit</a>
                                    <a class='dropdown-item'
                                       href='javascript:;'  onclick=printAndDownloadBill('download','$order_id')><i class='fa-sharp fa-regular fa-download text-primary' ></i> Download</a>
                                    <a class='dropdown-item'
                                       href='javascript:;'  onclick=printAndDownloadBill('print','$order_id')><i class='fa-regular fa-print text-primary'></i> Print</a>
                                      
                                        <a class='dropdown-item' href='#!'
                                            onclick=single_deleteConfirm('orders_details',[$id],'false','','')><i
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

                ->editColumn('productData', function ($data) {
                    $id = $data->id;
                    return  "<a href='javascript:;' onclick=showProductData('$id') class='text-primary'>View</a>";
                })
                ->editColumn('customer_name', function ($data) {
                    $customer_or_booking = $data->customer_or_booking;
                    $customer_id_or_booking_id = $data->customer_id_or_booking_id;
                    $customer_data = getCustomer($customer_or_booking, $customer_id_or_booking_id);
                    return $customer_data['name'];
                })
                ->editColumn('customer_mobile', function ($data) {
                    $customer_or_booking = $data->customer_or_booking;
                    $customer_id_or_booking_id = $data->customer_id_or_booking_id;
                    $customer_data = getCustomer($customer_or_booking, $customer_id_or_booking_id);

                    return $customer_data['phone'];
                })
                ->editColumn('selectedTable', function ($data) {
                    return  implode(', ', json_decode($data->selectedTable, true));
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == 'completed') {
                        return "<span class='badge text-bg-success font-14'>completed</span>";
                    } else {
                        return $data->status;
                    }
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

                ->rawColumns(['action', 'checkbox', 'productData', 'customer_name', 'customer_mobile', 'status', 'chef_status'])
                ->toJson();
        }
        return view('admin.view-order-details');
    }


    public function orderDetails($order_id)
    {
        $orderData = Orders::where('order_id', '=', $order_id)->first();
        return  view('admin.order-details')->with(compact('orderData'));
    }



    public function updateOrderStatus(Request $request, $order_id)
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
}
