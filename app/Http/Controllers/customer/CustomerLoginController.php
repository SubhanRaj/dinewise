<?php

namespace App\Http\Controllers\customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomersModel;
use Illuminate\Support\Facades\Validator;

class CustomerLoginController extends Controller
{
    public function login()
    {
        return view('customer.customer-login');
    }
    public function signUp()
    {
        return view('customer.customer-sign-up');
    }

    public function account()
    {
        return view('customer.account');
    }

    public function signIn(Request $request)
    {
        $validator =  Validator::make($request->all(), [
            "phone_number" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Please enter your registered phone number',
                'redirect' => '0'
            ]);
        } else {
            try {
                $phone_number = sanitizeInput($request->phone_number);
                $data = CustomersModel::where('phone', '=', $phone_number)->get();
                if (count($data) > 0) {
                    $customer_id = $data[0]->id;
                    session()->put(['customer_id' => $customer_id, 'phone_number' => $phone_number]);
                    return response()->json([
                        'status' => true,
                        'errors' => '',
                        'message' => 'Login successfull',
                        'redirect' => true,
                        'url' => route('customer.account'),
                    ]);
                } else {
                    return response()->json([
                        'status' => false,
                        'errors' => '',
                        'message' => 'Phone number is not registered',
                        'redirect' => '0'
                    ]);
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'errors' => $th->getMessage(),
                    'message' => 'Failed to sign in. Please try again latter.',
                    'redirect' => '0'
                ]);
            }
        }
    }

    public function logout()
    {
        session()->forget(['customer_id', 'phone_number']);
        return redirect()->back();
    }

    public function updateCustomerData(Request $request, $id)
    {
        $validator =  Validator::make($request->all(), [
            "name" => "required",
            "phone" => "required|unique:customers,phone,$id",
            "email" => "required",
            "dob" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
                'message' => 'Failed to update profile details',
                'redirect' => '0'
            ]);
        } else {
            try {

                $data = CustomersModel::find($id);
                $data->name  = sanitizeInput($request->name);
                $data->phone  = sanitizeInput($request->phone);
                $data->email  = sanitizeInput($request->email);
                $data->dob  = sanitizeInput($request->dob);
                $data->save();
                session()->put(['customer_id' => $id, 'phone_number' => $request->phone]);
                return response()->json([
                    'status' => true,
                    'errors' => '',
                    'message' => 'Details updated successfully',
                    'redirect' => true,
                    'url' => route('customer.account'),
                ]);
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'errors' => $th->getMessage(),
                    'message' => 'Failed to update profile details',
                    'redirect' => '0'
                ]);
            }
        }
    }
}
