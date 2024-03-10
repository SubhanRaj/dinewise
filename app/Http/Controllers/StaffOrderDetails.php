<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StaffOrderDetails extends Controller
{
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
                ->editColumn('view', function ($data) {
                    $href = route('staff.orderDetails', $data->order_id);
                    return  "<a href='$href' class='text-primary'>View</a>";
                })
                ->editColumn('status', function ($data) {
                    if ($data->status == 'completed') {
                        return "<span class='badge text-bg-success font-14'>completed</span>";
                    } elseif ($data->status == 'order taken') {
                        return "<span class='badge text-bg-info font-14'>order taken</span>";
                    } else {
                        return $data->status;
                    }
                })

                ->rawColumns(['customer_name', 'customer_mobile', 'status', 'view'])
                ->toJson();
        }
        return view('staff.all-order');
    }

    public function orderDetails($order_id)
    {
        $orderData = Orders::where('order_id', '=', $order_id)->first();
        return  view('staff.order-details')->with(compact('orderData'));
    }
}
