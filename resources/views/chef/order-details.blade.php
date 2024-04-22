@extends('chef.main')
@push('title')
    <title> Order Details </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered w-100">
                            <tr>
                                <th class="text-center">Order Id</th>
                                <td class="text-center">{{ $orderData->order_id }}</td>
                            </tr>

                            {{-- <tr>
                                <th class="text-center">Order Status</th>
                                <td class="text-center">
                                    @if ($orderData->chef_status == 'PREPARED')
                                        <span class="badge text-bg-success p-2 font-13"> PREPARED</span>
                                    @elseif ($orderData->chef_status == 'RECEIVED')
                                        <span class="badge text-bg-primary p-2 font-13">RECEIVED</span>
                                    @elseif ($orderData->chef_status == 'PREPARING')
                                        <span class="badge text-bg-info p-2 font-13">PREPARING</span>
                                    @endif
                                </td>
                            </tr> --}}
                        </table>
                        {{-- <form id="form" method="POST" action="{{ route('chef.updateOrder', $orderData->order_id) }}"> --}}
                        <form id="form"
                            onsubmit="uploadData1('form','{{ route('chef.updateOrder', $orderData->order_id) }}', 'alert-box', 'btn-box', event)">
                            @csrf
                            <div class="col-12" id="alert-box"></div>
                            <table class="table table-bordered w-100">
                                <tr class="bg-primary">
                                    <th colspan="10" class="text-center">
                                        Product Details
                                    </th>
                                </tr>
                                <tr class="table-secondary">
                                    <th class="text-nowrap text-center">Product Id </th>
                                    <th class="text-nowrap text-center">Product Name </th>
                                    <th class="text-nowrap text-center">Unit </th>
                                    <th class="text-nowrap text-center">Quantity </th>
                                    <th class="text-nowrap text-center">Status </th>
                                </tr>
                                @php
                                    $product_data = getProductNameUsingProductData($orderData->productData);
                                @endphp
                                @foreach ($product_data as $key => $single_data)
                                    <tr>
                                        <td class="text-center">{{ $single_data['product_id'] }}</td>
                                        <td class="text-center">{{ $single_data['product_name'] }}</td>
                                        <td class="text-center">{{ $single_data['product_unit'] }}</td>
                                        <td class="text-center">{{ $single_data['product_qty'] }}</td>
                                        <td class="text-center">
                                            <input type="hidden" name="index[]" value="{{ $key }}">
                                            <select name="order_status[]" class="form-control">
                                                <option value="{{ $single_data['order_status'] }}">
                                                    {{ $single_data['order_status'] }}</option>
                                                <option value="Recieved">Recieved</option>
                                                <option value="Processing">Processing</option>
                                                <option value="Prepared">Prepared</option>
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                            <div id="btn-box" style="max-width: 200px">
                                <button type="submit" class="btn btn-primary w-100">
                                    Save
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
