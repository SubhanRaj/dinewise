@extends('staff.main')
@push('title')
    <title> Dashboard </title>
@endpush
@section('main-section')
    @php
        $loginData = loginData(session()->get('abcdefgh'));
        $session_user_id = $loginData['user_id'];
    @endphp
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-12 mb-2">
                        <h6>Today's Attendance</h6>
                    </div>
                    @php
                        $attendance = DB::table('attendance')
                            ->where([['uid', '=', $session_user_id], ['date', '=', date('Y-m-d')]])
                            ->get();
                    @endphp

                    @if (count($attendance) != 0)
                        @if ($attendance[0]->status == 'PP')
                            <div class="col-lg-4 col-md-6">
                                <div class="card radius-10 border-start border-0 border-3 border-success">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Status</p>
                                                <h5 class="my-1 text-success">Present</h5>
                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                                <i class="bx bx-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($attendance[0]->status == 'AA')
                            <div class="col-lg-4 col-md-6">
                                <div class="card radius-10 border-start border-0 border-3 border-danger">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Status</p>
                                                <h5 class="my-1 text-danger">
                                                    Absent
                                                </h5>

                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle  bg-gradient-bloody text-white ms-auto">
                                                <i class="bx bx-user-x"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($attendance[0]->status == 'WH')
                            <div class="col-lg-4 col-md-6">
                                <div class="card radius-10 border-start border-0 border-3 border-warning">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Status</p>
                                                <h5 class="my-1 text-warning">
                                                    Work From Home
                                                </h5>

                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle  bg-gradient-blooker text-white ms-auto">
                                                <i class="bx bx-check"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif ($attendance[0]->status == 'OL')
                            <div class="col-lg-4 col-md-6">
                                <div class="card radius-10 border-start border-0 border-3 border-info">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div>
                                                <p class="mb-0 text-secondary">Status</p>
                                                <h5 class="my-1 text-info">
                                                    On Leave
                                                </h5>

                                            </div>
                                            <div
                                                class="widgets-icons-2 rounded-circle  bg-gradient-scooter text-white ms-auto">
                                                <i class="bx bx-user-minus"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-lg-4 col-md-6">
                            <div class="card radius-10 border-start border-0 border-3 border-danger">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Status</p>
                                            <h5 class="my-1 text-danger">
                                                Not Taken
                                            </h5>

                                        </div>
                                        <div class="widgets-icons-2 rounded-circle  bg-gradient-bloody text-white ms-auto">
                                            <i class="bx bx-user-x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card radius-10 border-start border-0 border-3 border-info">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Log In</p>
                                            <h5 class="my-1 text-info">
                                                00:00
                                            </h5>

                                        </div>
                                        <div class="widgets-icons-2 rounded-circle  bg-gradient-scooter text-white ms-auto">
                                            <i class="bx bx-log-in"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card radius-10 border-start border-0 border-3 border-primary">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Log Out</p>
                                            <h5 class="my-1 text-primary">
                                                00:00
                                            </h5>

                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-gradient-cosmic text-white ms-auto">
                                            <i class="bx bx-log-in"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if (count($attendance) != 0 && ($attendance[0]->status == 'PP' || $attendance[0]->status == 'WH'))
                        <div class="col-lg-4 col-md-6">
                            <div class="card radius-10 border-start border-0 border-3 border-info">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Log In</p>
                                            <h5 class="my-1 text-info">
                                                {{ showTime($attendance[0]->login) }}
                                            </h5>

                                        </div>
                                        <div class="widgets-icons-2 rounded-circle  bg-gradient-scooter text-white ms-auto">
                                            <i class="bx bx-log-in"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card radius-10 border-start border-0 border-3 border-primary">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <p class="mb-0 text-secondary">Log Out</p>
                                            <h5 class="my-1 text-primary">
                                                {{ $attendance[0]->logout != null ? showTime($attendance[0]->logout) : '00:00' }}
                                            </h5>

                                        </div>
                                        <div class="widgets-icons-2 rounded-circle bg-gradient-cosmic text-white ms-auto">
                                            <i class="bx bx-log-in"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif


                </div>
                <div class="row">
                    <div class="col-12 col-lg-7 mb-2 ">
                        <div class="card">
                            <div class="card-header">
                                <h6>This Month's Attendance</h6>

                                <div class="d-flex align-items-center ms-auto font-13 gap-2 flex-wrap">
                                    <span class="border px-1 rounded"><i class="bx bxs-circle me-1"
                                            style="color: #15ca20"></i>Present</span>
                                    <span class="border px-1 rounded"><i class="bx bxs-circle me-1"
                                            style="color: #ef1414"></i>Absent</span>
                                    <span class="border px-1 rounded"><i class="bx bxs-circle me-1"
                                            style="color: #ffc107"></i>Work From Home</span>
                                    <span class="border px-1 rounded"><i class="bx bxs-circle me-1"
                                            style="color: #0777ff"></i>On Leave</span>
                                    <span class="border px-1 rounded"><i class="bx bxs-circle me-1"
                                            style="color: #00d5e1"></i>Not Taken</span>
                                    <span class="border px-1 rounded"><i class="bx bxs-circle me-1"
                                            style="color: #d04c00"></i>Late</span>
                                    <span class="border px-1 rounded"><i class="bx bxs-circle me-1"
                                            style="color: #a200bb"></i>Early</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <div style="height:300px" class="overflow-control">

                                    <div class="">
                                        <table class="table table-borderless" style="min-width:400px">
                                            <thead class="position-sticky top-0">
                                                <tr class="bg-warning">
                                                    <th class="text-center text-dark text-nowrap">Date</th>
                                                    <th class="text-center text-dark text-nowrap">Status</th>
                                                    <th class="text-center text-dark text-nowrap">Log In</th>
                                                    <th class="text-center text-dark text-nowrap">Log Out</th>
                                                </tr>
                                            </thead>

                                            @php
                                                $getAttendanceData = DB::table('attendance')
                                                    ->where([['month', '=', date('F')], ['year', '=', date('Y')], ['uid', '=', $session_user_id]])
                                                    ->orderBy('date', 'desc')
                                                    ->get();
                                            @endphp


                                            @foreach ($getAttendanceData as $single_atten)
                                                <tr>

                                                    <td class="align-middle text-center">
                                                        {{ showDate($single_atten->date) }}
                                                    </td>

                                                    @if ($single_atten->status == 'PP')
                                                        <td class="align-middle text-center"><span
                                                                class="badge text-bg-success p-2 font-13">PP</span>
                                                        </td>
                                                    @elseif ($single_atten->status == 'AA')
                                                        <td class="align-middle text-center"><span
                                                                class="badge text-bg-danger p-2 font-13">AA</span></td>
                                                    @elseif ($single_atten->status == 'OL')
                                                        <td class="align-middle text-center"><span
                                                                class="badge text-bg-primary p-2 font-13">OL</span>
                                                        </td>
                                                    @elseif ($single_atten->status == 'WH')
                                                        <td class="align-middle text-center"><span
                                                                class="badge text-bg-warning p-2 font-13">WH</span>
                                                        </td>
                                                    @endif

                                                    {{-- get attendance rule  --}}
                                                    @php
                                                        $attendanceRule = getActiveAttendanceRule($single_atten->attendance_rule);
                                                        
                                                    @endphp

                                                    <td class="align-middle text-center">
                                                        @if ($single_atten->login != '')
                                                            @if (strtotime($single_atten->login) >= strtotime($attendanceRule[0]->start))
                                                                <span
                                                                    class="late">{{ showTime($single_atten->login) }}</span>
                                                            @else
                                                                {{ showTime($single_atten->login) }}
                                                            @endif
                                                        @else
                                                            00:00
                                                        @endif

                                                    </td>
                                                    <td class="align-middle text-center">
                                                        @if ($single_atten->logout != '')
                                                            @if (strtotime($single_atten->logout) < strtotime($attendanceRule[0]->end))
                                                                <span
                                                                    class="early">{{ showTime($single_atten->logout) }}</span>
                                                            @else
                                                                {{ showTime($single_atten->logout) }}
                                                            @endif
                                                        @else
                                                            00:00
                                                        @endif
                                                    </td>

                                                </tr>
                                            @endforeach

                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-lg-5 mb-2">
                        <div class="card">
                            <div class="card-header">
                                <h6>This Month's Leaves</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless" style="min-width:400px">
                                    <thead class="position-sticky top-0">
                                        <tr class="bg-warning">
                                            <th class="text-center text-dark text-nowrap">From</th>
                                            <th class="text-center text-dark text-nowrap">To</th>
                                            <th class="text-center text-dark text-nowrap">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $month = date('F');
                                            $Leave = DB::table('leaves')
                                                ->where('month', '=', $month)
                                                ->get();
                                        @endphp
                                        @if (!is_null($Leave))
                                            @foreach ($Leave as $single_leave)
                                                <tr>
                                                    <td class="text-center">{{ showDate($single_leave->l_from) }}</td>
                                                    <td class="text-center">{{ showDate($single_leave->l_to) }}</td>
                                                    <td class="text-center">{{ $single_leave->status }}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
