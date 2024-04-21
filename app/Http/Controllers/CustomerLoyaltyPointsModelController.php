<?php

namespace App\Http\Controllers;

use App\Models\CustomerLoyaltyPointsModel;
use Illuminate\Http\Request;

class CustomerLoyaltyPointsModelController extends Controller
{
    public function saveLoyaltyPoint(Request $request)
    {
        $customer_id_or_booking_id = $request->customer_id_or_booking_id;
        $loyalty_point = $request->loyalty_point;

        try {
            $getCustLoyalty = CustomerLoyaltyPointsModel::where('customer_id', '=', $customer_id_or_booking_id)->get();
            if (count($getCustLoyalty) > 0) {
                //  update loyalty point  
                $getCustLoyalty[0]->points = $getCustLoyalty[0]->points + $loyalty_point;
                $getCustLoyalty[0]->save();
            } else {
                //  insert loyalty point 
                $newLoyaltyPoint = new CustomerLoyaltyPointsModel();
                $newLoyaltyPoint->customer_id = $customer_id_or_booking_id;
                $newLoyaltyPoint->points = $loyalty_point;
                $newLoyaltyPoint->save();
            }

            return response()->json([
                'status' => true,
                'message' => "Loyalty point added successfully."
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
}
