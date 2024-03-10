<?php

use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

function encodeData($json_data)
{
    $token = base64_encode($json_data);
    for ($i = 0; $i < 5; $i++) {
        $token = base64_encode($token);
    }

    return $token;
}

function decodeData($encodedData)
{
    $decoded = base64_decode($encodedData);
    for ($i = 0; $i < 5; $i++) {
        $decoded = base64_decode($decoded);
    }

    return $decoded;
}

function verifyLogin($token)
{
    $json_data = decodeData($token);
    $data = json_decode($json_data, true);
    $user_id = $data['user_id'];
    $email = $data['email'];
    $role = $data['role'];

    $check = DB::table('logins')->where([
        ['user_id', '=', $user_id],
        ['email', '=', $email],
        ['role', '=', $role],
    ])->count();

    if ($check != 0) {
        return ['status' => true, 'data' => $data];
    } else {
        return ['status' => false, 'data' => $data];
    }
}


function loginData($token)
{
    $verification = verifyLogin($token);
    $data = $verification['data'];
    return $data;
}




function companyEmail()
{
    // return "digicrowdsolution@gmail.com";
    return "goswamivaibhav72@gmail.com";
}

function print_pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function uid_generator()
{
    $gen_uid = strtoupper(substr(md5(mt_rand(10000, 10000000000)), 22));
    return $gen_uid;
}

function showDate($date)
{
    if (!is_null($date) || $date != '') {
        return date_format(date_create($date), 'd-M-Y');
    } else {
        return '';
    }
}
function showTime($time)
{
    if (!is_null($time) || $time != '') {
        return date_format(date_create($time), 'g:i A');
    } else {
        return '';
    }
}
function showDateTime($datetime)
{
    if (!is_null($datetime) || $datetime != '') {
        return date_format(date_create($datetime), 'd-M-Y, g:i A');
    } else {
        return '';
    }
}

function seo_friendly_url($string)
{
    $string = str_replace(array('[\', \']'), '', $string);
    $string = preg_replace('/\[.*\]/U', '', $string);
    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);
    $string = htmlentities($string, ENT_COMPAT, 'utf-8');
    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string);
    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '-', $string);
    return strtolower(trim($string, '-'));
}


function verify_captcha($gcaptcha)
{
    $secrect = '6LfoZGskAAAAAOr9QpOjc9VCtUHIFxR_uyMIZG5T';
    $ip = $_SERVER['REMOTE_ADDR'];
    $url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secrect) .  '&response=' . urlencode($gcaptcha) . '&remoteip=' . $ip;

    $api_content = file_get_contents($url);
    $api_response = json_decode($api_content);


    if ($api_response->success === true) {
        return true;
    } else {
        return false;
    }
}


function getAllState()
{
    $data = DB::table('states')->orderBy('name', 'asc')->get();
    $states  = '';
    foreach ($data as $single_state) {
        $states .= "<option value='$single_state->name'>$single_state->name</option>";
    }

    return $states;
}
function new_fileName($file_name)
{
    $new_file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_name = substr(md5($file_name) . mt_rand(1000, 10000), 22) . '.' . $new_file_ext;
    return $new_name;
}


function removeFileExtension($path, $file_name)
{
    $get_extension = pathinfo($path, PATHINFO_EXTENSION);
    $length =   strlen($get_extension);
    if ($length == 3) {
        $extension_from_string =  substr($file_name, -4);
    } elseif ($length == 4) {
        $extension_from_string = substr($file_name, -5);
    }
    return  str_replace($extension_from_string, '', $file_name);
}

function IND_num_format($number)
{
    $decimal = (string)($number - floor($number));
    $money = floor($number);
    $length = strlen($money);
    $delimiter = '';
    $money = strrev($money);

    for ($i = 0; $i < $length; $i++) {
        if (($i == 3 || ($i > 3 && ($i - 1) % 2 == 0)) && $i != $length) {
            $delimiter .= ',';
        }
        $delimiter .= $money[$i];
    }

    $result = strrev($delimiter);
    $decimal = preg_replace("/0\./i", ".", $decimal);
    $decimal = substr($decimal, 0, 3);

    if ($decimal != '0') {
        $result = $result . $decimal;
    }

    return $result;
}


function showMonth()
{
    $months = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December'
    ];
    $options = '';
    foreach ($months as $month) {
        $options .= "<option value='$month'>$month</option>";
    }

    return $options;
}


function dateDifference($to, $from)
{
    $date1 = date_create($to);
    $date2 = date_create($from);
    // substract date1 from date2
    $diff = date_diff($date1, $date2);
    return $diff->format('%R%a');
}


function yearOption($table)
{
    $data = DB::table($table)->select('year')->distinct()->get();
    $str = "<option value='All'>All</option>";
    foreach ($data as $singleData) {
        $str .= "<option value='$singleData->year'>$singleData->year</option>";
    }
    return $str;
}

function sanitizeInput($input)
{
    return trim(strip_tags($input));
}


function getCategory()
{
    $categoryData = DB::table('product_categories')->orderBy('cat_name', 'asc')->get();
    $str = '';
    if (count($categoryData) != 0) {
        foreach ($categoryData as $category) {
            $cat_id = $category->cat_id;
            $cat_name = $category->cat_name;
            $str .= "<option value='$cat_id'>$cat_name</option>";
        }
        return $str;
    } else {
        return "<option value=''>Not Found</option>";
    }
}

function getUnit()
{
    $unitData = DB::table('pricing_units')->orderBy('unit', 'asc')->get();
    $str = '';
    if (count($unitData) != 0) {
        foreach ($unitData as $unit) {
            $unit_id = $unit->unit_id;
            $unit = $unit->unit;
            $str .= "<option value='$unit_id'>$unit</option>";
        }
        return $str;
    } else {
        return "<option value=''>Not Found</option>";
    }
}



function getMediaFile($id)
{
    $getMedia = DB::table('media')->where('id', '=', $id)->get();
    if (count($getMedia) != 0) {
        $url = $getMedia[0]->img_name;
    } else {
        $url = '';
    }
    $src = asset('mystorage/media/') . '/' . $url;
    return "<img src='$src'>";
}


function getUnitName($unit_id)
{
    $unitData = DB::table('pricing_units')->where('unit_id', '=', $unit_id)->get();
    if (count($unitData) != 0) {
        return $unitData[0]->unit;
    } else {
        return "Not Found";
    }
}


function getCategoryName($cat_id)
{
    $catData = DB::table('product_categories')->where('cat_id', '=', $cat_id)->get();
    if (count($catData) != 0) {
        return $catData[0]->cat_name;
    } else {
        return "Not Found";
    }
}

function getProductPrice($price_json_string)
{
    $price_arr = json_decode($price_json_string, true);
    $new_price_arr = [];
    foreach ($price_arr as $single_price) {
        $unit_id = $single_price[0];
        $price = $single_price[1];
        $unit_name = getUnitName($unit_id);
        array_push($new_price_arr, [$unit_name, $price]);
    }
    return $new_price_arr;
}


function getTableListWithCheckbox(array $checkedArr)
{
    $tableData = DB::table('tables')->orderBy('table_no', 'asc')->get();
    $tableList = "";

    if (count($tableData) != 0) {
        foreach ($tableData as $table) {
            $table_no = $table->table_no;
            $capacity = $table->capacity;
            $table_id = $table->id;

            if (in_array($table_id, $checkedArr)) {
                $tableList .= "
                <label class='list-group-item'>
                      <input class='form-check-input me-1' type='checkbox' checked  value='$table_id' name='tables[]'>  Table No. : $table_no & Capacity : $capacity 
                </label>
                ";
            } else {
                $tableList .= "
            <label class='list-group-item'>
                  <input class='form-check-input me-1' type='checkbox'  value='$table_id' name='tables[]'>  Table No. : $table_no & Capacity : $capacity 
            </label>
            ";
            }
        }
    } else {
        $tableList = '<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
         <div class="text-white">Data Not Found !</div>
     </div>';
    }
    return $tableList;
}


function generateId($table, $col)
{
    $getData  = DB::table("$table")->limit(1)->orderBy('id', 'desc')->get();
    $nextId = 0;
    if (count($getData) != 0) {
        $lastId = $getData[0]->$col;
        $lastNumber = substr($lastId, 6);
        $newNumber = (int) $lastNumber + 1;
        $nextId = date('Y') . date('m') . $newNumber;
    } else {
        $nextId = date('Y') . date('m') . '1';
    }

    return $nextId;
}


function getTotalProductOfCategory($cat_id)
{
    return $TotalPro = DB::table('products')->where('cat_id', '=', $cat_id)->count();
}


function getProductName($product_id)
{
    $data = DB::table('products')->where('auto_product_id', '=', $product_id)->get();
    if (count($data)  != 0) {
        $product_name = $data['0']->product_name;
    } else {
        $product_name = '';
    }

    return $product_name;
}


function getCustomer($table, $id)
{
    $data = DB::table("$table")->where('id', '=', $id)->first();
    $customerData = [];
    if (!is_null($data)) {
        if ($table == 'customers') {
            $customerData['customer_from'] = 'customers';
            $customerData['name'] = $data->name;
            $customerData['phone'] = $data->phone;
            $customerData['email'] = $data->email;
            $customerData['dob'] = $data->dob;
            $customerData['doa'] = $data->doa;
            $customerData['status'] = $data->status;
        } else {
            $customerData['customer_from'] = 'bookings';
            $customerData['booking_id'] = $data->booking_id;
            $customerData['name'] = $data->name;
            $customerData['phone'] = $data->mobile;
            $customerData['email'] = $data->email;
            $customerData['address'] = $data->address;
            $customerData['no_of_people'] = $data->no_of_people;
            $customerData['event'] = $data->event;
            $customerData['booked_from'] = $data->booked_from;
            $customerData['booked_to'] = $data->booked_to;
            $customerData['tables'] = $data->tables;
            $customerData['amount'] = $data->amount;
            $customerData['description'] = $data->description;
            $customerData['status'] = $data->status;
            $customerData['cancel_reason'] = $data->cancel_reason;
        }
    }

    return $customerData;
}


function getProductNameUsingProductData($productData)
{
    $product = json_decode($productData, true);
    $new_productData = [];
    foreach ($product as $single_product) {
        $product_id = $single_product['product_id'];
        $product_name = getProductName($product_id);
        array_push(
            $new_productData,
            [
                "product_id" => $product_id,
                "product_name" => $product_name,
                "product_unit" => $single_product['product_unit'],
                "product_qty" => $single_product['product_qty'],
                "price_per_unit" => $single_product['price_per_unit'],
                "product_price" => $single_product['product_price'],
                "order_status" => $single_product['order_status'],
            ]
        );
    }

    return $new_productData;
}


function generateQRCode($data)
{
    $qr = QrCode::size(300)
        ->backgroundColor(255, 255, 255)
        ->generate($data);
    $filename = uniqid() . '.png';
    $qr_path = public_path('QR/' . $filename);
    file_put_contents($qr_path, $qr);
    return $filename;
}



function getTableData()
{
    $getTables = DB::table('tables')->orderBy('table_no', 'asc')->get();
    $TableData = [];

    // get table status from order details table 

    $orderDetails  = DB::table('orders_details')->where('table_status', '=', '0')->get();
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
                $capacity = $single_table->capacity;
                if (!in_array($table_no, $selectedTable)) {
                    array_push($TableData, ['table_no' => $table_no, 'capacity' => $capacity, 'status' => 'available']);
                } else {
                    array_push($TableData, ['table_no' => $table_no, 'capacity' => $capacity, 'status' => 'unavailable']);
                }
            }
        }
    } else {
        if (count($getTables) != 0) {
            foreach ($getTables as $single_table) {
                $table_no = $single_table->table_no;
                $capacity = $single_table->capacity;
                array_push($TableData, ['table_no' => $table_no, 'capacity' => $capacity, 'status' => 'available']);
            }
        }
    }

    return $TableData;
}



function getTotalOrders()
{
    $orders  = DB::table('orders_details')->count();
    return $orders;
}

function getIncompleteOrders()
{
    $orders  = DB::table('orders_details')->whereNot('status', '=', 'completed')->count();
    return $orders;
}
function getCompletedOrders()
{
    $orders  = DB::table('orders_details')->where('status', '=', 'completed')->count();
    return $orders;
}


function getTotalCategory()
{
    $cat = DB::table('product_categories')->count();
    return $cat;
}

function getTotalBookings()
{
    $bookings = DB::table('bookings')->count();
    return $bookings;
}

function getTotalProducts()
{
    $product = DB::table('products')->count();
    return $product;
}

function getUniqueBookingYear()
{
    $getBookingData = DB::table('bookings')->get();
    $year_arr = [];
    if (!is_null($getBookingData)) {
        foreach ($getBookingData as $single_booking) {
            $created_at = $single_booking->created_at;
            $getYear =  date_format(date_create($created_at), 'Y');
            if (!in_array($getYear, $year_arr)) {
                array_push($year_arr, $getYear);
            }
        }
    }
    return $year_arr;
}

function getUniqueOrderYear()
{
    $getOrderData = DB::table('orders_details')->get();
    $year_arr = [];
    if (!is_null($getOrderData)) {
        foreach ($getOrderData as $single_order) {
            $created_at = $single_order->created_at;
            $getYear =  date_format(date_create($created_at), 'Y');
            if (!in_array($getYear, $year_arr)) {
                array_push($year_arr, $getYear);
            }
        }
    }
    return $year_arr;
}



function getSalary($uid, $year, $month)
{

    $DefineSalary = DB::table('define_salary')->where('uid', '=', $uid)->get();
    if (count($DefineSalary) != 0) {
        $CurrentSalary = $DefineSalary[0]->current_salary;
    } else {
        $CurrentSalary = 0;
    }

    $LeaveData = DB::table('leaves')->where([
        ['uid', '=', $uid],
        ['year', '=', $year],
        ['month', '=', $month],
    ])->get();

    $total_leave = 0;
    if (count($LeaveData) != 0) {
        foreach ($LeaveData as $single_leave) {
            $l_from = $single_leave->l_from;
            $l_to = $single_leave->l_to;
            $dateDiff = dateDifference($l_from, $l_to);
            $total_leave += $dateDiff;
        }
    }

    $AdvancePayment = DB::table('advance_payment')->where([
        ['uid', '=', $uid],
        ['year', '=', $year],
        ['month', '=', $month],
    ])->get();

    $total_advance = 0;
    if (count($AdvancePayment) != 0) {
        foreach ($AdvancePayment as $single_advancePayment) {
            $total_advance += $single_advancePayment->amount;
        }
    }

    return  ['currentSalary' => $CurrentSalary, "Leave" => $total_leave, 'Advance' => $total_advance];
}

function getActiveAttendanceRule($id = null)
{
    if ($id == null) {
        $data = DB::table('attendance_rules')->where('status', '=', '1')->get();
        $rule_id = $data[0]->id;
        return $rule_id;
    } else {
        $data = DB::table('attendance_rules')->where('id', '=', $id)->get();
        return $data;
    }
}

function getStaffDetailsUsingUid($uid)
{
    $data = DB::table('staffs')->where('uid', '=', $uid)->get();
    if (count($data) != 0) {
        return $data;
    } else {
        return false;
    }
}
function getIncrementedSalary($uid)
{
    $data = DB::table('salary_increment')->where('uid', '=', $uid)->get();
    if (count($data) != 0) {
        return $data;
    } else {
        return false;
    }
}





function getAllStaff()
{
    $staffData = DB::table('staffs')->orderBy('name', 'asc')->get();
    $staff = '';
    foreach ($staffData as $single_staff) {
        foreach ($staffData as $single_staff) {
            $staff .= "<option value='$single_staff->uid'>$single_staff->name</option>";
        }

        return $staff;
    }
}



function getTotalCustomer()
{
    return DB::table('customers')->count();
}


function totalVisitor()
{
    $visitor = DB::table('orders_details')->get();
    $visitor_count = 0;
    if (!is_null($visitor)) {
        foreach ($visitor as $single_visitor) {
            $visitor_count +=  $single_visitor->no_of_people;
        }
    }
    return $visitor_count;
}


function getAllTable()
{
    $getTables = DB::table('tables')->orderBy('table_no', 'asc')->get();
    $TableData = [];

    // get table status from order details table 

    $orderDetails  = DB::table('orders_details')->where('table_status', '=', '0')->get();
    if (!is_null($orderDetails)) {
        $selectedTable  = [];
        $orderIdArr = [];
        // get all selected table array
        foreach ($orderDetails as $single_order) {
            $tables = json_decode($single_order->selectedTable, true);
            $orderId = $single_order->order_id;
            foreach ($tables as $single_table) {
                if (!in_array($single_table, $selectedTable)) {
                    array_push($selectedTable, $single_table);
                    $orderIdArr[$single_table] = $orderId;
                }
            }
        }

        if (count($getTables) != 0) {
            foreach ($getTables as $single_table) {
                $table_no = $single_table->table_no;
                if (!in_array($table_no, $selectedTable)) {
                    array_push($TableData, ['table_no' => $table_no, 'status' => 'available']);
                } else {
                    $getOrderId = $orderIdArr[$table_no];
                    array_push($TableData, ['table_no' => $table_no, 'status' => 'unavailable', 'order_id' => $getOrderId]);
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

    return   $TableData;
}
