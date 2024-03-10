@extends('admin.main')
@push('title')
    <title> Edit User </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Setting</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit User</li>
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
                                <h6 class="pt-2 text-primary">Edit User</h6>
                            </div>
                            <div class="card-body">


                                <form method="POST" enctype="multipart/form-data" id="form1"
                                    onsubmit="uploadData1('form1', '{{ route('admin.updateUsers', $data[0]->id) }}', 'alert-box1', 'btn-box', event)">

                                    @csrf
                                    <div class="row">

                                        <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                            <img src="{{ asset('admin-assets/assets/images/icons/profile.png') }}"
                                                alt="">
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div id="alert-box1"></div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Select Staff <span
                                                    class="text-danger">*</span></label>
                                            <select name="staff" class="form-select" required>
                                                <option value="{{ $data[0]->user_id }}">
                                                    @php
                                                        $staffData = getStaffDetailsUsingUid($data[0]->user_id);
                                                    @endphp
                                                    {{ $staffData[0]->name }}
                                                </option>
                                                @php
                                                    echo getAllStaff();
                                                @endphp
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="staff"></p>
                                        </div>
                                        <div class=" mb-3">
                                            <label class="form-label">2 FA <span class="text-danger">*</span></label>
                                            <select name="two_fa" class="form-select" required>
                                                <option value="{{ $data[0]->two_fa_email }}">
                                                    @if ($data[0]->two_fa_email == 'YES')
                                                        Enabled
                                                    @else
                                                        Disabled
                                                    @endif
                                                </option>
                                                <option value="NO">Disable</option>
                                                <option value="YES">Enable</option>
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="two_fa"></p>
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

    @push('scripts')
        <script>
            $.each($('.form-select'), function() {
                dselect((this), {
                    search: true
                })
            });

            $('.yearpicker').yearpicker()
        </script>
    @endpush
@endsection
