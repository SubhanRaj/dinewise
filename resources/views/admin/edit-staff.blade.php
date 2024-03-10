@extends('admin.main')
@push('title')
    <title>Edit Staff Details </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Staff</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Staff Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="pt-2 text-primary">Edi Staff Details</h6>
                            </div>
                            <div class="card-body">


                                <form method="POST" enctype="multipart/form-data" id="form1"
                                    onsubmit="uploadData1('form1', '{{ route('admin.updateStaffIndex', $data[0]->id) }}', 'alert-box1', 'btn-box', event)">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <div id="alert-box1"></div>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Staff UID <span class="text-danger">*</span></label>
                                            <input type="text" name="uid" required placeholder="Staff UID"
                                                class="form-control" value="{{ $data[0]->uid }}">
                                            <p class="form-feedback invalid-feedback" data-name="uid"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" required placeholder="Full Name"
                                                class="form-control" value="{{ $data[0]->name }}">
                                            <p class="form-feedback invalid-feedback" data-name="name"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Email <span class="text-danger">*</span></label>
                                            <input type="email" name="email" required placeholder="Email"
                                                class="form-control" value="{{ $data[0]->email }}">
                                            <p class="form-feedback invalid-feedback" data-name="email"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Phone Number <span
                                                    class="text-danger">*</span></label>
                                            <input type="number" name="phone_number" required placeholder="Phone Number"
                                                class="form-control" value="{{ $data[0]->phone }}">
                                            <p class="form-feedback invalid-feedback" data-name="phone_number"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Work Experience <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="experience" required placeholder="Work Experience"
                                                class="form-control" value="{{ $data[0]->work_ex }}">
                                            <p class="form-feedback invalid-feedback" data-name="experience"></p>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Designation <span class="text-danger">*</span></label>
                                            <input type="text" name="designation" required placeholder="Designation"
                                                class="form-control" value="{{ $data[0]->designation }}">
                                            <p class="form-feedback invalid-feedback" data-name="designation"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Date Of Joining <span
                                                    class="text-danger">*</span></label>
                                            <input type="date" name="date_of_joining" required placeholder="Designation"
                                                class="form-control" value="{{ $data[0]->doj }}">
                                            <p class="form-feedback invalid-feedback" data-name="date_of_joining"></p>
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Address <span class="text-danger">*</span></label>
                                            <input type="text" name="address" required placeholder="Address"
                                                class="form-control" value="{{ $data[0]->address }}">
                                            <p class="form-feedback invalid-feedback" data-name="address"></p>
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Profile Picture <span
                                                    class="text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-lg-6 mb-3 edit-documents-box">
                                                    @php
                                                        $profile_pic = json_decode($data[0]->profile_picture, true);
                                                        echo getMediaFile($profile_pic[0]['file_id']);
                                                    @endphp

                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="border border-dashed p-3">
                                                        <div class="selected-media-box" id="selected-media-box">
                                                            <input type="hidden" name="profile_picture"
                                                                id="final-selected-media-input" value="">
                                                            <p class="form-feedback invalid-feedback"
                                                                data-name="profile_picture">
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
                                        </div>

                                        <div class="col-12 mb-3">
                                            <label class="form-label">Documents <span class="text-danger">*</span></label>
                                            <div class="row">
                                                <div class="col-lg-6 mb-3 edit-documents-box">
                                                    @php
                                                        $documents = json_decode($data[0]->documents, true);
                                                    @endphp
                                                    @foreach ($documents as $single_documents)
                                                        @php
                                                            echo getMediaFile($single_documents['file_id']);
                                                        @endphp
                                                    @endforeach
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="border border-dashed p-3">
                                                        <div class="selected-media-box" id="selected-media-box2">
                                                            <input type="hidden" name="documents"
                                                                id="final-selected-media-input2" value="">
                                                            <p class="form-feedback invalid-feedback"
                                                                data-name="documents">
                                                            </p>
                                                        </div>
                                                        <div class="d-flex justify-content-center align-items-center mt-2">

                                                            <a style="background-color: transparent" href="javascript:;"
                                                                data-bs-toggle="modal" data-bs-target="#media-modal-one"
                                                                onclick="setMediaSelection('final-selected-media-input2','selected-media-box2',true)">
                                                                <img
                                                                    src="{{ asset('admin-assets/assets/images/icons/attachment.png') }}">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="col-12 mb-3 d-flex justify-content-center align-items-center pt-4">
                                            <div id="btn-box" style="width: 200px">
                                                <button type="submit" class="btn btn-primary w-100">Submit</button>
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
