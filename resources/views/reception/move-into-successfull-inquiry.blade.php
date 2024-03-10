@extends('reception.main')
@push('title')
    <title> Move & Edit Successfully Inquiry </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">

            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Inquiry</div>
                        <div class="ps-3">
                            <nav aria-th="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href=" "><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Move & Edit Successfully Inquiry
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
                                <h6 class="pt-2 text-primary">Move & Edit Successfully Inquiry</h6>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-center align-items-center mb-3">
                                        <img src="{{ asset('admin-assets/assets/images/icons/clipboard.png') }}"
                                            alt="">
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <table class="table table-bordered table-striped">
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
                                                <td class="border p-2">{{ $data[0]->date }}</td>
                                            </tr>

                                            <tr>
                                                <th class="ps-3">Source </th>
                                                <td class="border p-2">{{ $data[0]->source }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">Client Name </th>
                                                <td class="border p-2">{{ $data[0]->client_name }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">Requirement </th>
                                                <td class="border p-2">{{ $data[0]->req }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">Email </th>
                                                <td class="border p-2">{{ $data[0]->email }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">Phone Number</th>
                                                <td> {{ $data[0]->phone }}</td>
                                            <tr>
                                                <th class="ps-3">Whatsapp Number </th>
                                                <td class="border p-2">{{ $data[0]->whatsapp }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">Address</th>
                                                <td class="border p-2">{{ $data[0]->address }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">Business </th>
                                                <td class="border p-2">{{ $data[0]->business }}</td>
                                            </tr>
                                            <tr>
                                                <th class="ps-3">Website Url</th>
                                                <td class="border p-2">{{ $data[0]->website }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="p-3 border">
                                            <form method="POST" enctype="multipart/form-data" id="form1"
                                                onsubmit="uploadData1('form1', '{{ route('reception.saveSuccessfullInquiry', $data[0]->id) }}', 'alert-box1', 'btn-box', event)">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 mb-2">
                                                        <div id="alert-box1"></div>
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                        <label class="form-label">Services</label>
                                                        <textarea name="services" class="form-control" required rows="5">{{ $data[0]->service_taken }}</textarea>
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
