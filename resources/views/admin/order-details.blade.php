@extends('admin.main')
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
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
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
                            {{-- <tr>
                                <th class="text-center">Chef Status</th>
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
                        <table class="table table-bordered w-100">
                            @php
                                $customer_data = getCustomer(
                                    $orderData->customer_or_booking,
                                    $orderData->customer_id_or_booking_id,
                                );
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
                                <th class="text-center">
                                    Order Instructions
                                </th>
                            </tr>
                            <tr>
                                <td class="text-center">
                                    {{ $orderData->orderInstruction }}
                                </td>
                            </tr>

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
                                <th class="text-center">Loyalty Discount </th>
                                <th class='w-50 text-center'> {{ IND_num_format($orderData->loyalty_discount) }}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Payable Amount </th>
                                <th class='w-50 text-center'> {{ IND_num_format($orderData->payable_amount) }}</th>
                            </tr>

                            <tr>
                                <th class="text-center">Payment Method </th>
                                <th class='w-50 text-center'> {{ $orderData->payment_method }}</th>
                            </tr>
                            <tr>
                                <th class="text-center">Payment Status </th>
                                <th class='w-50 text-center'>{{ $orderData->payment_status }}</th>
                            </tr>
                        </table>

                        <form id="form"
                            onsubmit="uploadData1('form','{{ route('admin.updateOrderStatus', $orderData->order_id) }}', 'alert-box', 'btn-box', event)">
                            @csrf
                            <div class="col-12" id="alert-box"></div>
                            <table class="table table-bordered w-100">
                                <tr class="bg-primary">
                                    <th colspan="10" class="text-center">
                                        Manage Order Status
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
    @push('scripts')
        <script></script>
    @endpush
@endsection
