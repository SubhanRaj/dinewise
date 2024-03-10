@extends('admin.main')
@push('title')
    <title>Trash </title>
@endpush
@section('main-section')
    <div class="page-wrapper">
        <div class="page-content">
            @php
                // $url = $data['url'];
                $table = $data['table'];
                $column = $data['column'];
                if ($table == 'media') {
                    $file = 'true';
                } else {
                    $file = 'false';
                }
            @endphp

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0 mt-4">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <div class="row">
                                    <div
                                        class="col-md-4 mb-md-0 mb-2 d-flex justify-content-md-start justify-content-center align-items-center">
                                        <h6 class="text-primary" style="font-size: 16px">Trashed Data</h6>
                                    </div>
                                    <div
                                        class="col-md-8 d-flex justify-content-md-end justify-content-center align-items-center">
                                        <div class="d-flex justify-content-end align-items-center" id="trash-table-action">
                                            <div class="d-flex justify-content-center align-items-center checkbox-selected"
                                                id="trash-selected">
                                                {{-- No. of Selected Item will show here  --}}
                                            </div>

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <button type="button" class="btn btn-success disabled-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Restore" disabled
                                                    onclick="restoreDeletedData('trash-delete-all','{{ $table }}', 'false','','')">
                                                    <i class="fa-sharp fa-solid fa-trash-undo"></i>
                                                </button>
                                                <button type="button" class="btn btn-danger disabled-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Delete Permanentally" disabled
                                                    onclick="deletePermanentally('trash-delete-all','{{ $table }}', '{{ $file }}','','')">
                                                    <i class="fa-regular fa-trash"></i>
                                                    <input type="hidden" value="" id="trash-delete-all">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="mt-2 mx-2 mb-3">
                                    <table id="trash-table" class="table table-hover table-borderless w-100 border-bottom"
                                        style="min-width: 500px">
                                        <thead class="bg-light border-0">
                                            <tr>
                                                <th></th>
                                                @if ($table == 'media')
                                                    <th class="sort text-nowrap">Image</th>
                                                @elseif ($table == 'product_categories')
                                                    {{-- product category trash  --}}
                                                    <th class="sort text-nowrap">Category Name</th>
                                                @elseif ($table == 'pricing_units')
                                                    {{-- pricing unit trash  --}}
                                                    <th class="sort text-nowrap">Pricing Unit</th>
                                                @elseif ($table == 'products')
                                                    {{-- all products trash  --}}
                                                    <th class="sort text-nowrap">Category Name</th>
                                                    <th class="sort text-nowrap">Product Id</th>
                                                    <th class="sort text-nowrap">Product Name</th>
                                                    <th class="sort text-nowrap">Product Picture</th>
                                                    <th class="sort text-nowrap">Stock</th>
                                                    <th class="sort text-nowrap">Pricing</th>
                                                @elseif ($table == 'product_materials')
                                                    {{-- product material trash  --}}
                                                    <th class="sort text-nowrap">Material</th>
                                                    <th class="sort text-nowrap">Status</th>
                                                @elseif ($table == 'tables')
                                                    <th class="sort text-nowrap">Table Number</th>
                                                    <th class="sort text-nowrap">Capacity</th>
                                                @elseif ($table == 'bookings')
                                                    {{-- bookings trash    --}}

                                                    <th class="sort text-nowrap">Booking Id</th>
                                                    <th class="sort text-nowrap">Customer Name</th>
                                                    <th class="sort text-nowrap">Phone</th>
                                                    <th class="sort text-nowrap">Email</th>
                                                    <th class="sort text-nowrap">Address</th>
                                                    <th class="sort text-nowrap">No. Of People</th>
                                                    <th class="sort text-nowrap">Event</th>
                                                    <th class="sort text-nowrap">From</th>
                                                    <th class="sort text-nowrap">To</th>
                                                    {{-- <th class="sort text-nowrap">Tables</th> --}}
                                                    <th class="sort text-nowrap">Amount</th>
                                                    <th class="sort text-nowrap">Description</th>
                                                @elseif ($table == 'orders_details')
                                                    <th class="sort text-nowrap">Order Id</th>
                                                    <th class="sort text-nowrap">Product Details</th>
                                                    <th class="sort text-nowrap">Tables</th>
                                                    <th class="sort text-nowrap">People</th>
                                                    <th class="sort text-nowrap">Customer Name</th>
                                                    <th class="sort text-nowrap">Customer Mobile</th>
                                                    <th class="sort text-nowrap">Paid Amount</th>
                                                    <th class="sort text-nowrap">Status</th>
                                                @elseif ($table == 'customers')
                                                    <th class="sort text-nowrap">Name</th>
                                                    <th class="sort text-nowrap">Phone Number</th>
                                                    <th class="sort text-nowrap">Email</th>
                                                    <th class="sort text-nowrap">Date Of Birth</th>
                                                    <th class="sort text-nowrap">Date Of Anniversary</th>
                                                @elseif ($table == 'staffs')
                                                    <th class="sort text-nowrap" style="width:80px">Profile</th>
                                                    <th class="sort text-nowrap">Name</th>
                                                    <th class="sort text-nowrap">UID</th>
                                                    <th class="sort text-nowrap">Email</th>
                                                    <th class="sort text-nowrap">Phone</th>
                                                    <th class="sort text-nowrap">Experience</th>
                                                    <th class="sort text-nowrap">Designation</th>
                                                    <th class="sort text-nowrap">Date Of Joining</th>
                                                    <th class="sort text-nowrap">Address</th>
                                                    <th class="sort text-nowrap">Documents</th>
                                                @elseif ($table == 'staff_account_details')
                                                    <th class="sort text-nowrap" style="width:80px">Profile</th>
                                                    <th class="sort text-nowrap">Name</th>
                                                    <th class="sort text-nowrap">UID</th>
                                                    <th class="sort text-nowrap">Bank Name</th>
                                                    <th class="sort text-nowrap">Account Holder Name</th>
                                                    <th class="sort text-nowrap">Account Number</th>
                                                    <th class="sort text-nowrap">IFSC Code</th>
                                                    <th class="sort text-nowrap">Phone Number</th>
                                                    <th class="sort text-nowrap">Google Pay</th>
                                                    <th class="sort text-nowrap">Phone Pay</th>
                                                    <th class="sort text-nowrap">PayTm</th>
                                                @elseif ($table == 'salary_increment')
                                                    <th class="sort text-nowrap" style="width:80px">Profile</th>
                                                    <th class="sort text-nowrap">Name</th>
                                                    <th class="sort text-nowrap">UID</th>
                                                    <th class="sort text-nowrap">Incremented </th>
                                                @elseif ($table == 'define_salary')
                                                    <th class="sort text-nowrap" style="width:80px">Profile</th>
                                                    <th class="sort text-nowrap">Name</th>
                                                    <th class="sort text-nowrap">UID</th>
                                                    <th class="sort text-nowrap">Starting Salary</th>
                                                    <th class="sort text-nowrap">Incremented Salary </th>
                                                    <th class="sort text-nowrap">Increment Count</th>
                                                    <th class="sort text-nowrap">Current Salary</th>
                                                    <th class="sort text-nowrap">Per Day Salary</th>
                                                @elseif ($table == 'advance_payment')
                                                    <th class="sort text-nowrap" style="width:80px">Profile</th>
                                                    <th class="sort text-nowrap">Name</th>
                                                    <th class="sort text-nowrap">UID</th>
                                                    <th class="sort text-nowrap">Amount </th>
                                                    <th class="sort text-nowrap">Year </th>
                                                    <th class="sort text-nowrap">Month </th>
                                                    <th class="sort text-nowrap">Date </th>
                                                @elseif ($table == 'released_payment')
                                                    <th class="sort text-nowrap" style="width:80px">Profile</th>
                                                    <th class="sort text-nowrap">Name</th>
                                                    <th class="sort text-nowrap">UID</th>
                                                    <th class="sort text-nowrap">Paid Amount</th>
                                                    <th class="sort text-nowrap">Rest Amount</th>
                                                    <th class="sort text-nowrap">Method</th>
                                                    <th class="sort text-nowrap">Transaction Id</th>
                                                    <th class="sort text-nowrap">Date & Time</th>
                                                @elseif ($table == 'leaves')
                                                    <th class="sort text-nowrap" style="width:80px">Profile</th>
                                                    <th class="sort text-nowrap">Name</th>
                                                    <th class="sort text-nowrap">UID</th>
                                                    <th class="sort text-nowrap">From</th>
                                                    <th class="sort text-nowrap">To</th>
                                                    <th class="sort text-nowrap">Description</th>
                                                    <th class="sort text-nowrap">Year </th>
                                                    <th class="sort text-nowrap">Month </th>
                                                    <th class="sort text-nowrap">Date </th>
                                                    <th class="sort text-nowrap">Status</th>
                                                @elseif ($table == 'attendance')
                                                    <th class="sort text-nowrap" style="width:80px">Profile</th>
                                                    <th class="sort text-nowrap">Name</th>
                                                    <th class="sort text-nowrap">UID</th>
                                                    <th class="sort text-nowrap">Date</th>
                                                    <th class="sort text-nowrap">Year</th>
                                                    <th class="sort text-nowrap">Month</th>
                                                    <th class="sort text-nowrap">Status</th>
                                                    <th class="sort text-nowrap">Login</th>
                                                    <th class="sort text-nowrap">Logout</th>
                                                @elseif ($table == 'create_payment')
                                                    <th class="sort text-nowrap" style="width:80px">Profile</th>
                                                    <th class="sort text-nowrap">Name</th>
                                                    <th class="sort text-nowrap">UID</th>
                                                    <th class="sort text-nowrap">Year</th>
                                                    <th class="sort text-nowrap">Month</th>
                                                    <th class="sort text-nowrap">Deduction</th>
                                                    <th class="sort text-nowrap">Bonus</th>
                                                    <th class="sort text-nowrap">Final Amount</th>
                                                    <th class="sort text-nowrap">Comment</th>
                                                    <th class="sort text-nowrap">Status</th>
                                                @endif
                                                <th class="sort text-nowrap">Created At</th>
                                                <th class="sort text-nowrap">Updated At</th>
                                                <th class="sort text-nowrap">Deleted At</th>
                                            </tr>
                                        </thead>
                                        <tbody class="img-table">
                                            {{-- Data will load here using ajax server side . --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            let column
            if ({{ Js::from($column) }} == 'Trash_mediaColumn') {
                column = Trash_mediaColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=media-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_ProductCategoryColumn') {
                column = Trash_ProductCategoryColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=product-category-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_PricingUnitColumn') {
                column = Trash_PricingUnitColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=pricing-unit-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_AllProductColumn') {
                column = Trash_AllProductColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=all-product-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_ProductMaterialColumn') {
                column = Trash_ProductMaterialColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=material-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_TablesColumn') {
                column = Trash_TablesColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=tables-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_BookingTablesColumn') {
                column = Trash_BookingTablesColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=bookings-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_OrderTablesColumn') {
                column = Trash_OrderTablesColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=product-order-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_CustomersTablesColumn') {
                column = Trash_CustomersTablesColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=customers-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_staffColumn') {
                column = Trash_staffColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=staff-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_staffAccountColumn') {
                column = Trash_staffAccountColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=show-staff-account-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_staffIncrementSalaryColumn') {
                column = Trash_staffIncrementSalaryColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=incremented-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_staffDefineSalaryColumn') {
                column = Trash_staffDefineSalaryColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=salary-details-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_AdvanceSalaryColumn') {
                column = Trash_AdvanceSalaryColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=advance-payment-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_releasedPaymentCol') {
                column = Trash_releasedPaymentCol;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=released-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_leaveColumn') {
                column = Trash_leaveColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=leave-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_attendanceColumn') {
                column = Trash_attendanceColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=attendance-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            } else if ({{ Js::from($column) }} == 'Trash_createdPaymentColumn') {
                column = Trash_createdPaymentColumn;
                initServerSideDataTable('trash-table', '/admin/get-trash-data?trash_of=created-payment-trash',
                    'trash-selected', createColumn(column, true, false, true, true, true),
                    'trash-table-action')
            }
        </script>
    @endpush
@endsection
