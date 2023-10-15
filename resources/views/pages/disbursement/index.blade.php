<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Index Disbursement') }}
        </h2>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-2">
    <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                        <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                   
                                    <form class="form-inline my-2 my-lg-0 flex-fill" method="GET" action="">
                                    @csrf
                                        <div class="form-group flex-fill">
                                            <input value="{{ isset($queried) ? $queried : null }}" type="text" name="search" class="form-control flex-fill rounded-lg" placeholder="Search customers...">
                                        </div>
                                        <button type="submit" class="bg-blue-500 text-white font-bold py-2.5 px-4 ml-2 rounded-lg">
                                        <i class="fa-solid fa-magnifying-glass"></i>Search
                                        </button>
                                    </form>
                                    
                                    <a href="" class="btn btn-primary mb-0 font-size-14 ml-5 py-2.5"><i class="feather-plus"></i> Add Disbursement</a>
                                </div>
                            </div>
                            
                            <table id="basic-datatable"class="table table-hover mb-0 nowrap">
                            <thead class="text-center align-middle">
                                <tr>
                                    <th>Disbursement ID</th>
                                    <th>Total Amount</th>
                                    <th>Begin. Bank Balance</th>
                                    <th>Collect. Per DCCR</th>
                                    <th>Disbur. Per DCCR</th>
                                    <th>Bank Balance</th>
                                    <th>Cust. Name</th>
                                    <th>Cust. Status</th>
                                    <th>Vouch Amount</th>
                                    <th>Vouch Req. By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody class="text-center">
                                    @foreach ($disbursements as $disbursement)
                                    <tr>
                                        @php
                                            $fields = [
                                                $disbursement->id,
                                                '₱ ' .number_format($disbursement->total_amount, 2, '.', ','),
                                                '₱ ' .number_format($disbursement->beg_bank_balance, 2, '.', ','),
                                                '₱ ' .number_format($disbursement->col_per_dccr, 2, '.', ','),
                                                '₱ ' .number_format($disbursement->dis_per_dccr, 2, '.', ','),
                                                '₱ ' .number_format($disbursement->bank_balance, 2, '.', ','),
                                                $disbursement->name,
                                                $disbursement->status,
                                                '₱ ' .number_format($disbursement->amount, 2, '.', ','),
                                                $disbursement->requested_by,
                                            ];
                                        @endphp
                                        
                                        @foreach ($fields as $field)
                                            <td data-toggle="modal" data-target="#myModal{{ $disbursement->id }}">{{ $field }}</td>
                                        @endforeach

                                        <td class="text-center align-middle">
                                            <div class="button-container">
                                            <div class="modal fade" id="myModal{{ $disbursement->id }}">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content">
                                                        
                                                        <div class="modal-header">
                                                            <h2 class="modal-title text-2xl font-bold">Disbursement Information</h4>
                                                           
                                                        </div>
                                                        
                                                        
                                                    <div class="modal-body">
                                                        <div class="col-12">
                                                            <div class="card">
                                                                <div class="card-body">
                                                                    
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
                                                                                <th class="text-nowrap" scope="row">Disbursement ID</th>
                                                                                <td>{{ $disbursement->id }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Total Amount</th>
                                                                                <td>{{'₱ ' .number_format($disbursement->total_amount, 2, '.', ',')}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Beginning Bank Balance</th>
                                                                                <td>{{'₱ ' .number_format($disbursement->beg_bank_balance, 2, '.', ',')}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Collection Per DCCR</th>
                                                                                <td>{{'₱ ' .number_format($disbursement->col_per_dccr, 2, '.', ',')}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Disbursement Per DCCR</th>
                                                                                <td>{{'₱ ' .number_format($disbursement->dis_per_dccr, 2, '.', ',')}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Current Bank Balance</th>
                                                                                <td>{{'₱ ' .number_format($disbursement->bank_balance, 2, '.', ',')}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Customer's Name</th>
                                                                                <td>{{$disbursement->name}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Customer's Status</th>
                                                                                <td>{{$disbursement->status}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Voucher Amount</th>
                                                                                <td>{{'₱ ' .number_format($disbursement->amount, 2, '.', ',')}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Vouch Requested By</th>
                                                                                <td>{{$disbursement->requested_by}}</td>
                                                                            </tr>
                                                                            </tbody>

                                                                        </table>
                                                                    </div> <!-- end table-responsive-->
                                                                </div> <!-- end card-body-->
                                                            </div> <!-- end card-->
                                                        </div> <!-- end col-->

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
                                        
                                        <div class="flex justify-between">
                                       
                                            <form action="" method="GET">
                                                @csrf
                                                <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                            </form>
                                       
                                            <form id="delete-customer-form" action="{{ route('disbursement.delete' , ['id' => $disbursement->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete-customer-button" type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">
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
                            @if($disbursements->count() > 0)
                                {{ $disbursements->links() }} <!-- Display pagination links -->
                            @else
                                <p>No results found.</p>
                            @endif
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
            <!-- // Not Done Yet   -->
                                         
    </div>

    <script>

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
                order: [[0, 'desc']] 
            });
        });


        document.getElementById('delete-customer-button').addEventListener('click', function() {
            Swal.fire(window.swals_alerts.deleteSwal).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-customer-form').submit();
                }
            });
        });

        document.getElementById('delete-customer-form').addEventListener('submit', function (event) {
            event.preventDefault();
        });

</script>


</x-app-layout>