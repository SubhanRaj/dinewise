@extends('staff.main')
@push('title')
    <title> Edit worksheet </title>
@endpush
@section('main-section')
@php
    $loginData = loginData(session()->get('abcdefgh'));
    $session_user_id = $loginData['user_id'];
@endphp
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Work</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('staff.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit worksheet</li>
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
                                <h6 class="pt-2 text-primary">Edit worksheet</h6>
                            </div>
                            <div class="card-body">


                                <form method="POST" enctype="multipart/form-data" id="form1"
                                    onsubmit="uploadData1('form1', '{{ route('staff.updateWorksheet', $data[0]->id) }}', 'alert-box1', 'btn-box', event)">

                                    @csrf

                                    <div class="row">

                                        <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                            <img src="{{ asset('admin-assets/assets/images/icons/working.png') }}"
                                                alt="">
                                        </div>
                                        <div class="col-12 mb-2">
                                            <div id="alert-box1"></div>
                                        </div>
                                        <input type="hidden" name="uid" value="{{ $session_user_id }}">
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Year (YYYY) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control yearpicker" name="year" required
                                                placeholder="YYYY" readonly>
                                            <p class="form-feedback invalid-feedback" data-name="year"></p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Month <span class="text-danger">*</span></label>
                                            <select name="month" class="form-select">
                                                <option value="{{ $data[0]->month }}">{{ $data[0]->month }}</option>
                                                @php
                                                    echo showMonth();
                                                @endphp
                                            </select>
                                            <p class="form-feedback invalid-feedback" data-name="month"></p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Date <span class="text-danger">*</span> <span
                                                    style="font-size: 12px" class="text-warning">( Note :
                                                    Date should be unique )</span></label>
                                            <input type="date" class="form-control" name="date" required
                                                placeholder="Date" value="{{ $data[0]->date }}">
                                            <p class="form-feedback invalid-feedback" data-name="date"></p>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Work Description <span
                                                    class="text-danger">*</span></label>
                                            <textarea name="description" rows="5" class="form-control" required placeholder="Work Description">{{ $data[0]->description }}</textarea>
                                            <p class="form-feedback invalid-feedback" data-name="description"></p>
                                        </div>
                                        <div class="col-12 mb-3 d-flex justify-content-center align-items-center pt-4">
                                            <div id="btn-box" style="width: 200px">
                                                <button type="submit" class="btn btn-primary w-100">Save</button>
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

            $('.yearpicker').yearpicker({
                year: {{ $data[0]->year }}
            })
        </script>
    @endpush
@endsection
