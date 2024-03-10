@extends('admin.main')
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">All Media</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Media</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



{{-- <div class="col-12 mb-3">
    <label class="form-label">Profile Picture</label>
    <div class="border border-dashed p-3">
        <div class="selected-media-box" id="selected-media-box">
            <input type="hidden" id="final-selected-media-input" value="">
        </div>
        <div class="d-flex justify-content-center align-items-center mt-2">
            <a style="background-color: transparent" href="javascript:;" data-bs-toggle="modal"
                data-bs-target="#media-modal-one"
                onclick="setMediaSelection('final-selected-media-input','selected-media-box',true)">
                <img src="{{ asset('admin-assets/assets/images/icons/attachment.png') }}">
            </a>
        </div>
    </div>

</div> --}}
