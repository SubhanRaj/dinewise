@extends('admin.main')
@push('title')
    <title>Tables </title>
@endpush
@section('main-section')
    <div class="page-wrapper">
        <div class="page-content">
            <div class="card p-0">
                <div class="card-body p-0">
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center border px-3 pt-2 pb-2 bg-light ">
                        <div class="breadcrumb-title pe-3">Table</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.indexView') }}"><i
                                                class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Tables Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">

                <div class="row">
                    <div class="col-12">
                        <div class="dash-table-block-box">
                            @php
                                $Tables = getAllTable();
                                
                            @endphp

                            @foreach ($Tables as $single_table_block)
                                @if ($single_table_block['status'] == 'unavailable')
                                    <div class="table-block shadow bg-gradient-bloody cursor-pointer position-relative">
                                        <span>{{ $single_table_block['table_no'] }} </span>

                                        {{-- cooking status dropdown  --}}

                                        <div class='dropdown action-dropdown position-absolute' style="top: 5px;right:10px">
                                            <a href="javascript:;" class='dropdown-toggle p-0' data-bs-toggle='dropdown'>
                                                <span class='fas fa-ellipsis-h fs--1 text-dark'></span>
                                            </a>
                                            <div class='dropdown-menu border py-2'>
                                                <a class='dropdown-item'
                                                    href='{{ route('admin.orderDetails', $single_table_block['order_id']) }}'><i
                                                        class='fas fa-eye text-primary'></i> View</a>
                                                <a class='dropdown-item' href='javascript:;'
                                                    onclick="editOrder('{{ $single_table_block['order_id'] }}','{{ route('admin.addOrder') }}')"><i
                                                        class='fas fa-edit text-primary'></i> Edit</a>
                                                <p class='dropdown-item my-0' href='javascript:;'> Order Id :
                                                    {{ $single_table_block['order_id'] }}
                                                </p>
                                                @php
                                                    $orderChefStatus = DB::table('orders_details')
                                                        ->where('order_id', '=', $single_table_block['order_id'])
                                                        ->first();
                                                @endphp

                                                <p class='dropdown-item my-0' href='javascript:;'> Coocking Status :
                                                    @if ($orderChefStatus->chef_status == 'PREPARED')
                                                        <strong class="badge text-bg-success p-2 font-13">
                                                            PREPARED</strong>
                                                    @elseif ($orderChefStatus->chef_status == 'RECEIVED')
                                                        <strong class="badge text-bg-primary p-2 font-13">RECEIVED</strong>
                                                    @elseif ($orderChefStatus->chef_status == 'PREPARING')
                                                        <strong class="badge text-bg-info p-2 font-13">PREPARING</strong>
                                                    @endif

                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="table-block shadow bg-gradient-lush cursor-pointer"
                                        onclick="selectTableFromDashboard('{{ $single_table_block['table_no'] }}' , '{{ route('admin.addOrder') }}')">
                                        <span>{{ $single_table_block['table_no'] }}</span>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 p-0 mt-4">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <div class="row">
                                    <div
                                        class="col-md-4 mb-md-0 mb-2 d-flex justify-content-md-start justify-content-center align-items-center">
                                        <h6 class="text-primary" style="font-size: 16px">Tables Details</h6>
                                    </div>
                                    <div
                                        class="col-md-8 d-flex justify-content-md-end justify-content-center align-items-center">
                                        <div class="d-flex justify-content-end align-items-center" id="tables-table-action">
                                            <div class="d-flex justify-content-center align-items-center checkbox-selected"
                                                id="tables-selected">
                                                {{-- No. of Selected Item will show here  --}}
                                            </div>

                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="{{ route('admin.addTableIndex') }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="auto" data-bs-title="Add New"
                                                    class="btn btn-primary"><i class="fa-regular fa-plus"></i>
                                                </a>
                                                <a href="{{ route('admin.Trash', 'tables-trash') }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Show Trash" class="btn btn-warning"> <i
                                                        class="fa-sharp fa-solid fa-trash-undo"></i>
                                                </a>

                                                <button type="button" class="btn btn-danger disabled-btn"
                                                    data-bs-toggle="tooltip" data-bs-placement="auto"
                                                    data-bs-title="Move Into Trash" disabled
                                                    onclick="deleteConfirm('tables-delete-all','tables', 'false','','')">
                                                    <i class="fa-regular fa-trash"></i>
                                                    <input type="hidden" value="" id="tables-delete-all">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="mt-2 mx-2 mb-3">
                                    <table id="tables-table" class="table table-hover table-borderless w-100 border-bottom"
                                        style="min-width: 500px">
                                        <thead class="bg-light border-0">
                                            <tr>
                                                <th></th>
                                                <th class="sort text-nowrap">Table Number</th>
                                                <th class="sort text-nowrap">Capacity</th>
                                                <th class="sort text-nowrap">Created At</th>
                                                <th class="sort text-nowrap">Updated At</th>
                                                <th class="sort text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- Data will load here using ajax server side . --}}
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
