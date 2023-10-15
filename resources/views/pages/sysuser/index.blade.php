<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('System Users') }}
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
                                    <form class="form-inline my-2 my-lg-0 flex-fill" method="GET" action="{{ route('systemUsers.search') }}">
                                    @csrf
                                        <div class="form-group flex-fill">
                                            <input value="{{ isset($queried) ? $queried : null }}" type="text" name="search" class="form-control flex-fill rounded-lg" placeholder="Search customers...">
                                        </div>
                                        <button type="submit" class="bg-blue-500 text-white font-bold py-2.5 px-4 ml-2 rounded-lg">
                                        <i class="fa-solid fa-magnifying-glass"></i>Search
                                        </button>
                                    </form>

                                    <a href="{{ route('systemUsers.create') }}" class="btn btn-primary mb-0 font-size-14 ml-5 py-2.5"><i class="feather-plus"></i> Add User</a>
                                </div>
                            </div>
                            <!-- dt-responsive put in class for options -->
                            <table id="basic-datatable"class="table table-hover mb-0 nowrap">
                            <thead class="text-center align-middle">
                                <tr>
                                    <th>User's ID</th>
                                    <th>Profile Picture</th>
                                    <th>Role</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Email Verified At</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        @php
                                            $fields = [
                                                $user->id,
                                                $user->prof_pic,
                                                $user->role,
                                                $user->name,
                                                $user->email,
                                                $user->email_verified_at ? "Verified" : "Not Verified",
                                                $user->created_at,
                                                $user->updated_at,
                                            ];
                                        @endphp

                                        @foreach ($fields as $field)
                                        @if ($loop->iteration == 2)
                                            <td data-toggle="modal" data-target="#myModal{{ $user->id }}">
                                                @if ($user->prof_pic)
                                                 <img src="{{ asset('storage/profile_pictures/' . $user->prof_pic) }}" class="bg-white mx-auto h-10 w-10 rounded-full border-2 border-white" alt="User Profile Picture" width="100">
                                                @else
                                                <img src="{{ asset('images/dummyuser.png') }}" alt="Profile Picture" class="bg-white mx-auto h-10 w-10 rounded-full border-2 border-white">
                                                @endif
                                            </td>
                                        @else
                                            <td data-toggle="modal" data-target="#myModal{{ $user->id }}">{{ $field }}</td>
                                        @endif
                                        @endforeach
                                        <td class="text-center align-middle">
                                            <div class="button-container">
                                            <div class="modal fade" id="myModal{{ $user->id }}">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h2 class="modal-title text-2xl font-bold">User's Information</h4>
                                                            <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
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
                                                                                <th class="text-nowrap align-middle" scope="row">Profile Picture</th>
                                                                                <td>
                                                                                    @if ($user->prof_pic)
                                                                                    <img src="{{ asset('storage/profile_pictures/' . $user->prof_pic) }}" class="bg-white mx-auto h-20 w-20 rounded-full border-2 border-white" alt="User Profile Picture" width="100">
                                                                                    @else
                                                                                    <img src="{{ asset('images/dummyuser.png') }}" alt="Profile Picture" class="bg-white mx-auto h-20 w-20 rounded-full border-2 border-white">
                                                                                    @endif
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">User's ID</th>
                                                                                <td>{{ $user->id }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Name</th>
                                                                                <td>{{ $user->name }}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Email</th>
                                                                                <td>{{$user->email}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Email Verified At</th>
                                                                                <td>{{$user->email_verified_at}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Created At</th>
                                                                                <td>{{$user->created_at}}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <th class="text-nowrap" scope="row">Updated At</th>
                                                                                <td>{{$user->updated_at}}</td>
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
                                        
                                        <div class="flex justify-around">
                                        @if($user->role == "Admin" && $user->name == "Admin Moderator" && $user->email == "admin@gmail.com")
                                            <form action="{{ route('systemUsers.UnVerified', ['id' => $user->id]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="bg-gray-500 text-white font-bold py-2 px-4 rounded" disabled>
                                                <i class="fa-solid fa-user-check"></i>
                                                </button>
                                            </form>
                                        @else
                                            @if($user->email_verified_at != null)
                                                <form action="{{ route('systemUsers.UnVerified', ['id' => $user->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                                                    <i class="fa-solid fa-user-check"></i>
                                                    </button>
                                                </form>
                                            @elseif($user->email_verified_at == null)
                                                <form action="{{ route('systemUsers.Verified', ['id' => $user->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="bg-orange-500 text-white font-bold py-2 px-4 rounded">
                                                    <i class="fa-solid fa-user-plus"></i>
                                                    </button>
                                                </form>   
                                            @endif
                                        @endif

                                        @if($user->role == "Admin" && $user->name == "Admin Moderator" && $user->email == "admin@gmail.com")
                                            <form action="{{ route('systemUsers.UnVerified', ['id' => $user->id]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="bg-gray-500 text-white font-bold py-2 px-4 rounded" disabled>
                                                <i class="fa-solid fa-lock"></i>
                                                </button>
                                            </form>
                                        @else
                                            @if($user->role == "Admin")
                                                <form action="{{ route('systemUsers.UnAdmin', ['id' => $user->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                                                    <i class="fa-solid fa-lock"></i>
                                                    </button>
                                                </form>
                                            @elseif($user->role == "User")
                                                <form action="{{ route('systemUsers.Admin', ['id' => $user->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="bg-orange-500 text-white font-bold py-2 px-4 rounded">
                                                    <i class="fa-solid fa-unlock"></i>
                                                    </button>
                                                </form>   
                                            @endif
                                        @endif

                                        @if($user->role == "Admin" && $user->name == "Admin Moderator" && $user->email == "admin@gmail.com")
                                            <form action="{{ route('systemUsers.delete', ['id' => $user->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-gray-500 text-white font-bold py-2 px-4 rounded" disabled>
                                                <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        @else
                                            <form id="delete-customer-form" action="{{ route('systemUsers.delete', ['id' => $user->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button id="delete-customer-button" type="submit" class="bg-red-500 text-white font-bold py-2 px-4 rounded">
                                                <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                            
                                        </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- Search Results -->
                            @if($users->count() > 0)
                                {{ $users->links() }} <!-- Display pagination links -->
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
            if ($.fn.DataTable.isDataTable('#basic-datatable')) {
                $('#basic-datatable').DataTable().destroy();
            }
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