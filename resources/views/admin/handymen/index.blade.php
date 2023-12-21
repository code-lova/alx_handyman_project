@extends('layouts.admin')



@section('content')

     <!-- Start::app-content -->
     <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h1 class="page-title fw-medium fs-18 mb-2">{{ $title }}</h1>
                    <div class="">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Grid Js</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                
            </div>
            <!-- Page Header Close -->

            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Start date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                    
                <tbody>
                    @foreach ($list as $i=>$all )
                        <tr>
                            <td>{{ $all->name }}</td>
                            <td>{{ $all->username }}</td>
                            <td>{{ $all->phone }}</td>
                            <td>{{ $all->location }}</td>
                            <td>
                                @if ($all->email_status == 1)
                                    <b>Verified</b>
                                @else
                                    <b>Unverified</b>
                                @endif
                            </td>

                            <td>{{date("M", strtotime($all->created_at))}} {{date("j", strtotime($all->created_at))}}, {{date("Y", strtotime($all->created_at))}}</td>

                            <td>
                                <div class="btn-list">
                                    <a href="{{ url('admin/profile/'.$all->id) }}" type="button" class="btn btn-success-light btn-wave"><span><i
                                        class="ri-edit-line"></i></span>View/Edit</a>
                                    <button type="button" class="btn btn-danger-light btn-wave" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $all->id }}"><i
                                        class="ri-delete-bin-line"></i>Delete</button>
                                </div>
                            </td>
                        </tr>

                        <div class="modal fade" id="deleteModal{{ $all->id }}" tabindex="-1" aria-labelledby="deleteModal" data-bs-keyboard="false" aria-hidden="true">
                        <!-- Scrollable modal -->
                            <form action="{{ url('admin/delete-handyman/'.$all->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h6 class="modal-title" id="staticBackdropLabel2">Delete Modal
                                            </h6>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Are You sure you want to delete this USER.?</p>
                                            <p>Performing this command is irrivasable and data cannot be retrieved afterwards..!!</p></p>
                                                <input type="text" value="{{ $all->id }}">

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>





                    @endforeach
                    
                </tbody>

                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Start date</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
            
           

           

           

           

           

            

        </div>
    </div>
    <!-- End::app-content -->


    @section('scripttable')
        <script>
            new DataTable('#example');
        </script>
    @endsection


@endsection


