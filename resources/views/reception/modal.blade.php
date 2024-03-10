 {{-- export inquiry started  --}}

 <div class="modal fade" id="export-inquiry" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Export Inquiry Data</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <form method="get" enctype="multipart/form-data"
                         action="{{ route('reception.exportInquiryData') }}">
                         @csrf
                         <div class="row">
                             <div class="col-12 mb-3">
                                 <label class="form-label">Year</label>
                                 <select name="year" class="form-control">
                                     @php
                                         echo yearOption('inquiry');
                                     @endphp
                                 </select>
                             </div>
                             <div class="col-12 mb-3">
                                 <label class="form-label">Month</label>
                                 <select name="month" class="form-control">
                                     <option value="All">All</option>
                                     @php
                                         echo showMonth();
                                     @endphp
                                 </select>
                             </div>
                             <div class="col-12 mb-3 text-center">
                                 <button type="submit" class="btn btn-primary">Done</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>

         </div>
     </div>
 </div>

 {{-- export inquiry started  --}}


 {{-- export reception started  --}}

 <div class="modal fade" id="export-reception" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Export Reception Data</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <form method="get" enctype="multipart/form-data"
                         action="{{ route('reception.exportReception') }}">
                         @csrf
                         <div class="row">
                             <div class="col-12 mb-3">
                                 <label class="form-label">Year</label>
                                 <select name="year" class="form-control">
                                     @php
                                         echo yearOption('reception');
                                     @endphp
                                 </select>
                             </div>
                             <div class="col-12 mb-3">
                                 <label class="form-label">Month</label>
                                 <select name="month" class="form-control">
                                     <option value="All">All</option>
                                     @php
                                         echo showMonth();
                                     @endphp
                                 </select>
                             </div>
                             <div class="col-12 mb-3 text-center">
                                 <button type="submit" class="btn btn-primary">Done</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>

         </div>
     </div>
 </div>

 {{-- export reception started  --}}
