<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Index Customer') }}
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
                                    <form class="form-inline my-2 my-lg-0 flex-fill" method="GET" action="">
                                    @csrf
                                        <div class="form-group flex-fill">
                                            <input type="text" name="search" class="form-control flex-fill" placeholder="Search customers...">
                                        </div>
                                        <button onclick="#" class="bg-blue-500 text-white font-bold py-2.5 px-4 ml-2 rounded">
                                            <i class="fa-solid fa-eye"></i> Search
                                        </button>
                                    </form>

                                    <a href="#" class="btn btn-primary mb-0 font-size-14 ml-5 py-2.5"><i class="feather-plus"></i> Add Customer</a>
                                </div>
                            </div>
                            
                            <table id="basic-datatable"class="table table-hover mb-0 dt-responsive nowrap">
                            <thead class="text-center align-middle">
                                <tr>
                                    <th>Customer ID</th>
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Contact Number</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($customers as $customer)
                                    <tr>
                                        @php
                                            $fields = [
                                                $customer->id,
                                                $customer->name,
                                                $customer->email,
                                                $customer->contact_Num,
                                                $customer->address,
                                                $customer->created_at,
                                                $customer->due_Date,
                                                $customer->status,
                                            ];
                                        @endphp

                                        @foreach ($fields as $field)
                                            <td data-toggle="modal" data-target="#myModal{{ $customer->id }}">{{ $field }}</td>
                                        @endforeach
                                        <td class="text-center align-middle">
                                            <div class="button-container">
                                            <div class="modal fade" id="myModal{{ $customer->id }}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Customer Information</h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
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
                                                                                <th class="text-nowrap" scope="row">Customer's ID</th>
                                                                                <td>{{ $customer->id}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Customer's Name</th>
                                                                                <td>{{$customer->name}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Customer's Email</th>
                                                                                <td>{{$customer->email}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Customer's Contact No.</th>
                                                                                <td>{{$customer->contact_Num}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Customer's Address</th>
                                                                                <td>{{$customer->address}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Customer's Creation Date</th>
                                                                                <td>{{$customer->created_at}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Customer's Due Date</th>
                                                                                <td>{{$customer->due_Date}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Customer's Status</th>
                                                                                <td>{{$customer->status}}</td>
                                                                            </tr>
                                                                            </tbody>

                                                                        </table>
                                                                    </div> <!-- end table-responsive-->
                                                                    <div class="d-flex justify-content-end mt-3 ">
                                                                    <a href="" class="btn btn-primary mb-0 font-size-14">
                                                                        <i class="feather-plus"></i> Request Voucher
                                                                    </a>
                                                                </div>
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


                                        <button onclick="navigateToRoute('{{ route('customer.read') }}')" class="bg-yellow-500 text-white font-bold py-2 px-4 rounded">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <button onclick="navigateToRoute('{{ route('customer.update') }}')" class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <form action="{{ route('customer.delete') }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">
                                            <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="customerModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="customerModalLabel">Customer Details</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- The data will be displayed here -->
                                                <div id="customerDetails"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </table>
                            <!-- Search Results -->
                            @if($customers->count() > 0)
                                {{ $customers->links() }} <!-- Display pagination links -->
                            @else
                                <p>No results found.</p>
                            @endif
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->
    </div>

    <script>
    function navigateToRoute(url) {
        window.location.href = url; // Replace with the actual route or URL
    }
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