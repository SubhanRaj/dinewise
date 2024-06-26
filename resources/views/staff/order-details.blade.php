@extends('staff.main')
@push('title')
    <title> Order Details</title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Orders</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('staff.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Order Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0 m-0">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered w-100">
                            <tr>
                                <th class="text-center">Order Id</th>
                                <td class="text-center">{{ $orderData->order_id }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">Selected Table</th>
                                <td class="text-center">{{ implode(', ', json_decode($orderData->selectedTable, true)) }}
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Number Of People</th>
                                <td class="text-center">{{ $orderData->no_of_people }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">Order Status</th>
                                <td class="text-center">
                                    @if ($orderData->status == 'completed')
                                        <span class="badge text-bg-success p-2 font-13"> Completed</span>
                                    @else
                                        <span class="badge text-bg-danger p-2 font-13">Not Completed</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <table class="table table-bordered w-100">
                            @php
                                $customer_data = getCustomer($orderData->customer_or_booking, $orderData->customer_id_or_booking_id);
                            @endphp
                            <tr class="bg-primary">
                                <th colspan="2" class="text-center">
                                    Customer's Details
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Name </th>
                                <td class="text-center">{{ $customer_data['name'] }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">Phone Number </th>
                                <td class="text-center">{{ $customer_data['phone'] }}</td>
                            </tr>
                        </table>
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
                                <th class="text-nowrap text-center">Price </th>
                                <th class="text-nowrap text-center">Total Amount </th>
                            </tr>
                            @php
                                $product_data = getProductNameUsingProductData($orderData->productData);
                            @endphp
                            @foreach ($product_data as $single_data)
                                <tr>
                                    <td class="text-center">{{ $single_data['product_id'] }}</td>
                                    <td class="text-center">{{ $single_data['product_name'] }}</td>
                                    <td class="text-center">{{ $single_data['product_unit'] }}</td>
                                    <td class="text-center">{{ $single_data['product_qty'] }}</td>
                                    <td class="text-center">{{ $single_data['price_per_unit'] }}</td>
                                    <td class="text-center">{{ $single_data['product_price'] }}</td>
                                </tr>
                            @endforeach
                        </table>


                        <table class="table table-bordered w-100">
                            <tr class="bg-primary">
                                <th colspan="10" class="text-center">
                                    Payment Details
                                </th>
                            </tr>
                            <tr>
                                <th class="text-center">Total Item </th>
                                <th class='w-50 text-center'>{{ $orderData->total_item }}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Total Amount </th>
                                <th class='w-50 text-center'> {{ IND_num_format($orderData->total_amount) }}</th>
                            </tr>
                            <tr>
                                <th class="text-center">GST Amount </th>
                                <th class='w-50 text-center'>{{ IND_num_format($orderData->gst_amount) }}</th>
                            </tr>

                            <tr>
                                <th class="text-center">Grand Total </th>
                                <th class='w-50 text-center'>{{ IND_num_format($orderData->grand_amount) }}</th>
                            </tr>

                            <tr>
                                <th class="text-center">Discount </th>
                                <th class='w-50 text-center'>{{ IND_num_format($orderData->discount_amount) }}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Paid </th>
                                <th class='w-50 text-center'> {{ IND_num_format($orderData->paid_amount) }}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Due </th>
                                <th class='w-50 text-center'>{{ IND_num_format($orderData->due_amount) }}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Payment Method </th>
                                <th class='w-50 text-center'> {{ $orderData->payment_method }}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Payment STatus </th>
                                <th class='w-50 text-center'>{{ $orderData->payment_status }}</th>
                            </tr>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        
    @endpush
@endsection
