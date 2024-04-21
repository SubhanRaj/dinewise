@extends('admin.main')
@push('title')
    <title>Add Product</title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Products</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Products</li>
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
                                <h6 class="text-primary" style="font-size: 16px">Add Products</h6>
                            </div>
                            <div class="card-body">

                                <form method="POST" id="product-form"
                                    onsubmit="uploadData1('product-form','{{ route('admin.saveProducts') }}', 'alert-box', 'btn-box-1', event)"
                                    class="mx-3 p-3" enctype="multipart/form-data">
                                    @csrf
                                    <div id="alert-box"></div>
                                    <div class="row">
                                        <p><span class="text-danger">Note : </span> all fields are mendatory. </p>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Product Category</label>
                                            <select name="product_category" required class="form-select search-select">
                                                <option value="">Select</option>
                                                @php
                                                    echo getCategory();
                                                @endphp
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="product_category"></p>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Product Id <span class="text-info"
                                                    data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Use unique product id for every products. Max : 20"> <i
                                                        class="fa-light fa-circle-info"></i></span></label>
                                            <input type="text" name="product_id" class="form-control"
                                                placeholder="Product Id" required value="{{ uid_generator() }}">
                                            <p class="form-feedback invalid-feedback" data-name="product_id"></p>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Product Name</label>
                                            <input type="text" name="product_name" class="form-control"
                                                placeholder="Product Name" required>
                                            <p class="form-feedback invalid-feedback" data-name="product_name"></p>
                                        </div>
                                        <div class="col-lg-6 col-12 mb-3">
                                            <label class="form-label">Product Stock</label>
                                            <input type="text" name="product_stock" class="form-control"
                                                placeholder="Product Stock" required>
                                            <p class="form-feedback invalid-feedback" data-name="product_stock"></p>
                                        </div>
                                        <div class="col-12 mb-3" id="product-pricing-box">
                                            <label class="form-label">Product Pricing
                                                <button type="button" class="btn btn-warning ms-3" data-bs-toggle='tooltip'
                                                    data-bs-title='Add More' data-bs-placement='auto'
                                                    onclick="addProductPricing('product-pricing-box')">
                                                    <i class="fa-regular fa-plus"></i>
                                                </button>
                                            </label>
                                            <div class="row mb-3 position-relative">
                                                <div class="col-6">
                                                    <label class="form-label">Unit </label>
                                                    <select name="pricing_unit[]" required class="form-select">
                                                        <option value="">Select Unit</option>
                                                        @php
                                                            echo getUnit();
                                                        @endphp
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label">Price </label>
                                                    <input type="number" class="form-control" required name="price[]"
                                                        placeholder="Price">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Product Pictures</label>
                                            <div class="border border-dashed p-3">
                                                <div class="selected-media-box" id="selected-media-box">
                                                    <input type="hidden" id="final-selected-media-input"
                                                        name="product_picture" value="">

                                                    <p class="form-feedback invalid-feedback" data-name="product_picture">
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-center align-items-center mt-2">
                                                    <a style="background-color: transparent" href="javascript:;"
                                                        data-bs-toggle="modal" data-bs-target="#media-modal-one"
                                                        onclick="setMediaSelection('final-selected-media-input','selected-media-box',false)">
                                                        <img
                                                            src="{{ asset('admin-assets/assets/images/icons/attachment.png') }}">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4 mb-3 d-flex justify-content-center align-items-center">
                                        <div style="width: 200px" id="btn-box-1">
                                            <button class="btn btn-primary" type="submit" name="create"
                                                style="width:100% ; font-size:15px">Add</button>
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
