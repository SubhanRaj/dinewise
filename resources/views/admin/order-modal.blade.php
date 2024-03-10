 {{-- table selection modal  --}}
 {{-- table selection modal  --}}
 {{-- table selection modal  --}}

 <div class="modal fade" id="table-select-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
     role="dialog" aria-labelledby="table-select-modal-title" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
         <div class="modal-content">
             <div class="modal-header bg-primary text-white py-2">
                 <h5 class="modal-title text-uppercase " id="table-select-modal-title">Select Table
                 </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <div class="order-spiner d-none">
                         <img src="{{ asset('admin-assets/assets/images/gif/spiner.svg') }}">
                     </div>
                     <div class="row" id="order-table-details">
                         {{-- types of table start --}}
                         {{-- <div class="col-lg-2 col-md-3 col-sm-6 mb-2">
                             <div class="card radius-10">
                                 <div class="card-body pb-0 position-relative">
                                     <div class="text-center">
                                         <div
                                             class="widgets-icons rounded-circle mx-auto bg-light-danger text-danger mb-3">
                                             <i class="fa-solid fa-fork-knife"></i>
                                         </div>
                                         <h4>1</h4>
                                     </div>
                                     <i class="fa-light fa-circle-info text-info font-18 order-table-select-i"
                                         onclick="show_modal('order-table-details')"></i>
                                 </div>

                             </div>
                         </div>
                         <div class="col-lg-2 col-md-3 col-sm-6 mb-2">
                             <div class="card radius-10 ">
                                 <div class="card-body pb-0 position-relative">
                                     <div class="text-center">
                                         <div
                                             class="widgets-icons rounded-circle mx-auto bg-light-success text-success mb-3">
                                             <i class="fa-solid fa-bowl-hot"></i>
                                         </div>
                                         <h4>1</h4>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-2 col-md-3 col-sm-6 mb-2">
                             <div class="card radius-10">
                                 <div class="card-body pb-0 position-relative">
                                     <div class="text-center">
                                         <div class="widgets-icons rounded-circle mx-auto bg-light-info text-info mb-3">
                                             <i class="fa-duotone fa-cauldron"></i>
                                         </div>
                                         <h4>1</h4>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-2 col-md-3 col-sm-6 mb-2">
                             <div class="card radius-10 order-product-selected-table">
                                 <div class="card-body pb-0 position-relative">
                                     <div class="text-center">
                                         <div
                                             class="widgets-icons rounded-circle mx-auto bg-light-secondary text-secondary mb-3">
                                             <i class="fa-solid fa-utensils"></i>
                                         </div>
                                         <h4>1</h4>
                                     </div>
                                 </div>
                             </div>
                         </div> --}}
                         {{-- types of table end --}}

                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" onclick="selectTable()">Done</button>
             </div>
         </div>
     </div>
 </div>




 {{-- table details modal  --}}
 {{-- table details modal  --}}
 {{-- table details modal  --}}

 {{-- 
 <div class="modal fade" id="selected-table-details" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
     role="dialog" aria-labelledby="selected-table-details-title" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h5 class="modal-title text-dark" id="selected-table-details-title">Table Details</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <div class="row p-0">
                         <div class="col-10 d-flex justify-content-start align-items-center p-0">
                             <h5>Table Number : <span class="text-warning"> 1</span></h5>
                         </div>
                         <div class="col-2 d-flex justify-content-end align-items-center p-0">
                             <div class="widgets-icons rounded-circle mx-auto bg-light-info text-info mb-3">
                                 <i class="fa-duotone fa-cauldron"></i>
                             </div>
                         </div>
                     </div>
                     <div class="row p-0">
                         <ul class="list-group">
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <div class="text-start d-flex justify-content-center align-items-center">
                                     <span class='table-details-icon'> <i
                                             class="fa-solid fa-box text-warning font-20"></i></span>
                                     <span class="ps-2 font-14"> Capacity</span>
                                 </div>

                                 <div class="text-end">
                                     40
                                 </div>
                             </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <div class="text-start d-flex justify-content-center align-items-center">
                                     <span class='table-details-icon'> <i
                                             class="fa-solid fa-flag-pennant text-warning font-20"></i> </span>
                                     <span class="ps-2 font-14"> Table Status</span>
                                 </div>

                                 <div class="text-end">
                                     <span class="badge text-bg-success rounded-pill font-14"> Available</span>
                                 </div>
                             </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <div class="text-start d-flex justify-content-center align-items-center">
                                     <span class='table-details-icon'> <i
                                             class="fa-solid fa-user text-warning font-20"></i> </span>
                                     <span class="ps-2 font-14"> Customer's Name</span>
                                 </div>

                                 <div class="text-end">
                                     Vaibhav Goswami
                                 </div>
                             </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <div class="text-start d-flex justify-content-center align-items-center">
                                     <span class='table-details-icon'> <i
                                             class="fa-solid fa-phone text-warning font-20"></i> </span>
                                     <span class="ps-2 font-14"> Phone Number</span>
                                 </div>

                                 <div class="text-end">
                                     7518445857
                                 </div>
                             </li>
                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <div class="text-start d-flex justify-content-center align-items-center">
                                     <span class='table-details-icon'> <i
                                             class="fa-solid fa-users text-warning font-20"></i> </span>
                                     <span class="ps-2 font-14"> Total People</span>
                                 </div>

                                 <div class="text-end">
                                     4
                                 </div>
                             </li>

                             <li class="list-group-item d-flex justify-content-between align-items-center">
                                 <div class="text-start d-flex justify-content-center align-items-center">
                                     <span class='table-details-icon'> <i
                                             class="fa-sharp fa-solid fa-indian-rupee-sign text-warning font-20"></i></span>
                                     <span class="ps-2 font-14"> Order Amount</span>
                                 </div>

                                 <div class="text-end">
                                     Rs. 400
                                 </div>
                             </li>

                             <li class="list-group-item d-flex justify-content-between align-items-start">
                                 <div class="text-start d-flex justify-content-center">
                                     <span class='table-details-icon'> <i
                                             class="fa-solid fa-utensils text-warning font-20"></i></span>
                                     <span class="ps-2 font-14"> Orders</span>
                                 </div>

                                 <div class="text-end">
                                     <p style="max-width:250px;font-size:13px">Lorem ipsum dolor sit, amet consectetur
                                         adipisicing elit. </p>
                                 </div>
                             </li>
                         </ul>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div> --}}

 {{-- customer details modal  --}}
 {{-- customer details modal  --}}
 {{-- customer details modal  --}}

 <div class="modal fade" id="order-customer-details" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
     role="dialog" aria-labelledby="order-customer-details-title" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h5 class="modal-title text-dark" id="order-customer-details-title">Customer Details</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="customer-fluid">
                     <div class="row">
                         <div class="col-lg-6 mb-3">
                             <div class="flex-grow-1 position-relative">
                                 <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                             class="bx bx-search"></i></span>
                                     <input type="text" class="form-control"
                                         placeholder="Use name, email, phone, dob, doa"
                                         onkeyup="searchCustomer(this.value, 'customers','customer-search-result','customers-search-input')"
                                         id="customers-search-input">
                                 </div>
                                 <div class="customer-search-box border overflow-control" id="customer-search-result">

                                     <ul class="search-ul">

                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="col-lg-6 mb-3">
                             <div class="flex-grow-1 position-relative">
                                 <div class="input-group"> <span class="input-group-text bg-transparent"><i
                                             class="bx bx-search"></i></span>
                                     <input type="text" class="form-control" placeholder="Search using booking id"
                                         onkeyup="searchCustomer(this.value, 'bookings','booking-search-result','booking-search-input')"
                                         id="booking-search-input">
                                 </div>
                                 <div class="customer-search-box border overflow-control" id="booking-search-result">
                                     <ul class="search-ul">

                                     </ul>
                                 </div>
                             </div>
                         </div>
                         <div class="col-12 mb-3">
                             <p class="mb-2 text-uppercase"><i class="fa-regular fa-plus"></i> Add New</p>

                             <form method="POST" id="add-customer-data" enctype="multipart/form-data"
                                 onsubmit="uploadData1('add-customer-data','{{ route('admin.addCustomer') }}', 'cust-data-alert-box', 'cust-data-btn-box-1', event)">
                                 @csrf
                                 <div class="row">
                                     <div id="cust-data-alert-box"></div>
                                     <div class="col-lg-6 col-12 mb-3">
                                         <label class="form-label">Customer Name <span
                                                 class="text-danger">*</span></label>
                                         <div class="input-group">
                                             <span class="input-group-text">
                                                 <i class="fa-solid fa-user"></i>
                                             </span>
                                             <input type="text" class="form-control" placeholder="Customer Name"
                                                 name="customer_name" required>
                                             <p class="form-feedback invalid-feedback" data-name="customer_name"></p>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-12 mb-3">
                                         <label class="form-label">Phone Number <span
                                                 class="text-danger">*</span></label>
                                         <div class="input-group ">
                                             <span class="input-group-text">
                                                 <i class="fa-solid fa-phone"></i>
                                             </span>
                                             <input type="number" class="form-control" placeholder="Phone Number"
                                                 name="phone_number" required>
                                             <p class="form-feedback invalid-feedback" data-name="phone_number"></p>
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-12 mb-3">
                                         <label class="form-label">Email </label>
                                         <div class="input-group ">
                                             <span class="input-group-text">
                                                 <i class="fa-solid fa-envelope"></i>
                                             </span>
                                             <input type="email" class="form-control" placeholder="Email  "
                                                 name="email">
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-12 mb-3">
                                         <label class="form-label">Date Of Birth </label>
                                         <div class="input-group ">
                                             <span class="input-group-text">
                                                 <i class="fa-solid fa-cake-candles"></i>
                                             </span>
                                             <input type="date" class="form-control"
                                                 placeholder="Date Of Birth ( Optional )" name="date_of_birth">
                                         </div>
                                     </div>
                                     <div class="col-lg-6 col-12 mb-3">
                                         <label class="form-label">Date Of Anniversary</label>
                                         <div class="input-group ">
                                             <span class="input-group-text">
                                                 <i class="fa-solid fa-calendar-days"></i>
                                             </span>
                                             <input type="date" class="form-control"
                                                 placeholder="Date Of Anniversary ( Optional )"
                                                 name="date_of_anniversary">
                                         </div>
                                     </div>
                                     <div class="col-12 mt-3 mb-3 text-center d-flex justify-content-center">
                                         <div id="cust-data-btn-box-1" style="width:150px"
                                             class="d-flex justify-content-center">
                                             <button type="submit" class="btn btn-primary w-100">Add</button>
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
 
 {{-- selected customer details  --}}

 <div class="modal fade" id="selected-customer-details" tabindex="-1" data-bs-backdrop="static"
     data-bs-keyboard="false" role="dialog" aria-labelledby="selected-customer-details-title" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
             <div class="modal-header bg-warning">
                 <h5 class="modal-title text-dark" id="selected-customer-details-title">Customer Details</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="customer-fluid">
                     <div class="row">
                         <div class="col-12 pb-1 text-start">
                             <input type="hidden" value="" id="customer_or_booking">
                             <input type="hidden" value="" id="customer_id_or_booking_id">
                             <div id="customer-selection-dis-selection-btn">
                                 <button type="button" data-bs-toggle="tooltip" data-bs-title="Select"
                                     data-bs-placement="auto" class="btn btn-warning" onclick="setCustomer('plus')">
                                     <i class="fa-regular fa-plus"></i>
                                 </button>
                             </div>

                         </div>
                         <div class="col-12">
                             <ul class="list-group" id="customer-details-data">

                             </ul>
                         </div>

                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>




 {{-- order template modal  --}}
 {{-- order template modal  --}}
 {{-- order template modal  --}}


 <div class="modal fade" id="order-template-details" tabindex="-1" data-bs-backdrop="static"
     data-bs-keyboard="false" role="dialog" aria-labelledby="order-template-title" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h5 class="modal-title text-dark font-weight-bold" id="order-template-title">Order Templates</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body overflow-control">
                 <div class="customer">
                     <div class="row">
                         <div class="col-12">
                             <ul class="list-group">
                                 @for ($i = 0; $i < 20; $i++)
                                     <li class="list-group-item d-flex justify-content-between align-items-center">
                                         <div>
                                             <h6>Template Name</h6>
                                         </div>
                                         <div class="btn-group" role="group" aria-label="Basic example">
                                             <button type="button" data-bs-toggle="tooltip" data-bs-placement="auto"
                                                 data-bs-title="Select" class="btn btn-warning">
                                                 <i class="fa-sharp fa-solid fa-plus"></i>
                                             </button>
                                             <button type="button" data-bs-toggle="tooltip" data-bs-placement="auto"
                                                 data-bs-title="View" class="btn btn-warning"
                                                 onclick="show_modal('order-single-template-details')">
                                                 <i class="fa-solid fa-eye"></i>
                                             </button>
                                             <button type="button" data-bs-toggle="tooltip" data-bs-placement="auto"
                                                 data-bs-title="Delete" class="btn btn-danger">
                                                 <i class="fa-solid fa-trash"></i>
                                             </button>
                                         </div>
                                     </li>
                                 @endfor
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>



 {{-- template details modal  --}}
 {{-- template details modal  --}}
 {{-- template details modal  --}}

 <div class="modal fade" id="order-single-template-details" tabindex="-1" data-bs-backdrop="static"
     data-bs-keyboard="false" role="dialog" aria-labelledby="order-single-template-title" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
             <div class="modal-header bg-secondary">
                 <h5 class="modal-title text-white font-weight-bold" id="order-single-template-title">Order Templates
                     Details
                 </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body overflow-control">
                 <div class="customer">
                     <div class="row">
                         <div class="col-12">

                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>


 {{-- number of people  --}}
 {{-- number of people  --}}
 {{-- number of people  --}}

 <div class="modal fade" id="order-no-of-people" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
     role="dialog" aria-labelledby="order-no-of-people-title" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
             <div class="modal-header bg-secondary">
                 <h5 class="modal-title text-white font-weight-bold" id="order-no-of-people-title">Number Of People
                 </h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body overflow-control">
                 <div class="customer">
                     <div class="row">
                         <div class="col-12 mb-4">
                             <input type="number" class="form-control" placeholder="Number of people"
                                 id="number_of_people">
                         </div>
                         <div class="col-12 text-center">
                             <button type="button" class="btn btn-primary"
                                 onclick="saveNumberOfPeople()">Save</button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>
