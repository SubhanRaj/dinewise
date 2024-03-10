<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function addBooking()
    {
        return view('admin.add-booking');
    }
    public function saveBooking(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            "customer_name" => "required|string",
            "mobile_number" => "required|numeric",
            "number_of_people" => "required|numeric",
            "booked_from" => "required",
            "booked_to" => "required",
            "amount" => "required|numeric",
            // "tables" => "required|array",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to add booking',
                'redirect' => '0'
            ]);
        } else {
            $create = new Booking();
            $create->booking_id = generateId('bookings', 'booking_id');
            $create->name = sanitizeInput($request->customer_name);
            $create->mobile = sanitizeInput($request->mobile_number);
            $create->email = sanitizeInput($request->email);
            $create->address = sanitizeInput($request->address);
            $create->no_of_people = sanitizeInput($request->number_of_people);
            $create->event = sanitizeInput($request->event);
            $create->booked_from = sanitizeInput($request->booked_from);
            $create->booked_to = sanitizeInput($request->booked_to);
            // $create->tables = json_encode($request->tables);
            $create->amount = sanitizeInput($request->amount);
            $create->description = sanitizeInput($request->description);
            $saveStatus = $create->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Booking added successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to add booking',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function editBooking($id)
    {
        $data = Booking::find($id);
        return view('admin.edit-booking')->with(compact('data'));
    }
    public function updateBooking(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            "customer_name" => "required|string",
            "mobile_number" => "required|numeric",
            "number_of_people" => "required|numeric",
            "amount" => "required|numeric",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update booking',
                'redirect' => '0'
            ]);
        } else {
            $create = Booking::find($id);
            $create->name = sanitizeInput($request->customer_name);
            $create->mobile = sanitizeInput($request->mobile_number);
            $create->email = sanitizeInput($request->email);
            $create->address = sanitizeInput($request->address);
            $create->no_of_people = sanitizeInput($request->number_of_people);
            $create->event = sanitizeInput($request->event);
            $create->amount = sanitizeInput($request->amount);
            $create->description = sanitizeInput($request->description);
            $saveStatus = $create->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Booking updated successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to update booking',
                    'redirect' => '0'
                ]);
            }
        }
    }
    public function showBooking(Request $request)
    {
        if ($request->ajax()) {
            if ($request->has('bookings')) {
                if ($request->bookings == 'cancelled') {
                    $data = Booking::where('status', '=', 'cancelled')->orderBy('id', 'desc')->get();
                } else {
                    return abort(404);
                }
            } else {
                $data = Booking::where('status', '=', null)->orderBy('id', 'desc')->get();
            }
            return DataTables::of($data)->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $id = $data->id;
                    $edit_url = route("admin.editBooking", $id);

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
                                        <a class='dropdown-item'
                                            href='#cancel-booking'  data-bs-toggle ='modal' onclick=setCancelBooking('booking_id_hidden_input',$id)><i
                                                class='fas fa-times text-danger'></i> Cancel</a>
                                                
                                        <a class='dropdown-item' href='#!'
                                            onclick=single_deleteConfirm('bookings',[$id],'false','','')><i
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
                ->editColumn('booked_from', function ($data) {
                    return showDateTime($data->booked_from);
                })
                ->editColumn('booked_to', function ($data) {
                    return showDateTime($data->booked_to);
                })
                // ->editColumn('tables', function ($data) {
                //     return  implode(', ', json_decode($data->tables, true));
                // })

                ->rawColumns(['action', 'checkbox'])
                ->toJson();
        }
        return view('admin.view-booking');
    }


    public function cancelBooking(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            "booking_id" => "required|string",
            "reason" => "required|string",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to cancel booking',
                'redirect' => '0'
            ]);
        } else {
            $create = Booking::find($request->booking_id);

            $create->status = 'cancelled';
            $create->cancel_reason = sanitizeInput($request->reason);
            $saveStatus = $create->save();

            if ($saveStatus === true) {
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Booking cancelled successfully',
                    'redirect' => '0'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'errors' => '',
                    'message' => 'Failed to cancel booking',
                    'redirect' => '0'
                ]);
            }
        }
    }
}
