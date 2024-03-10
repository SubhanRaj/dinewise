<!doctype html>
<html lang="en">

<head>
    <title>Restaurant Bill</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<style>
    body {
        display: flex;
        justify-content: center;
        font-size: 11px;
        color: black;
    }

    #receipt-wrapper {
        max-width: 79mm;
        min-width: 79mm;
        border: 1px solid #eee;
        padding: 20px 10px;
    }

    .receipt-logo {
        max-width: 45mm;
        margin: auto
    }

    table tr td,
    table tr th {
        text-transform: uppercase;
    }

    .item-details tr td,
    .item-details tr th {
        text-align: center;
        white-space: nowrap;
        padding: 5px 2px;

    }

    /* .item-details tr td:nth-child(1) {
        width: 50%;
    }

    .item-details tr td:nth-child(2) {
        width: 10%;
    }

    .item-details tr td:nth-child(3) {
        width: 15%;
        white-space: nowrap;
    }

    .item-details tr td:nth-child(4) {
        width: 10%;
    }

    .item-details tr td:nth-child(5) {
        width: 15%;
        white-space: nowrap;
    } */

    #qr-img {
        padding: 20px 0;
        max-width: 120px;
        margin: auto;
    }

    #qr-img img {
        width: 120px;
    }

    .total-table tr td {
        padding: 2px 10px;
    }

    .total-table tr td span:nth-child(1) {
        font-weight: 600;
    }

    .total-table tr td span:nth-child(2) {
        float: right;

    }
</style>

@php
    $order = DB::table('orders_details')
        ->where('order_id', '=', $order_id)
        ->first();
    
@endphp

<body>
    <div id="receipt-wrapper">
        <div class="receipt-logo">
            <img src="{{ public_path() }}/tempPdf/logo.png" style="width: 45mm;">
        </div>
        <table class="w-100 my-2">
            <tr>
                <th class="text-center border-0 pt-3">Digicrowd Solution</th>
            </tr>
            <tr>
                <td class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit</td>
            </tr>
            <tr>
                <td class="text-center">example@gmail.com</td>
            </tr>
            <tr>
                <td class="text-center">1231646853</td>
            </tr>
        </table>
        <hr>
        <table class="w-100 my-2">
            <tr>
                <th class="text-start" colspan="2">Order : {{ $order_id }}</th>
            </tr>
            <tr>
                <th class="text-start">Date : {{ showDate($order->created_at) }}</th>
                <th class="text-end">Time : {{ showTime($order->created_at) }}</th>
            </tr>
        </table>
        <hr>

        <table class="w-100 my-2 item-details">
            <tr>
                <th>Item</th>
                <th>Unit</th>
                <th>Price</th>
                <th>qty</th>
                <th>Total</th>
            </tr>
            @php
                // get product data with product name
                $product = getProductNameUsingProductData($order->productData);
            @endphp
            @foreach ($product as $single_product)
                <tr>
                    <td>{{ $single_product['product_name'] }}</td>
                    <td>{{ $single_product['product_unit'] }} </td>
                    <td>Rs.{{ IND_num_format($single_product['price_per_unit']) }}</td>
                    <td>{{ IND_num_format($single_product['product_qty']) }} </td>
                    <td>Rs.{{ IND_num_format($single_product['product_price']) }}</td>
                </tr>
            @endforeach

        </table>
        <hr>
        <table class="w-100 my-2 total-table">
            <tr>
                <td>
                    <span>Total Item</span>
                    <span>{{ IND_num_format($order->total_item) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Amount</span>
                    <span>Rs.{{ IND_num_format($order->total_amount) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>GST</span>
                    <span>Rs.{{ IND_num_format($order->gst_amount) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Discount</span>
                    <span>Rs.{{ IND_num_format($order->discount_amount) }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Grand Total</span>
                    <span>Rs.{{ IND_num_format($order->grand_amount) }}</span>
                </td>
            </tr>
        </table>

        <hr>

        <table class="w-100 mt-5 thankyou-table">
            <tr>
                <th class="text-uppercase text-center" style="font-size: 15px;">Thank you</th>
            </tr>
            <tr>
                <td class="text-center text-uppercase">Eat Well, Live Well</td>
            </tr>

        </table>
        <div id="qr-img">
            @php
                $file_name = uniqid() . '.svg';
                $path = public_path() . '/QR/' . $file_name;
                QrCode::generate('http://127.0.0.1:8000/receipt-verification/' . $order_id, $path);
            @endphp
            <img src="{{ $path }}">
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
