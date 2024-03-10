<!doctype html>
<html lang="en">

<head>
    <title>Receipt Verification</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>
<style>
    * {
        margin: 0;
        padding: 0;
    }
</style>
@php
    $order = DB::table('orders_details')
        ->where('order_id', '=', $order_id)
        ->first();
    
@endphp

<body>


    <section class="container py-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mb-2 d-flex justify-content-center">
                                <img src="{{ asset('assets/logo.png') }}">
                            </div>
                            <div class="col-12 mb-2 text-center">
                                <p class="my-1">Lorem ipsum dolor sit, amet consectetur </p>
                                <p class="my-1">example@gmail.com</p>
                                <p class="my-1">75146514865</p>

                            </div>

                            @if (!is_null($order))

                                <div class="col-12 mb-2 border-top">
                                    <table class="table w-100 table-borderless table-responsive">
                                        <tr>
                                            <th class="text-center text-primary">Order Id : {{ $order_id }} </th>
                                            <th class="text-center text-primary">Date :
                                                {{ showDate($order->created_at) }}
                                            </th>
                                            <th class="text-center text-primary">Time :
                                                {{ showTime($order->created_at) }}
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 mb-2 border-top p-0">
                                    <table class="table w-100 table-striped table-borderless">
                                        <tr>
                                            <th class="text-center bg-primary text-white">Item</th>
                                            <th class="text-center bg-primary text-white">Unit</th>
                                            <th class="text-center bg-primary text-white">Price</th>
                                            <th class="text-center bg-primary text-white">Quantity</th>
                                            <th class="text-center bg-primary text-white">Amount</th>
                                        </tr>
                                        @php
                                            // get product data with product name
                                            $product = getProductNameUsingProductData($order->productData);
                                        @endphp
                                        @foreach ($product as $single_product)
                                            <tr>
                                                <td class="text-center">{{ $single_product['product_name'] }}</td>
                                                <td class="text-center">{{ $single_product['product_unit'] }} </td>
                                                <td class="text-center">
                                                    Rs. {{ IND_num_format($single_product['price_per_unit']) }}</td>
                                                <td class="text-center">
                                                    {{ IND_num_format($single_product['product_qty']) }}
                                                </td>
                                                <td class="text-center">
                                                    Rs. {{ IND_num_format($single_product['product_price']) }}</td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>
                                <div class="col-12 mb-2 border-top p-0">
                                    <table class="table w-100 table-borderless mt-4">
                                        <tr>
                                            <th class="p-0">
                                                <div class="d-flex justify-content-end pe-4">
                                                    <span class="text-end me-5" style="width:120px">Total Item</span>
                                                    <span class="text-start"
                                                        style="width:80px;">{{ $order->total_item }}</span>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="p-0">
                                                <div class="d-flex justify-content-end pe-4">
                                                    <span class="text-end me-5" style="width:120px">Amount</span>
                                                    <span class="text-start"
                                                        style="width:80px;">Rs. {{ IND_num_format($order->total_amount) }}</span>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="p-0">
                                                <div class="d-flex justify-content-end pe-4">
                                                    <span class="text-end me-5" style="width:120px">GST Amount</span>
                                                    <span class="text-start"
                                                        style="width:80px;">Rs. {{ IND_num_format($order->gst_amount) }}</span>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="p-0">
                                                <div class="d-flex justify-content-end pe-4 ">
                                                    <span class="text-end me-5" style="width:120px">Discount</span>
                                                    <span class="text-start"
                                                        style="width:80px;">Rs. {{ IND_num_format($order->discount_amount) }}</span>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="p-0">
                                                <div class="d-flex justify-content-end pe-4 ">
                                                    <span class="text-end me-5" style="width:120px">Total Amount</span>
                                                    <span class="text-start"
                                                        style="width:80px;">Rs. {{ IND_num_format($order->grand_amount) }}</span>
                                                </div>
                                            </th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 border-top mt-4 d-flex justify-content-center">
                                    <img src="{{ asset('assets/check-mark.png') }}" alt="">
                                </div>
                            @else
                                <div class="col-12">
                                    <h1 class="text-center">Not Found</h1>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
