@extends('admin.main')
@push('title')
    <title>Bookings</title>
@endpush
@section('main-section')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Booking</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Bookings Detail</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0 mt-4">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <div class="row">
                                    <div
                                        class="col-md-4 mb-md-0 mb-2 d-flex justify-content-md-start justify-content-center align-items-center">
                                        <h6 class="text-primary" style="font-size: 16px">
                                            @php
                                                if (isset($_GET['bookings'])) {
                                                    echo 'Cancelled Bookings Details';
                                                } else {
                                                    echo 'All Bookings Details';
                                                }
                                            @endphp
                                        </h6>
                                    </div>
                                    <div
                                        class="col-md-8 d-flex justify-content-md-end justify-content-center align-items-center">
                                        <div class="d-flex justify-content-end align-items-center"
                                            id="booking-table-action">
                                            <div class="d-flex justify-content-center align-items-center checkbox-selected"
                                                id="booking-selected">
                                                {{-- No. of Selected Item will show here  --}}
                                            </div>
                                            <div class="me-3">
                                                <a href="{{ route('admin.showBooking') }}"
                                                    class="btn btn-primary text-nowrap">All
                                                </a>
                                            </div>
                                            <div class="me-3">
                                                <a href="{{ route('admin.showBooking') }}?bookings=cancelled"
                                                    class="btn btn-danger text-nowrap">Cancelled
                                                </a>
                                            </div>
                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                <a href="{{ route('admin.addBooking') }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="auto" data-bs-title="Add New"
                                                    class="btn btn-primary"><i class="fa-regular fa-plus"></i>
                                                </a>
                                                <a href="{{ route('admin.Trash', 'bookings-trash') }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Show Trash" class="btn btn-warning"> <i
                                                        class="fa-sharp fa-solid fa-trash-undo"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger disabled-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Move Into Trash" disabled
                                                    onclick="deleteConfirm('booking-delete-all','bookings', 'false','','')">
                                                    <i class="fa-regular fa-trash"></i>
                                                    <input type="hidden" value="" id="booking-delete-all">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="mt-2 mx-2 mb-3">
                                    <table id="booking-table" class="table table-hover table-borderless w-100 border-bottom"
                                        style="min-width: 500px">
                                        <thead class="bg-light border-0">
                                            <tr>
                                                <th></th>
                                                <th class="sort text-nowrap">Booking Id</th>
                                                <th class="sort text-nowrap">Customer Name</th>
                                                <th class="sort text-nowrap">Phone</th>
                                                <th class="sort text-nowrap">Email</th>
                                                <th class="sort text-nowrap">Address</th>
                                                <th class="sort text-nowrap">No. Of People</th>
                                                <th class="sort text-nowrap">Event</th>
                                                <th class="sort text-nowrap">Booked From</th>
                                                <th class="sort text-nowrap">Booked To</th>
                                                {{-- <th class="sort text-nowrap">Tables</th> --}}
                                                <th class="sort text-nowrap">Amount</th>
                                                <th class="sort text-nowrap">Description</th>
                                                @if (isset($_GET['bookings']))
                                                    <th class="sort text-nowrap">Cancel Reason</th>
                                                @endif
                                                <th class="sort text-nowrap">Created At</th>
                                                <th class="sort text-nowrap">Updated At</th>
                                                <th class="sort text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
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


    {{-- ================== Modal Started ============== --}}
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="cancel-booking" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
        role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form class="w-100" method="post" id="booking-cancel-form" enctype="multipart/form-data"
                onsubmit="uploadData1('booking-cancel-form','{{ route('admin.cancelBooking') }}', 'booking-cancel-form-alert-box', 'booking-cancel-form-btn-box-1', event)">
                @csrf
                <div class="modal-content">
                    <div class="modal-header bg-danger py-2">
                        <h5 class="modal-title " id="modalTitleId">Cancel Booking</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <input type="hidden" value="" name="booking_id" required
                                    id="booking_id_hidden_input">
                                <div id="booking-cancel-form-alert-box"></div>

                                <div class="col-12">
                                    <label class="form-label">Reason <span class="text-danger">*</span></label>
                                    <textarea name="reason" class="form-control" required placeholder="Type a reason" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div style="width: 100px" id="booking-cancel-form-btn-box-1">
                            <button class="btn btn-primary" type="submit"
                                style="width:100% ; font-size:15px">Done</button>
                        </div>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            let queryParams = getQueryParams();
            let searchParams = queryParams[1];
            if (queryParams == 0) {
                $('#booking-table').DataTable().clear().destroy();
                initServerSideDataTable('booking-table', '/admin/show-booking', 'booking-selected',
                    createColumn(BookingTablesColumn),
                    'booking-table-action')
            } else {
                $('#booking-table').DataTable().clear().destroy();
                let fetchurl = `/admin/show-booking` + searchParams
                console.log(fetchurl);
                initServerSideDataTable('booking-table', fetchurl, 'booking-selected',
                    createColumn(cancelled_BookingTablesColumn),
                    'booking-table-action')
            }
        </script>
    @endpush
@endsection
