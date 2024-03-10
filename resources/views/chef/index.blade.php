@extends('chef.main')
@push('title')
    <title> Dashboard </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="font-18 font-weight-bold">New Orders</h4>
                            </div>
                        </div>
                    </div>

                    @php
                        $orderData = DB::table('orders_details')
                            ->whereNot('chef_status', '=', 'PREPARED')
                            ->orderBy('id', 'desc')
                            ->get();
                    @endphp
                    @if (count($orderData) != 0)
                        @foreach ($orderData as $single_order)
                            <div class="col-lg-6">
                                <div class="card">
                                    @if ($single_order->chef_status == 'PREPARING')
                                        <div class="card-header bg-info d-flex justify-content-between align-items-center">
                                            <h6 class="text-dark">Order Id : {{ $single_order->order_id }}</h6>
                                            <a href="{{ route('chef.singleOrder', $single_order->order_id) }}"
                                                class="btn btn-warning">View</a>
                                        </div>
                                    @else
                                        <div
                                            class="card-header bg-primary d-flex justify-content-between align-items-center">
                                            <h6>Order Id : {{ $single_order->order_id }}</h6>
                                            <a href="{{ route('chef.singleOrder', $single_order->order_id) }}"
                                                class="btn btn-warning">View</a>
                                        </div>
                                    @endif
                                    <div class="card-body p-0">
                                        <div class="overflow-control" style="height:200px">
                                            <table class="table table-borderless w-100">
                                                <thead class="table-secondary position-sticky top-0">
                                                    <tr>
                                                        <th class="text-center">Product </th>
                                                        <th class="text-center">Unit </th>
                                                        <th class="text-center">Quantity </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $productData = getProductNameUsingProductData($single_order->productData);
                                                    @endphp
                                                    @if (count($productData) != 0)
                                                        @foreach ($productData as $single_product)
                                                            <tr>
                                                                <td class="text-center">
                                                                    {{ $single_product['product_name'] }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $single_product['product_unit'] }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $single_product['product_qty'] }}
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                        <hr>
                                        <h6 class="w-100 bg-warning text-dark py-2 text-center font-weight-bold">
                                            Instruction</h6>
                                        <div class="overflow-control" style="height:80px">
                                            <div class="d-flex justify-content-center  align-items-center h-100">
                                                @if ($single_order->orderInstruction === null || $single_order->orderInstruction == '')
                                                    <h6 class="text-center">No Instruction</h6>
                                                @else
                                                    <p class="py-2 px-3">{{ $single_order->orderInstruction }}</p>
                                                @endif

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
