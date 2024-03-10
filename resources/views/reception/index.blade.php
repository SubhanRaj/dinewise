@extends('reception.main')
@push('title')
    <title> Dashboard </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('reception.showInquiry') }}">
                            <div class="card radius-10 border-start border-0 border-4 border-info">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-0 text-secondary">Total Inquiry </h6>
                                            <h4 class="my-1">
                                                @php
                                                    $totalInquiry = DB::table('inquiry')->count();
                                                @endphp
                                                {{ IND_num_format($totalInquiry) }}

                                            </h4>
                                        </div>
                                        <div class="text-info ms-auto font-35"><i class="fa-solid fa-comment-question"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <a href="{{ route('reception.showReceptionIndex') }}">
                            <div class="card radius-10 border-start border-0 border-4 border-primary">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div>
                                            <h6 class="mb-0 text-secondary">Total Logs </h6>
                                            <h4 class="my-1">
                                                @php
                                                    $totalReception = DB::table('reception')->count();
                                                @endphp
                                                {{ IND_num_format($totalReception) }}

                                            </h4>
                                        </div>
                                        <div class="text-primary ms-auto font-35"><i class="fa-duotone fa-users"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card radius-10 bg-gradient-blues">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="my-1 dashboard-dark-heading">Add Log</h5>
                                    </div>
                                    <div class="widgets-icons bg-light-primary text-white ms-auto">
                                        <a href="{{ route('reception.addReceptionIndex') }}"><i
                                                class="fa-solid fa-plus text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="card radius-10 bg-gradient-blooker">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div>
                                        <h5 class="my-1 dashboard-dark-heading">New Inquiry</h5>
                                    </div>
                                    <div class="widgets-icons bg-light-primary text-white ms-auto">
                                        <a href="{{ route('reception.addInquiryIndex') }}"><i
                                                class="fa-solid fa-plus text-white"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h6 class="text-dark"> This Month's Inquiry </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="overflow-control" style="height:320px">
                                    <table class="table w-100 table-borderless table-hover p-0">
                                        <thead class="position-sticky top-0 table-secondary">
                                            <tr>
                                                <th class="text-center text-nowrap">Name</th>
                                                <th class="text-center text-nowrap">Requirement</th>
                                                <th class="text-center text-nowrap">Email</th>
                                                <th class="text-center text-nowrap">Phone</th>
                                                <th class="text-center text-nowrap">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $month = date('F');
                                                $year = date('Y');
                                                $getInquiry = DB::table('inquiry')
                                                    ->where([['year', '=', $year], ['month', '=', $month]])
                                                    ->get();
                                            @endphp
                                            @if (count($getInquiry) != 0)
                                                @foreach ($getInquiry as $single_inquiry)
                                                    <tr>
                                                        <td class="text-center">{{ $single_inquiry->client_name }} </td>
                                                        <td class="text-center">{{ $single_inquiry->req }} </td>
                                                        <td class="text-center">{{ $single_inquiry->email }} </td>
                                                        <td class="text-center">{{ $single_inquiry->phone }} </td>
                                                        <td class="text-center">{{ showDate($single_inquiry->date) }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <h6 class="text-dark"> This Month's Visitor Log </h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="overflow-control" style="height:320px">
                                    <table class="table w-100 table-borderless table-hover p-0">
                                        <thead class="position-sticky top-0 table-secondary">
                                            <tr>
                                                <th class="text-center text-nowrap">Name</th>
                                                <th class="text-center text-nowrap">Purpose</th>
                                                <th class="text-center text-nowrap">Phone</th>
                                                <th class="text-center text-nowrap">Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $month = date('F');
                                                $year = date('Y');
                                                $getreception = DB::table('reception')
                                                    ->where([['year', '=', $year], ['month', '=', $month]])
                                                    ->get();
                                            @endphp
                                            @if (count($getreception) != 0)
                                                @foreach ($getreception as $single_reception)
                                                    <tr>
                                                        <td class="text-center">{{ $single_reception->name }} </td>
                                                        <td class="text-center">{{ $single_reception->purpose }} </td>
                                                        <td class="text-center">{{ $single_reception->phone }} </td>
                                                        <td class="text-center">{{ showDate($single_reception->date) }}</td>
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
    </div>
@endsection
