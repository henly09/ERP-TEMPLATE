<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
         {{ __('Index Voucher Request') }}
      </h2>
   </x-slot>
   <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <div class="card-body">
                  <div class="col-12">
                     <div class="page-title-box d-flex align-items-center justify-content-between">
                        <!-- Search Bar -->
                        <form class="form-inline my-2 my-lg-0 flex-fill" method="GET" action="{{ route('vouchreq.search') }}">
                           @csrf
                           <div class="form-group flex-fill">
                              <input value="{{ isset($queried) ? $queried : null }}" type="text" name="search" class="form-control flex-fill rounded-lg" placeholder="Search Voucher Information...">
                           </div>
                           <button type="submit" class="bg-blue-500 text-white font-bold py-2.5 px-4 ml-2 rounded-lg">
                           <i class="fa-solid fa-magnifying-glass"></i> Search
                           </button>
                        </form>
                        <a href="{{ route('vouchreq.create') }}" class="btn btn-primary mb-0 font-size-14 ml-5 py-2.5"><i class="feather-plus"></i> Add Voucher Request</a>
                     </div>
                  </div>
                  <!-- dt-responsive put in class for options -->
                  <table id="basic-datatable"class="table table-hover mb-0 nowrap">
                     <thead class="text-center align-middle">
                        <tr>
                           <th>VouchReq ID</th>
                           <th>Particulars</th>
                           <th>Amount</th>
                           <th>Requested By</th>
                           <th>Checked By</th>
                           <th>Comments</th>
                           <th>Customer's Name</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($vouchreqs as $vouchreq)
                        <tr>
                           @php
                           $fields = [
                           $vouchreq->id,
                           $vouchreq->particulars,
                           '₱ ' .number_format($vouchreq->amount, 2, '.', ','),
                           $vouchreq->requested_by,
                           $vouchreq->check_by,
                           $vouchreq->comments,
                           $vouchreq->name,
                           $vouchreq->status,
                           ];
                           @endphp

                           @foreach ($fields as $field)
                              @php
                              $class = ($field === $vouchreq->id) ? 'w-2' : 'w-64'; 
                              @endphp
                           <td data-route="{{ route('vouchreq.Laraview', ['id' => $vouchreq->id]) }}" class="vouchreq-row text-wrap {{ $class }} align-middle text-center" data-toggle="modal" data-target="#myModal{{ $vouchreq->id }}">{{ $field }}</td>
                              @endforeach
                           <td class="text-center align-middle">
                              <div class="button-container">
                                 <div class="modal fade" id="myModal{{ $vouchreq->id }}">
                                    <div style="max-width: 90%; max-height: 80%;" class="modal-dialog modal-xl modal-dialog-centered">
                                       <div class="modal-content rounded-xl">
                                          <!-- Modal Header -->
                                          <div class="modal-header">
                                             <h2 class="modal-title text-2xl font-bold">
                                             Voucher Request Information</h4>
                                             <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                          </div>
                                          <!-- Modal body -->
                                          <div class="modal-body">
                                             <div class="col-12">
                                                <div class="card">
                                                   <div class="card-body">
                                                      <div class="flex flex-auto">
                                                         <div class="table-responsive">
                                                            <table class="table table-bordered table-striped mb-0">
                                                               <thead>
                                                                  <tr>
                                                                     <th class="text-center">Captions</th>
                                                                     <th colspan="1" class="text-center">
                                                                        Data
                                                                     </th>
                                                                  </tr>
                                                               </thead>
                                                               <tbody>
                                                                  <tr>
                                                                     <th class="text-nowrap" scope="row">Vouch Request's ID:</th>
                                                                     <td>{{ $vouchreq->id}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                     <th class="text-nowrap" scope="row">Customer Name</th>
                                                                     <td>{{ $vouchreq->name }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                     <th class="text-nowrap" scope="row">Particulars:</th>
                                                                     <td>{{$vouchreq->particulars}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                     <th class="text-nowrap" scope="row">Amount:</th>
                                                                     <td>{{$vouchreq->amount}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                     <th class="text-nowrap" scope="row">Requested By:</th>
                                                                     <td>{{$vouchreq->requested_by}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                     <th class="text-nowrap" scope="row">Checked By:</th>
                                                                     <td>{{$vouchreq->check_by}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                     <th class="text-nowrap" scope="row">Status</th>
                                                                     <td>{{ $vouchreq->status }}</td>
                                                                  </tr>
                                                                  <tr>
                                                                     <th class="text-nowrap" scope="row">Comments:</th>
                                                                     <td>{{$vouchreq->comments}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                     <th class="text-nowrap" scope="row">Created At:</th>
                                                                     <td>{{$vouchreq->created_at}}</td>
                                                                  </tr>
                                                                  <tr>
                                                                     <th class="text-nowrap" scope="row">Updated At:</th>
                                                                     <td>{{$vouchreq->updated_at}}</td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </div>
                                                         <!-- slot for pdf viewer -->
                                                         <div class="relative w-full flex items-center justify-center">
                                                            <div class="loadingMessage absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
                                                                <div
                                                                data-te-loading-icon-ref
                                                                class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-r-transparent motion-reduce:animate-[spin_1.5s_linear_infinite]"
                                                                role="status"></div>
                                                            </div>
                                                            <iframe class="myIframe" width="800px" height="500px"></iframe>
                                                        </div>
                                                      </div>
                                                      <div class="d-flex justify-content-end mt-3 ">
                                                         <a href="{{ route('vouchreq.GenPDF', ['id' => $vouchreq->id]) }}" target="_blank" class="btn btn-success mb-0 font-size-16">
                                                         <i class="fa-solid fa-print mr-2"></i> Print Voucher
                                                         </a>
                                                      </div>
                                                   </div>
                                                   <!-- end card-body-->
                                                </div>
                                                <!-- end card-->
                                             </div>
                                             <!-- end col-->
                                          </div>
                                          <!-- Modal footer -->
                                          <div class="modal-footer">
                                             <button data-dismiss="modal" class="bg-red-500 text-white font-bold py-2.5 px-4 ml-2 rounded">
                                             <i class="fa-regular fa-circle-xmark"></i> Close
                                             </button>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="flex justify-center">
                                    <form class="pr-2" action="{{ route('vouchreq.update', ['id' => $vouchreq->id]) }}" method="GET">
                                       @csrf
                                       <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                                       <i class="fa-solid fa-pencil"></i>
                                       </button>
                                    </form>
                                    <form class="pl-2" action="{{ route('vouchreq.delete', ['id' => $vouchreq->id]) }}" method="POST">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">
                                       <i class="fa-solid fa-trash"></i>
                                       </button>
                                    </form>
                                 </div>
                              </div>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <!-- Search Results -->
                  @if($vouchreqs->count() > 0)
                  {{ $vouchreqs->links() }} <!-- Display pagination links -->
                  @else
                  <p>No results found.</p>
                  @endif
               </div>
               <!-- end card body-->
            </div>
            <!-- end card -->
         </div>
         <!-- end col-->
      </div>
      <!-- end row-->
      <!-- // Not Done Yet   -->
   </div>
   <script>
      
      $(document).ready(function() {
         var loadingMessages = $('.loadingMessage');
         var iframes = $('.myIframe');

         // When a vouchreq-row is clicked
         $('.vouchreq-row').on('click', function() {
            var vouchreqRoute = $(this).data('route');

            // Set the src of the corresponding iframe
            var iframe = $(this).closest('tr').find('.myIframe');
            iframe.attr('src', vouchreqRoute);

            // Show the loading message for the specific iframe
            loadingMessages.hide();
            $(this).closest('tr').find('.loadingMessage').show();
         });

         iframes.on('load', function() {
            console.log('An iframe has finished loading.');
            // Hide the loading message for the specific iframe
            $(this).closest('tr').find('.loadingMessage').hide();
         });
      });



      //////////////////////////////// PDF PROBLEM

      $(document).ready(function() {
            // Check if the DataTable is already initialized
            if ($.fn.DataTable.isDataTable('#basic-datatable')) {
                // If it is initialized, destroy it first
                $('#basic-datatable').DataTable().destroy();
            }

            // Now, reinitialize the DataTable with the desired options
            $('#basic-datatable').DataTable({
                searching: false, // Disable search
                paging: false,    // Disable pagination
                info: false,  
            });
        });
      

   </script>
</x-app-layout>