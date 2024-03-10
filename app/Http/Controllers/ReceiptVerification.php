<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class ReceiptVerification extends Controller
{
    public function verification(Request $request, $order_id)
    {

        return view('receipt-verification')->with(compact('order_id'));
    }
}
