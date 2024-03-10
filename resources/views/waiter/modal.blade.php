 <!-- Modal Body-->
 <div class="modal fade" id="media-modal-one" tabindex="-1" role="dialog" aria-labelledby="media-modal-title"
     aria-hidden="true">
     <div class="modal-dialog modal-fullscreen" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="media-modal-title">Media</h5>
             </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <div class="row">
                         <input type="hidden" id="mediaOneMainInput" value="">
                         <input type="hidden" id="mediaOneMediaType" value="">
                         @php
                             $mediaData = DB::table('media')
                                 ->orderBy('id', 'desc')
                                 ->get();
                             $mediaN = 1;
                         @endphp
                         @foreach ($mediaData as $single_mediaData)
                             <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-2 modal-col">
                                 <div class="modal-img modal-one-img">


                                     <input type="checkbox" name="media-img" class="form-check-input modalone-checkbox"
                                         value="{{ $single_mediaData->id }}" id="mediaone{{ $mediaN }}"
                                         data-url="{{ asset('mystorage/media/' . $single_mediaData->img_name) }}">
                                     <img src="{{ asset('mystorage/media/' . $single_mediaData->img_name) }}">
                                     <div class="media-overlay"
                                         onclick="checkMedia('mediaone{{ $mediaN }}','img')"></div>

                                 </div>
                             </div>
                             @php
                                 $mediaN++;
                             @endphp
                         @endforeach
                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-primary" onclick="selectMedia('media-modal-one')">Done</button>
                 <button type="button" class="btn btn-secondary"
                     onclick="cancelMedia('media-modal-one', 'final-selected-media-input', 'media-selected-image')">Cancel</button>
             </div>
         </div>
     </div>
 </div>


 <!-- Modal -->
 <div class="modal fade" id="exportModal1" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-md" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Export Attendance Data</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container-fluid">
                     <form method="get" enctype="multipart/form-data" id="export-setting-form">
                         @csrf
                         <div class="row">
                             <div class="col-12 mb-3">
                                 <label class="form-label">Year</label>
                                 <select name="year" class="form-control" id="year-select">
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





 <!-- Modal Body -->
 <div class="modal fade" id="document-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
     role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-fullscreen" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalTitleId">Staff Documents</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <div class="container">
                     <div class="row" id="document-data-row">

                     </div>
                 </div>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>



 {{-- show product details  --}}



 <!-- Modal Body -->
 <div class="modal fade" id="product-details-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
     role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title">Product Details</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">

                 <table class="table w-100 border">
                     <thead>
                         <tr class="table-secondary">
                             <th class="text-nowrap">Product Id </th>
                             <th class="text-nowrap">Product Name </th>
                             <th class="text-nowrap">Unit </th>
                             <th class="text-nowrap">Quantity </th>
                             <th class="text-nowrap">Price </th>
                             <th class="text-nowrap">Total Amount </th>
                         </tr>

                     </thead>
                     <tbody id="product-data-tbody">

                     </tbody>
                 </table>

             </div>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
