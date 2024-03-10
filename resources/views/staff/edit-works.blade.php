@extends('staff.main')
@push('title')
    <title> Edit Assign Work </title>
@endpush
@section('main-section')
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
                                    <li class="breadcrumb-item active" aria-current="page">Edit Work</li>
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
                                <h6 class="pt-2 text-primary">Edit Work</h6>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-striped table-bordered">
                                            <tr>
                                                <th>Work Title</th>
                                                <td>{{ $data[0]->title }}</td>
                                            </tr>
                                            <tr>
                                                <th>Work Description</th>
                                                <td>
                                                    <p style="max-width:300px"> {{ $data[0]->description }} </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Starting Date</th>
                                                <td>{{ showDate($data[0]->starting_date) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Deadline</th>
                                                <td>{{ showDateTime($data[0]->deadline) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td>{{ $data[0]->status }}</td>
                                            </tr>
                                            <tr>
                                                <th>Year</th>
                                                <td>{{ $data[0]->year }}</td>
                                            </tr>
                                            <tr>
                                                <th>Month</th>
                                                <td>{{ $data[0]->month }}</td>
                                            </tr>
                                            <tr>
                                                <th>Date</th>
                                                <td>{{ showDate($data[0]->date) }}</td>
                                            </tr>

                                        </table>
                                    </div>

                                    <div class="col-12">
                                        <form method="post" id="form1" enctype="multipart/form-data"
                                            onsubmit="uploadData1('form1', '{{ route('staff.updateWorks', $data[0]->id) }}', 'alert-box1', 'btn-box', event)">
                                            @csrf
                                            <div class="row">
                                                <div class="col-12 mb-3">
                                                    <label class="form-label">Status <span
                                                            class="text-danger">*</span></label>
                                                    <select name="status" class="form-select">
                                                        <option value="{{ $data[0]->status }}">{{ $data[0]->status }}
                                                        </option>
                                                        <option value="Not Started">Not Started</option>
                                                        <option value="Running">Running</option>
                                                        <option value="Completed">Completed</option>
                                                        <option value="Delayed">Delayed</option>

                                                    </select>
                                                    <p class="form-feedback invalid-feedback" data-name="month"></p>
                                                </div>
                                                <div class="col-12">
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
