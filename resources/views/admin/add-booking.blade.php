@extends('admin.main')
@push('title')
    <title>Add Booking</title>
@endpush
@section('main-section')
    <!--start page wrapper -->
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
                                    <li class="breadcrumb-item active" aria-current="page">Add Booking</li>
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
                                <h6 class="text-primary" style="font-size: 16px">Add Booking</h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="product-form"
                                    onsubmit="uploadData1('product-form','{{ route('admin.saveBooking') }}', 'alert-box', 'btn-box-1', event)"
                                    class="mx-3 p-3" enctype="multipart/form-data">
                                    @csrf
                                    <div id="alert-box"></div>

                                    <div class="row">
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Booked From <span class="text-danger">*</span></label>
                                            <input type="datetime-local" name="booked_from" class="form-control" required
                                                onchange="checkBookings('booked_from','booked_to')" id="booked_from">
                                            <p class="form-feedback invalid-feedback" data-name="booked_from"></p>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Booked To <span class="text-danger">*</span></label>
                                            <input type="datetime-local" name="booked_to" class="form-control" required
                                                onchange="checkBookings('booked_from','booked_to')" id="booked_to">
                                            <p class="form-feedback invalid-feedback" data-name="booked_to"></p>
                                        </div>
                                    </div>


                                    <div class="row booking-field d-none">
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Customer Name <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="customer_name" class="form-control"
                                                placeholder="Customer Name" required>
                                            <p class="form-feedback invalid-feedback" data-name="customer_name"></p>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Mobile Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="mobile_number" class="form-control"
                                                placeholder="Mobile Number" required>
                                            <p class="form-feedback invalid-feedback" data-name="mobile_number"></p>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                            <p class="form-feedback invalid-feedback" data-name="email"></p>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" placeholder="Address">
                                            <p class="form-feedback invalid-feedback" data-name="address"></p>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">No. Of People <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="number_of_people" class="form-control"
                                                placeholder="No. Of People" required>
                                            <p class="form-feedback invalid-feedback" data-name="number_of_people"></p>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Event</label>
                                            <select name="event" class="form-select search-select">
                                                <option value="">Select Event</option>
                                                <option value="Birthday">Birthday</option>
                                                <option value="Anniversary">Anniversary</option>
                                                <option value="Mother's Day">Mother's Day</option>
                                                <option value="Father's Day">Father's Day</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="event"></p>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Amount <span class="text-danger">*</span></label>
                                            <input type="number" name="amount" class="form-control" required
                                                placeholder="Amount">
                                            <p class="form-feedback invalid-feedback" data-name="amount"></p>
                                        </div>
                                        {{-- <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Available Tables <span class="text-danger">*</span>
                                            </label>
                                            <div class="form-check form-switch ms-3">
                                                <input class="form-check-input all-select-input" type="checkbox"
                                                    id="allselect-input"
                                                    onclick="allSelectToggle('allselect-input','selection-box')">
                                                <label class="form-check-label" for="allselect-input">Select
                                                    all</label>
                                            </div>
                                            <div class="overflow-control border p-2" style="max-height:200px">
                                                 
                                                <div class="list-group selection-box">  
                                                    
                                                </div>
                                            </div>
                                        </div> --}}

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea name="description" style="height:120px" class="form-control" placeholder="Description"></textarea>
                                            <p class="form-feedback invalid-feedback" data-name="description"></p>
                                        </div>

                                        <div class="mt-4 mb-3 d-flex justify-content-center align-items-center">
                                            <div style="width: 200px" id="btn-box-1">
                                                <button class="btn btn-primary" type="submit" name="create"
                                                    style="width:100% ; font-size:15px">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
