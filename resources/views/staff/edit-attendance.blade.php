@extends('staff.main')
@push('title')
    <title> Edit Attendance </title>
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
                            <nav aria-th="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('staff.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Attendance
                                    </li>
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
                                <h6 class="pt-2 text-primary">Edit Attendance</h6>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                        <img src="{{ asset('admin-assets/assets/images/icons/attendance.png') }}"
                                            alt="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <table class="table table-bordered table-striped">
                                            @php
                                                $staffData = getStaffDetailsUsingUid($data[0]->uid);
                                            @endphp
                                            <tr>

                                                <td class="border p-2">
                                                    @php
                                                        $profile_picture = json_decode($staffData[0]->profile_picture, true);
                                                        $img_url = $profile_picture[0]['url'];
                                                        
                                                    @endphp
                                                    <div class="d-flex justify-content-center align-items-center">
                                                        <img src='{{ $img_url }}' class='table-profile'>
                                                    </div>


                                                </td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">Name </th>
                                                <td class="border p-2">{{ $staffData[0]->name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">UID </th>
                                                <td class="border p-2">{{ $data[0]->uid }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">Year (YYYY) </th>
                                                <td class="border p-2">{{ $data[0]->year }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">Month </th>
                                                <td class="border p-2">{{ $data[0]->month }}</td>
                                            </tr>

                                            <tr>
                                                <th class="ps-3">Date </th>
                                                <td class="border p-2">{{ showDate($data[0]->date) }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="p-3 border">

                                            <form method="POST" enctype="multipart/form-data" id="form1"
                                                onsubmit="uploadData1('form1', '{{ route('staff.updateAttendance', $data[0]->id) }}', 'alert-box1', 'btn-box', event)">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <div id="alert-box1"></div>
                                                    </div>
                                                    <div class="col-12 mb-2">
                                                        <label class="form-label">Status</label>
                                                        @php
                                                            $pp = $data[0]->status == 'PP' ? 'checked' : '';
                                                            $aa = $data[0]->status == 'AA' ? 'checked' : '';
                                                            $wh = $data[0]->status == 'WH' ? 'checked' : '';
                                                            $ol = $data[0]->status == 'OL' ? 'checked' : '';
                                                            
                                                        @endphp
                                                        <div
                                                            class="d-flex justify-content-evenly align-items-center border p-2">
                                                            <label for="pp">
                                                                <input type="radio" value="PP" name="status"
                                                                    id="pp" {{ $pp }} class="atten-radio">
                                                                <span title="Present">PP</span>
                                                            </label>
                                                            <label for="aa">
                                                                <input type="radio" value="AA" name="status"
                                                                    id="aa" {{ $aa }} class="atten-radio">
                                                                <span title="Absent">AA</span>
                                                            </label>
                                                            <label for="wh">
                                                                <input type="radio" value="WH" name="status"
                                                                    id="wh" {{ $wh }} class="atten-radio">
                                                                <span title="Work From Home">WH</span>
                                                            </label>
                                                            <label for="ol">
                                                                <input type="radio" value="OL" name="status"
                                                                    id="ol" {{ $ol }} class="atten-radio">
                                                                <span title="On Leave">OL</span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                    @if ($data[0]->status == 'PP' || $data[0]->status == 'WH')
                                                        @php
                                                            $disable = '';
                                                        @endphp
                                                    @else
                                                        @php
                                                            $disable = 'disabled';
                                                        @endphp
                                                    @endif
                                                    <div class="col-lg-6 mb-2">
                                                        <label class="form-label">Login</label>
                                                        <input type="time" name="login"
                                                            class="form-control login-logout" value="{{ $data[0]->login }}"
                                                            {{ $disable }}>
                                                    </div>
                                                    <div class="col-lg-6 mb-2">
                                                        <label class="form-label">Logout</label>
                                                        <input type="time" name="logout"
                                                            class="form-control login-logout"
                                                            value="{{ $data[0]->logout }}" {{ $disable }}>
                                                    </div>

                                                    <div
                                                        class="col-12 mb-3 d-flex justify-content-center align-items-center pt-4">
                                                        <div id="btn-box" style="width: 200px">
                                                            <button type="submit"
                                                                class="btn btn-primary w-100">Submit</button>
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
