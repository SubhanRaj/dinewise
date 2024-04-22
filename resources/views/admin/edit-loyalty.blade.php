@extends('admin.main')
@push('title')
    <title>Edit Loyalty </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Loyalty</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Loyalty </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 p-0 mt-4">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h6 class="text-primary" style="font-size: 16px">Edit Loyalty</h6>
                            </div>
                            <div class="card-body">

                                <form method="POST" id="loyalty-form"
                                    onsubmit="uploadData1('loyalty-form','{{ route('admin.updateLoyaltySetup', $data->id) }}', 'alert-box', 'btn-box-1', event)"
                                    class="mx-3 p-3" enctype="multipart/form-data">
                                    @csrf
                                    <div id="alert-box"></div>
                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Loyalty % <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control"
                                                value="{{ $data->loyalty_percentage }}" name="loyalty_percentage" required
                                                placeholder="Loyalty %">
                                            <p class="form-feedback invalid-feedback" data-name="loyalty_percentage"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Min Order Amount <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control"  value="{{ $data->min_amount }}" name="min_order_amount" required
                                                placeholder="Min Order Amount">
                                            <p class="form-feedback invalid-feedback" data-name="min_order_amount"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Max Loyalty Points <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" class="form-control"  value="{{ $data->max_points }}" name="max_loyalty_points" required
                                                placeholder="Max Loyalty Points">
                                            <p class="form-feedback invalid-feedback" data-name="max_loyalty_points"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Expiry Days <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control"  value="{{ $data->expiry_days }}" name="expiry_days" required
                                                placeholder="Expiry Days">
                                            <p class="form-feedback invalid-feedback" data-name="expiry_days"></p>
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-center align-items-center mt-3">
                                        <div style="width: 200px" id="btn-box-1">
                                            <button class="btn btn-primary" type="submit" name="create"
                                                style="width:100% ; font-size:15px">Update</button>
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
