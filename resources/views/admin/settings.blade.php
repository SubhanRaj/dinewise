@extends('admin.main')
@push('title')
    <title>Settings </title>
@endpush
@section('main-section')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Settings</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Settings </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 p-0 mt-4">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h6 class="text-primary" style="font-size: 16px">Settings</h6>
                            </div>
                            <div class="card-body">


                                <form method="POST" id="loyalty-form"
                                    onsubmit="uploadData1('loyalty-form','{{ route('admin.saveSettings') }}', 'alert-box', 'btn-box-1', event)"
                                    class="mx-3 p-3" enctype="multipart/form-data">
                                    @csrf
                                    <div id="alert-box"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            @if (count($data) > 0)
                                                <table class="table table-borderless">
                                                    @foreach ($data as $single_data)
                                                        <tr>
                                                            <td class="text-capitalize">
                                                                {{ str_replace('_', ' ', $single_data->name) }}</td>
                                                            <td>
                                                                <input type="text" placeholder="Company Name"
                                                                    value="{{ $single_data->value }}" class="form-control"
                                                                    name="{{ $single_data->name }}">
                                                            </td>
                                                        </tr>
                                                    @endforeach

                                                </table>
                                            @else
                                                <table class="table table-borderless">

                                                    <tr>
                                                        <td>Company Name</td>
                                                        <td>
                                                            <input type="text" placeholder="Company Name"
                                                                class="form-control" name="company_name">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Loyalty Point Value</td>
                                                        <td>
                                                            <input type="text" class="form-control"
                                                                name="loyalty_point_value"
                                                                placeholder="Loyalty Point Value">
                                                                
                                                        </td>
                                                    </tr>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="mb-3 d-flex justify-content-center align-items-center">
                                        <div style="width: 200px" id="btn-box-1">
                                            <button class="btn btn-primary" type="submit"
                                                style="width:100% ; font-size:15px">Save</button>
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
