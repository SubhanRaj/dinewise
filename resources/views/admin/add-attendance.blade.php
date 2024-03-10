@extends('admin.main')
@push('title')
    <title> Add Attendance </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Attendance</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Attendance</li>
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
                                <h6 class="pt-2 text-primary">Add Attendance</h6>
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                        <img src="{{ asset('admin-assets/assets/images/icons/attendance.png') }}"
                                            alt="">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div id="alert-box1"></div>
                                    </div>

                                    <div class="col-12">
                                        <table
                                            class="w-100 table table-bordered table-striped table-hover shadow table-responsive">
                                            <thead>
                                                <tr>
                                                    <th class="text-center align-middle table-secondary">
                                                        Profile</th>
                                                    <th class="text-center align-middle table-secondary">
                                                        Name
                                                    </th>
                                                    <th class="text-center align-middle table-secondary">
                                                        UID
                                                    </th>
                                                    <th class="text-center align-middle table-secondary">
                                                        Status</th>
                                                    <th class="text-center align-middle table-secondary">
                                                        Login</th>
                                                    <th class="text-center align-middle table-secondary">
                                                        Logout</th>
                                                    <th class="text-center align-middle table-secondary">
                                                        Action</th>
                                                </tr>

                                            </thead>
                                            <tbody class="table-group-divider img-table">


                                                @php
                                                    $staffData = DB::table('staffs')
                                                        ->orderBy('name', 'desc')
                                                        ->get();
                                                @endphp
                                                @foreach ($staffData as $key => $singleStaff)
                                                    @php
                                                        $CheckStaff = DB::table('attendance')
                                                            ->where([['uid', '=', $singleStaff->uid], ['date', '=', date('Y-m-d')]])
                                                            ->get();
                                                        
                                                    @endphp
                                                    @if (count($CheckStaff) == 0)
                                                        {{-- == Attendance Not Taken == --}}
                                                        <tr>
                                                            <td style="width:80px">
                                                                @php
                                                                    $fileArr = json_decode($singleStaff->profile_picture, true);
                                                                    echo getMediaFile($fileArr[0]['file_id']);
                                                                @endphp
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                {{ $singleStaff->name }}</td>
                                                            <td class="align-middle text-center">{{ $singleStaff->uid }}
                                                            </td>
                                                            <td class="align-middle" style="width:230px;">
                                                                <div class="attendanc-status-box"
                                                                    id="attendanc-status-box{{ $key }}">
                                                                    <div>
                                                                        <button type="button"
                                                                            class="btn btn-outline-success rounded-circle attenDanceBtn"
                                                                            onclick="markAttendance('attendanc-status-box{{ $key }}','btnpp{{ $key }}')"
                                                                            id="btnpp{{ $key }}">
                                                                            <label
                                                                                for="PP{{ $key }}">PP</label></button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger rounded-circle attenDanceBtn"
                                                                            onclick="markAttendance('attendanc-status-box{{ $key }}','btnaa{{ $key }}')"
                                                                            id="btnaa{{ $key }}">
                                                                            <label
                                                                                for="AA{{ $key }}">AA</label></button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-warning rounded-circle attenDanceBtn"
                                                                            onclick="markAttendance('attendanc-status-box{{ $key }}','btnwh{{ $key }}')"
                                                                            id="btnwh{{ $key }}">
                                                                            <label
                                                                                for="WH{{ $key }}">WH</label></button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-info rounded-circle attenDanceBtn"
                                                                            onclick="markAttendance('attendanc-status-box{{ $key }}','btnol{{ $key }}')"
                                                                            id="btnol{{ $key }}">
                                                                            <label
                                                                                for="OL{{ $key }}">OL</label></button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle" style="width:50px">
                                                                <input type="time" class="form-control" name="login"
                                                                    onchange="setLogIn(this.value, 'login{{ $key }}')">
                                                            </td>
                                                            <td class="align-middle" style="width:50px">
                                                                <input type="time" class="form-control" name="logout"
                                                                    onchange="setLogOut(this.value, 'logout{{ $key }}')">
                                                            </td>
                                                            <td class="align-middle" style="width:150px">


                                                                <form method="post" enctype="multipart/form-data"
                                                                    id="form{{ $key }}"
                                                                    onsubmit="uploadData1('form{{ $key }}', '{{ route('admin.saveAttendance') }}', 'alert-box1', 'btn-box{{ $key }}', event)">
                                                                    @csrf
                                                                    <input type="hidden" name="uid"
                                                                        value="{{ $singleStaff->uid }}">
                                                                    <div class="attendance-status-input">
                                                                        <input type="radio" name="status" value="PP"
                                                                            id="PP{{ $key }}">
                                                                        <input type="radio" name="status" value="AA"
                                                                            id="AA{{ $key }}">
                                                                        <input type="radio" name="status" value="WH"
                                                                            id="WH{{ $key }}">
                                                                        <input type="radio" name="status" value="OL"
                                                                            id="OL{{ $key }}">
                                                                    </div>
                                                                    <input type="hidden" name="login"
                                                                        id="login{{ $key }}">
                                                                    <input type="hidden" name="logout"
                                                                        id="logout{{ $key }}">
                                                                    <div id="btn-box{{ $key }}"
                                                                        style="width: 150px">
                                                                        <button type="submit"
                                                                            class="btn btn-primary w-100">Save</button>
                                                                    </div>
                                                                </form>

                                                            </td>
                                                        </tr>
                                                    @else
                                                        {{-- === Attendance Taken  --}}

                                                        <tr>
                                                            <td style="width:80px">
                                                                @php
                                                                    $fileArr = json_decode($singleStaff->profile_picture, true);
                                                                    echo getMediaFile($fileArr[0]['file_id']);
                                                                @endphp
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                {{ $singleStaff->name }}</td>
                                                            <td class="align-middle text-center">{{ $singleStaff->uid }}
                                                            </td>
                                                            <td class="align-middle" style="width:230px;">
                                                                <div class="attendanc-status-box "
                                                                    id="attendanc-status-box{{ $key }}">
                                                                    <div>
                                                                        @php
                                                                            $pp = $CheckStaff[0]->status == 'PP' ? 'active' : '';
                                                                            $aa = $CheckStaff[0]->status == 'AA' ? 'active' : '';
                                                                            $wh = $CheckStaff[0]->status == 'WH' ? 'active' : '';
                                                                            $ol = $CheckStaff[0]->status == 'OL' ? 'active' : '';
                                                                        @endphp
                                                                        <button type="button"
                                                                            class="btn btn-outline-success rounded-circle attenDanceBtn {{ $pp }}"
                                                                            onclick="markAttendance('attendanc-status-box{{ $key }}','btnpp{{ $key }}')"
                                                                            id="btnpp{{ $key }}">
                                                                            <label
                                                                                for="PP{{ $key }}">PP</label></button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-danger rounded-circle attenDanceBtn {{ $aa }}"
                                                                            onclick="markAttendance('attendanc-status-box{{ $key }}','btnaa{{ $key }}')"
                                                                            id="btnaa{{ $key }}">
                                                                            <label
                                                                                for="AA{{ $key }}">AA</label></button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-warning rounded-circle attenDanceBtn {{ $wh }}"
                                                                            onclick="markAttendance('attendanc-status-box{{ $key }}' ,'btnwh{{ $key }}')"
                                                                            id="btnwh{{ $key }}">
                                                                            <label
                                                                                for="WH{{ $key }}">WH</label></button>
                                                                        <button type="button"
                                                                            class="btn btn-outline-info rounded-circle attenDanceBtn {{ $ol }}"
                                                                            onclick="markAttendance('attendanc-status-box{{ $key }}','btnol{{ $key }}')"
                                                                            id="btnol{{ $key }}">
                                                                            <label
                                                                                for="OL{{ $key }}">OL</label></button>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle" style="width:50px">
                                                                <input type="time" class="form-control" name="login"
                                                                    onchange="setLogIn(this.value, 'login{{ $key }}')"
                                                                    value="{{ $CheckStaff[0]->login }}">
                                                            </td>
                                                            <td class="align-middle" style="width:50px">
                                                                <input type="time" class="form-control" name="logout"
                                                                    onchange="setLogOut(this.value, 'logout{{ $key }}')"
                                                                    value="{{ $CheckStaff[0]->logout }}">
                                                            </td>
                                                            <td class="align-middle" style="width:150px">

                                                                <form method="post" enctype="multipart/form-data"
                                                                    id="form{{ $key }}"
                                                                    onsubmit="uploadData1('form{{ $key }}', '{{ route('admin.saveAttendance') }}', 'alert-box1', 'btn-box{{ $key }}', event)">
                                                                    @csrf
                                                                    <input type="hidden" name="uid"
                                                                        value="{{ $singleStaff->uid }}">
                                                                    <div class="attendance-status-input">
                                                                        @php
                                                                            $pp = $CheckStaff[0]->status == 'PP' ? 'checked' : '';
                                                                            $aa = $CheckStaff[0]->status == 'AA' ? 'checked' : '';
                                                                            $wh = $CheckStaff[0]->status == 'WH' ? 'checked' : '';
                                                                            $ol = $CheckStaff[0]->status == 'OL' ? 'checked' : '';
                                                                        @endphp
                                                                        <input type="radio" name="status"
                                                                            value="PP" id="PP{{ $key }}"
                                                                            {{ $pp }}>
                                                                        <input type="radio" name="status"
                                                                            value="AA" id="AA{{ $key }}"
                                                                            {{ $aa }}>
                                                                        <input type="radio" name="status"
                                                                            value="WH" id="WH{{ $key }}"
                                                                            {{ $wh }}>
                                                                        <input type="radio" name="status"
                                                                            value="OL" id="OL{{ $key }}"
                                                                            {$ol}>
                                                                    </div>
                                                                    <input type="hidden" name="login"
                                                                        id="login{{ $key }}"
                                                                        value="{{ $CheckStaff[0]->login }}">
                                                                    <input type="hidden" name="logout"
                                                                        id="logout{{ $key }}"
                                                                        value="{{ $CheckStaff[0]->logout }}">
                                                                    <div id="btn-box{{ $key }}"
                                                                        style="width: 150px">
                                                                        <button type="submit"
                                                                            class="btn btn-primary w-100">Save</button>
                                                                    </div>
                                                                </form>

                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
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
