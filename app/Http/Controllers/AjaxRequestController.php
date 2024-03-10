<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Booking;
use App\Models\StaffModel;
use App\Models\TableModel;
use PhpParser\JsonDecoder;
use App\Models\PricingUnit;
use App\Models\ProductModel;
use Illuminate\Http\Request;
use Spatie\FlareClient\Flare;
use App\Models\CustomersModel;
use App\Models\StaredProducts;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;
use PHPUnit\Event\Application\Started;

class AjaxRequestController extends Controller
{
    public function ajaxRequest(Request $request)
    {

        // booking checkings
        if ($request->has('isset_check_bookings')) {
            $booked_from = $request->booked_from;
            $booked_to = $request->booked_to;
            $strtotime_booked_from = strtotime($booked_from);
            $strtotime_booked_to = strtotime($booked_to);

            $booked_from_Timestamp = date_format(date_create($booked_from), 'Y-m-d H:i:s');
            $booked_to_Timestamp = date_format(date_create($booked_to), 'Y-m-d H:i:s');

            if ($booked_from != '' && $booked_to != '') {
                $currentTime = time();

                if ($strtotime_booked_from < $strtotime_booked_to) {
                    $getBookings = DB::table('bookings')->where('booked_from', '=', $booked_from_Timestamp)
                        ->whereNot('status', '=', 'cancelled')
                        ->orWhere(function (Builder $query) use ($booked_from_Timestamp) {
                            $query->where('booked_from', '<', $booked_from_Timestamp)
                                ->where('booked_to', '>', $booked_from_Timestamp);
                        })
                        ->get();

                    $bookedTables = [];
                    if (count($getBookings) != 0) {
                        // get unavailable tables
                        foreach ($getBookings as $singleGetBookings) {
                            $tables = json_decode($singleGetBookings->tables, true);
                            foreach ($tables as $single_tables) {
                                array_push($bookedTables, $single_tables);
                            }
                        }
                    }

                    $getAllTables = TableModel::all();
                    $availableTables = [];
                    foreach ($getAllTables as $single_allTable) {
                        $table_no = $single_allTable->table_no;
                        $capacity = $single_allTable->capacity;

                        if (!in_array($table_no, $bookedTables)) {
                            array_push($availableTables, ['table_no' => $table_no, "capacity" => $capacity]);
                        }
                    }

                    return response()->json([
                        'status' => true,
                        'data' => $availableTables
                    ]);
                }
            }
        }

        if ($request->has('isset_add_product_pricing')) {
            $pricing_units = PricingUnit::orderBy('unit', 'asc')->get();
            $unit = [];
            $unit_id = [];
            if (count($pricing_units) != 0) {
                foreach ($pricing_units as $single_unit) {
                    array_push($unit, $single_unit->unit);
                    array_push($unit_id, $single_unit->unit_id);
                }

                return response()->json([
                    "status" => true,
                    "unit" => $unit,
                    "unit_id" => $unit_id,
                ]);
            } else {
                return response()->json([
                    "status" => false,
                ]);
            }
        }

        // =============== Order started ============= 
        if ($request->has('isset_select_category')) {
            $cat_id = $request->cat_id;
            $sendProductData = [];
            if ($cat_id == 'stared') {
                $staredProduct = DB::table('stared_products')->get();
                foreach ($staredProduct as $single_stared_product) {
                    $productDetails = ProductModel::where('auto_product_id', '=', $single_stared_product->product_id)->get();
                    if (count($productDetails) != 0) {
                        $auto_product_id = $productDetails[0]->auto_product_id;
                        $product_name = $productDetails[0]->product_name;
                        $product_image = getMediaFile($productDetails[0]->product_image);
                        $product_price_arr = $productDetails[0]->price;

                        $product_price = getProductPrice($product_price_arr);

                        array_push(
                            $sendProductData,
                            [
                                'auto_product_id' => $auto_product_id,
                                'name' => $product_name,
                                'img' =>   $product_image,
                                'price' => $product_price,
                                'stared' => true,
                            ]
                        );
                    }
                }
            } else {
                $ProductData = ProductModel::where('cat_id', '=', $cat_id)->get();
                if (count($ProductData) != 0) {
                    foreach ($ProductData as $single_product) {
                        $auto_product_id = $single_product->auto_product_id;
                        $product_name = $single_product->product_name;
                        $product_image = getMediaFile($single_product->product_image);
                        $product_price_arr = $single_product->price;
                        $product_price = getProductPrice($product_price_arr);

                        $product_id = $single_product->auto_product_id;
                        $checkStaredOrNot = StaredProducts::where('product_id', '=', $product_id)->count();
                        if ($checkStaredOrNot != 0) {
                            $stared = true;
                        } else {
                            $stared = false;
                        }
                        array_push(
                            $sendProductData,
                            [
                                'auto_product_id' => $auto_product_id,
                                'name' => $product_name,
                                'img' =>   $product_image,
                                'price' => $product_price,
                                'stared' => $stared,
                            ]
                        );
                    }
                }
            }

            if (count($sendProductData) != 0) {
                return response()->json([
                    'status' => true,
                    'data' => $sendProductData
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'data' => $sendProductData
                ]);
            }
        }

        // mark star 

        if ($request->has('isset_mark_star')) {
            $auto_product_id = $request->product_id;

            $checkStaredStatus = StaredProducts::where('product_id', '=', $auto_product_id)->get();
            if (count($checkStaredStatus) != 0) {
                $saveStatus =   $checkStaredStatus[0]->delete();
            } else {
                $saveData = new StaredProducts();
                $saveData->product_id = $auto_product_id;
                $saveStatus = $saveData->save();
            }

            $getTotalStared = StaredProducts::count();

            if ($saveStatus === true) {
                return response()->json([
                    "status" => true,
                    "data" => $getTotalStared,
                ]);
            } else {
                return response()->json([
                    "status" => false,
                    "data" => $getTotalStared,
                ]);
            }
        }

        // table selection modal 

        if ($request->has('isset_table_selection')) {
            $getTables = TableModel::orderBy('table_no', 'asc')->get();
            $TableData = [];

            // get table status from order details table 

            $orderDetails  = Orders::where('table_status', '=', '0')->get();
            if (!is_null($orderDetails)) {
                $selectedTable  = [];
                // get all selected table array
                foreach ($orderDetails as $single_order) {
                    $tables = json_decode($single_order->selectedTable, true);
                    foreach ($tables as $single_table) {
                        if (!in_array($single_table, $selectedTable)) {
                            array_push($selectedTable, $single_table);
                        }
                    }
                }

                if (count($getTables) != 0) {
                    foreach ($getTables as $single_table) {
                        $table_no = $single_table->table_no;
                        if (!in_array($table_no, $selectedTable)) {
                            array_push($TableData, ['table_no' => $table_no, 'status' => 'available']);
                        } else {
                            array_push($TableData, ['table_no' => $table_no, 'status' => 'unavailable']);
                        }
                    }
                }
            } else {
                if (count($getTables) != 0) {
                    foreach ($getTables as $single_table) {
                        $table_no = $single_table->table_no;
                        array_push($TableData, ['table_no' => $table_no, 'status' => 'available']);
                    }
                }
            }

            return response()->json([
                'data' => $TableData
            ]);
        }


        if ($request->has('isset_search_customer')) {
            $search_in = $request->search_in;
            $search_value = $request->search_value;
            $customersData_arr = [];
            if ($search_in == 'customers') {
                $Customers = CustomersModel::where('name', 'Like', "%$search_value%")
                    ->orWhere('phone', 'Like', "%$search_value%")
                    ->orWhere('email', 'Like', "%$search_value%")
                    ->orWhere('dob', 'Like', "%$search_value%")
                    ->orWhere('doa', 'Like', "%$search_value%")
                    ->orderBy('name', 'asc')
                    ->get();

                if (count($Customers) != 0) {
                    foreach ($Customers as $single_customer) {
                        $id = $single_customer->id;
                        $name = $single_customer->name;

                        array_push($customersData_arr, ['id' => $id, 'name' => $name]);
                    }
                }
            } elseif ($search_in == 'bookings') {
                $getBookingData  = Booking::where('booking_id', 'like', "%$search_value%")->get();
                if (count($getBookingData) != 0) {
                    foreach ($getBookingData as $single_booking) {
                        $name = $single_booking->name;
                        $id = $single_booking->id;
                        array_push($customersData_arr, ['id' => $id, "name" => $name]);
                    }
                }
            }

            return response()->json([
                'data' => $customersData_arr
            ]);
        }

        // selected customer details 

        if ($request->has('isset_selected_customer_details')) {
            $id = $request->id;
            $search_in = $request->search_in;

            $customersData_arr = [];
            if ($search_in == 'customers') {
                $Customers = CustomersModel::where('id', '=', "$id")->get();
                if (count($Customers) != 0) {
                    $name = $Customers[0]->name;
                    $phone = $Customers[0]->phone;
                    $email = $Customers[0]->email;
                    $dob = $Customers[0]->dob;
                    $doa = $Customers[0]->doa;
                    $id = $Customers[0]->id;

                    $customersData_arr['id'] = $id;
                    $customersData_arr['name'] = $name;
                    $customersData_arr['phone'] = $phone;
                    $customersData_arr['email'] = $email;
                    $customersData_arr['dob'] = $dob;
                    $customersData_arr['doa'] = $doa;
                }
            } elseif ($search_in == 'bookings') {
                $getBookingData  = Booking::where('id', '=', "$id")->get();
                if (count($getBookingData) != 0) {
                    $booking_id = $getBookingData[0]->booking_id;
                    $name = $getBookingData[0]->name;
                    $mobile = $getBookingData[0]->mobile;
                    $email = $getBookingData[0]->email;
                    $address = $getBookingData[0]->address;
                    $no_of_people = $getBookingData[0]->no_of_people;
                    $event = $getBookingData[0]->event;
                    $booked_from = $getBookingData[0]->booked_from;
                    $booked_to = $getBookingData[0]->booked_to;
                    // $tables = json_decode($getBookingData[0]->tables, true);
                    $amount = $getBookingData[0]->amount;
                    $description = $getBookingData[0]->description;
                    $created_at = $getBookingData[0]->created_at;
                    $id = $getBookingData[0]->id;


                    $customersData_arr['id'] = $id;
                    $customersData_arr['booking_id'] = $booking_id;
                    $customersData_arr['name'] = $name;
                    $customersData_arr['mobile'] = $mobile;
                    $customersData_arr['email'] = $email;
                    $customersData_arr['address'] = $address;
                    $customersData_arr['no_of_people'] = $no_of_people;
                    $customersData_arr['event'] = $event;
                    $customersData_arr['booked_from'] = showDateTime($booked_from);
                    $customersData_arr['booked_to'] = showDateTime($booked_to);
                    // $customersData_arr['tables'] = implode(', ',  $tables);
                    $customersData_arr['amount'] = $amount;
                    $customersData_arr['description'] = $description;
                    $customersData_arr['created_at'] = showDateTime($created_at);
                }
            }

            return response()->json([
                'data' => $customersData_arr
            ]);
        }

        // get prdocut name 

        if ($request->has('isset_product_name')) {
            $product_id = $request->product_id;
            $productData = DB::table('products')->where('auto_product_id', '=', $product_id)->get();
            if (count($productData) != 0) {
                $product_name = $productData[0]->product_name;
            } else {
                $product_name = 'Not Found';
            }

            return response()->json([
                'name' => $product_name
            ]);
        }

        // generate kot 

        if ($request->has('isset_generate_kot')) {
            $productData =  $request->product_data;
            $tables =  $request->tables;
            $orderInstruction = $request->orderInstruction;
            $pdf = Pdf::loadView('admin.pdf-kot',  compact('productData', 'tables', 'orderInstruction'));
            $fileName = time() . mt_rand(100, 10000) . '.pdf';
            $pdf->save(public_path() . "/tempPdf/" . $fileName);
            $pdf = asset('tempPdf') . '/' . $fileName;
            return response()->json([
                'url' => $pdf,
                'filename' => $fileName
            ]);
        }

        // save order details 

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
        }

        // get search result 

        if ($request->has('isset_search_product')) {
            $search_query = $request->search_query;

            $searchData = DB::table('products')
                ->where('product_id', 'like', "%$search_query%")
                ->orWhere('product_name', 'like', "%$search_query%")
                ->get();


            $sendProductData = [];

            if (count($searchData) != 0) {
                foreach ($searchData as $single_search_data) {
                    $auto_product_id = $single_search_data->auto_product_id;
                    $check_started_or_not = DB::table('stared_products')->where('product_id', '=', $auto_product_id)->count();

                    $product_name = $single_search_data->product_name;
                    $product_image = getMediaFile($single_search_data->product_image);
                    $product_price_arr = $single_search_data->price;
                    $product_price = getProductPrice($product_price_arr);

                    if ($check_started_or_not !== 0) {
                        array_push(
                            $sendProductData,
                            [
                                'auto_product_id' => $auto_product_id,
                                'name' => $product_name,
                                'img' =>   $product_image,
                                'price' => $product_price,
                                'stared' => true,
                            ]
                        );
                    } else {
                        array_push(
                            $sendProductData,
                            [
                                'auto_product_id' => $auto_product_id,
                                'name' => $product_name,
                                'img' =>   $product_image,
                                'price' => $product_price,
                                'stared' => false,
                            ]
                        );
                    }
                }
            }


            return $sendProductData;
        }


        //  get product name 

        if ($request->has('isset_get_product_name')) {
            $product_id = $request->product_id;
            $getProductData = DB::table('products')->where('auto_product_id', '=', $product_id)->first();
            return $getProductData->product_name;
        }

        // get product data 

        if ($request->has('isset_get_product_data')) {
            $id = $request->id;
            $orderData = Orders::withTrashed()->where('id', '=', $id)->first();
            if (!is_null($orderData)) {
                $data =  getProductNameUsingProductData($orderData->productData);
                return response()->json([
                    'status' => true,
                    'data' => $data
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'data' => []
                ]);
            }
        }

        // print & download bill 

        if ($request->has('isset_print_bill')) {
            $order_id = $request->order_id;

            $check = Orders::where([
                ['order_id', '=', $order_id],
                ['status', '=', 'completed'],
            ])->count();

            if ($check != 0) {
                $pdf = Pdf::loadView('admin.pdf-bill',  compact('order_id'));
                $pdf->setOption(['defaultFont' => 'Courier']);
                $fileName = time() . mt_rand(100, 10000) . '.pdf';
                $pdf->save(public_path() . "/tempPdf/" . $fileName);
                $pdf = asset('tempPdf') . '/' . $fileName;
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
        }


        // Dashboard Backed started 
        // Dashboard Backed started

        if ($request->has('isset_get_booking_data')) {
            $month = $request->month;

            $year = date('Y');
            $getBookingData = Booking::all();

            $bookingRespons = [];

            if (!is_null($getBookingData)) {
                foreach ($getBookingData as $single_booking) {
                    $created_at = $single_booking->created_at;
                    $getMonth = date_format(date_create($created_at), 'F');
                    $getYear =  date_format(date_create($created_at), 'Y');

                    if ($getYear == $year) {
                        if (strtoupper($getMonth) == strtoupper($month)) {
                            $booking_id = $single_booking->booking_id;
                            $name = $single_booking->name;
                            $mobile = $single_booking->mobile;
                            $no_of_people = $single_booking->no_of_people;
                            $booked_from = $single_booking->booked_from;
                            $booked_to = $single_booking->booked_to;

                            array_push(
                                $bookingRespons,
                                [

                                    'booking_id' => $booking_id,
                                    'name' => $name,
                                    'mobile' => $mobile,
                                    'no_of_people' => $no_of_people,
                                    'booked_from' => showDateTime($booked_from),
                                    'booked_to' => showDateTime($booked_to)
                                ]
                            );
                        }
                    }
                }
            }

            return response()->json([
                'data' => $bookingRespons
            ]);
        }

        // get order data 
        if ($request->has('isset_get_order_data')) {
            $month = $request->month;
            $year = date('Y');
            $getOrderData = Orders::all();

            $orderRespons = [];

            if (!is_null($getOrderData)) {
                foreach ($getOrderData as $single_order) {
                    $created_at = $single_order->created_at;
                    $getMonth = date_format(date_create($created_at), 'F');
                    $getYear =  date_format(date_create($created_at), 'Y');

                    if ($getYear == $year) {
                        if (strtoupper($getMonth) == strtoupper($month)) {
                            $id = $single_order->id;
                            $order_id = $single_order->order_id;
                            $grand_amount = $single_order->grand_amount;
                            $status = $single_order->status;
                            if ($single_order->payment_method == 'other') {
                                $payment_method = 'other , ' . $single_order->other_method;
                            } else {
                                $payment_method = $single_order->payment_method;
                            }
                            array_push(
                                $orderRespons,
                                [
                                    'id' => $id,
                                    'order_id' => $order_id,
                                    'grand_amount' => $grand_amount,
                                    'payment_method' => $payment_method,
                                    'status' => $status,
                                ]
                            );
                        }
                    }
                }
            }

            return response()->json([
                'data' => $orderRespons
            ]);
        }

        if ($request->has('isset_get_booking_chart')) {
            $year = $request->year;
            $getBookingData = Booking::all();
            $jan = 0;
            $feb = 0;
            $march = 0;
            $apr = 0;
            $may = 0;
            $june = 0;
            $july = 0;
            $aug = 0;
            $sept = 0;
            $oct = 0;
            $nov = 0;
            $dec = 0;
            $jan_cancelled = 0;
            $feb_cancelled = 0;
            $march_cancelled = 0;
            $apr_cancelled = 0;
            $may_cancelled = 0;
            $june_cancelled = 0;
            $july_cancelled = 0;
            $aug_cancelled = 0;
            $sept_cancelled = 0;
            $oct_cancelled = 0;
            $nov_cancelled = 0;
            $dec_cancelled = 0;

            if (!is_null($getBookingData)) {
                foreach ($getBookingData as $single_booking) {
                    $created_at = $single_booking->created_at;
                    $getMonth = date_format(date_create($created_at), 'n');  // A numeric representation of a month, without leading zeros (1 to 12)
                    $getYear =  date_format(date_create($created_at), 'Y');

                    if ($getYear == $year) {
                        if ($single_booking->status === null) {
                            if ($getMonth == '1') {
                                $jan++;
                            } elseif ($getMonth == '2') {
                                $feb++;
                            } elseif ($getMonth == '3') {
                                $march++;
                            } elseif ($getMonth == '4') {
                                $apr++;
                            } elseif ($getMonth == '5') {
                                $may++;
                            } elseif ($getMonth == '6') {
                                $june++;
                            } elseif ($getMonth == '7') {
                                $july++;
                            } elseif ($getMonth == '8') {
                                $aug++;
                            } elseif ($getMonth == '9') {
                                $sept++;
                            } elseif ($getMonth == '10') {
                                $oct++;
                            } elseif ($getMonth == '11') {
                                $nov++;
                            } elseif ($getMonth == '12') {
                                $dec++;
                            }
                        } else {
                            if ($getMonth == '1') {
                                $jan_cancelled++;
                            } elseif ($getMonth == '2') {
                                $feb_cancelled++;
                            } elseif ($getMonth == '3') {
                                $march_cancelled++;
                            } elseif ($getMonth == '4') {
                                $apr_cancelled++;
                            } elseif ($getMonth == '5') {
                                $may_cancelled++;
                            } elseif ($getMonth == '6') {
                                $june_cancelled++;
                            } elseif ($getMonth == '7') {
                                $july_cancelled++;
                            } elseif ($getMonth == '8') {
                                $aug_cancelled++;
                            } elseif ($getMonth == '9') {
                                $sept_cancelled++;
                            } elseif ($getMonth == '10') {
                                $oct_cancelled++;
                            } elseif ($getMonth == '11') {
                                $nov_cancelled++;
                            } elseif ($getMonth == '12') {
                                $dec_cancelled++;
                            }
                        }
                    }
                }
            }

            $returnData = [
                "non-cancelled" => [$jan, $feb, $march, $apr, $may, $june, $july, $aug, $sept, $oct, $nov, $dec],
                "cancelled" => [$jan_cancelled, $feb_cancelled, $march_cancelled, $apr_cancelled, $may_cancelled, $june_cancelled, $july_cancelled, $aug_cancelled, $sept_cancelled, $oct_cancelled, $nov_cancelled, $dec_cancelled]
            ];

            $totalNonCancelled = array_sum($returnData['non-cancelled']);
            $totalCancelled = array_sum($returnData['cancelled']);
            $total = $totalNonCancelled + $totalCancelled;
            return response()->json([
                'data' => $returnData,
                'totalNonCancelled' => $totalNonCancelled,
                'totalCancelled' => $totalCancelled,
                'totalBooking' => $total,
            ]);
        }



        if ($request->has('isset_get_order_chart')) {
            $year = $request->year;
            $getOrderData = Orders::all();
            $jan = 0;
            $feb = 0;
            $march = 0;
            $apr = 0;
            $may = 0;
            $june = 0;
            $july = 0;
            $aug = 0;
            $sept = 0;
            $oct = 0;
            $nov = 0;
            $dec = 0;
            $jan_nonCompleted = 0;
            $feb_nonCompleted = 0;
            $march_nonCompleted = 0;
            $apr_nonCompleted = 0;
            $may_nonCompleted = 0;
            $june_nonCompleted = 0;
            $july_nonCompleted = 0;
            $aug_nonCompleted = 0;
            $sept_nonCompleted = 0;
            $oct_nonCompleted = 0;
            $nov_nonCompleted = 0;
            $dec_nonCompleted = 0;


            if (!is_null($getOrderData)) {
                foreach ($getOrderData as $single_order) {
                    $created_at = $single_order->created_at;
                    $getMonth = date_format(date_create($created_at), 'n');  // A numeric representation of a month, without leading zeros (1 to 12)
                    $getYear =  date_format(date_create($created_at), 'Y');

                    if ($getYear == $year) {
                        if ($single_order->status == 'completed') {
                            if ($getMonth == '1') {
                                $jan++;
                            } elseif ($getMonth == '2') {
                                $feb++;
                            } elseif ($getMonth == '3') {
                                $march++;
                            } elseif ($getMonth == '4') {
                                $apr++;
                            } elseif ($getMonth == '5') {
                                $may++;
                            } elseif ($getMonth == '6') {
                                $june++;
                            } elseif ($getMonth == '7') {
                                $july++;
                            } elseif ($getMonth == '8') {
                                $aug++;
                            } elseif ($getMonth == '9') {
                                $sept++;
                            } elseif ($getMonth == '10') {
                                $oct++;
                            } elseif ($getMonth == '11') {
                                $nov++;
                            } elseif ($getMonth == '12') {
                                $dec++;
                            }
                        } else {
                            if ($getMonth == '1') {
                                $jan_nonCompleted++;
                            } elseif ($getMonth == '2') {
                                $feb_nonCompleted++;
                            } elseif ($getMonth == '3') {
                                $march_nonCompleted++;
                            } elseif ($getMonth == '4') {
                                $apr_nonCompleted++;
                            } elseif ($getMonth == '5') {
                                $may_nonCompleted++;
                            } elseif ($getMonth == '6') {
                                $june_nonCompleted++;
                            } elseif ($getMonth == '7') {
                                $july_nonCompleted++;
                            } elseif ($getMonth == '8') {
                                $aug_nonCompleted++;
                            } elseif ($getMonth == '9') {
                                $sept_nonCompleted++;
                            } elseif ($getMonth == '10') {
                                $oct_nonCompleted++;
                            } elseif ($getMonth == '11') {
                                $nov_nonCompleted++;
                            } elseif ($getMonth == '12') {
                                $dec_nonCompleted++;
                            }
                        }
                    }
                }
            }

            $returnData = [
                "non-completed" => [$jan, $feb, $march, $apr, $may, $june, $july, $aug, $sept, $oct, $nov, $dec],
                "completed" => [$jan_nonCompleted, $feb_nonCompleted, $march_nonCompleted, $apr_nonCompleted, $may_nonCompleted, $june_nonCompleted, $july_nonCompleted, $aug_nonCompleted, $sept_nonCompleted, $oct_nonCompleted, $nov_nonCompleted, $dec_nonCompleted]
            ];

            $totalNonCompleted = array_sum($returnData['non-completed']);
            $totalCompleted = array_sum($returnData['completed']);
            $total = $totalNonCompleted + $totalCompleted;
            return response()->json([
                'data' => $returnData,
                'totalNonCompleted' => $totalNonCompleted,
                'totalCompleted' => $totalCompleted,
                'totalOrder' => $total,
            ]);
        }
        // Dashboard Backed ended 
        // Dashboard Backed ended 

        if ($request->has('isset_show_staff_document')) {
            $uid = $request->uid;
            $getData = StaffModel::where('uid', '=', $uid)->get();
            if (count($getData) != 0) {
                $documents_arr = json_decode($getData[0]->documents, true);

                $str = "";

                foreach ($documents_arr as $singleDoc) {
                    $getMedia = getMediaFile($singleDoc['file_id']);
                    $str .= "
                       <div class='col-lg-4 col-md-6 mb-3 d-flex justify-content-center align-items-center'>
                          $getMedia 
                       </div>                                                                    
                      ";
                }
                return response()->json([
                    'status' => true,
                    'data' => $str
                ]);
            } else {
                return response()->json([
                    'status' => false
                ]);
            }
        }
    }
}
