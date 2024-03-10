@extends('admin.main')
@push('title')
    <title>Edit Material</title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Inventory</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Material</li>
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
                                <h6 class="text-primary" style="font-size: 16px">Edit Material</h6>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="material-form"
                                    onsubmit="uploadData1('material-form','{{ route('admin.updateMaterial', $data->id) }}', 'alert-box', 'btn-box-1', event)"
                                    class="mx-3 p-3" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div id="alert-box"></div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Material </label>
                                            <input type="text" class="form-control" name="material_name" required
                                                placeholder="Material" value="{{ $data->material }}">
                                            <p class="form-feedback invalid-feedback" data-name="material_name"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Quantity </label>
                                            <input type="text" class="form-control" name="quantity" required
                                                placeholder="Quantity" value="{{ $data->qty }}">
                                            <p class="form-feedback invalid-feedback" data-name="quantity"></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Status </label>
                                            <div>
                                                <label for="instock" class="form-label mx-3">
                                                    <input type="radio" class="form-input-check" name="status"
                                                        value="instock" required id="instock" checked>
                                                    Instock
                                                </label>
                                                <label for="out_of_stock" class="form-label mx-3">
                                                    <input type="radio" id="out_of_stock" class="form-input-check"
                                                        name="status" value="out of stock" required>
                                                    Out Of Stock
                                                </label>
                                            </div>

                                            <p class="form-feedback invalid-feedback" data-name="status"></p>
                                        </div>
                                    </div>


                                    <div class="mb-3 d-flex justify-content-center align-items-center">
                                        <div style="width: 200px" id="btn-box-1">
                                            <button class="btn btn-primary" type="submit" name="create"
                                                style="width:100% ; font-size:15px">Save</button>
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
