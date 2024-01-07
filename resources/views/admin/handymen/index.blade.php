@extends('layouts.admin')



@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Users Account List</h1>
            </div>

            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
        <div class="container-fluid">
            <div class="row">
            <div class="col-12">


                <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Users Account Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="datatable">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Verified</th>
                            <th>Status</th>
                            <th>Role</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $k=>$val)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->username }}</td>
                                <td>
                                    @if ($val->email_status == 1)
                                        <span class="badge badge-success">Verified</span>
                                    @else
                                        <span class="badge badge-danger">Unverified</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($val->is_active == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Banned</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($val->role_as == 1)
                                        <span class="badge badge-info">Admin</span>
                                    @elseif ($val->role_as == 0)
                                        <span class="badge badge-warning">HandyMan</span>
                                    @elseif ($val->role_as == 2)
                                        <span class="badge badge-primary">Customer</span>
                                    @endif
                                </td>
                                <td>{{ $val->created_at->format('m/y/d') }}</td>
                                <td>
                                    @if ($val->role_as == 1)
                                        <a type="button" href="{{ url('admin/edit-user/'.$val->id) }}" class="btn btn-primary"><i class="fas fa-user"></i></a>
                                    @else
                                        <a type="button" href="{{ url('admin/edit-user/'.$val->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    @endif
                                    @if ($val->role_as == 0 || $val->role_as == 2)
                                        <button class="btn btn-danger deleteUserBtn" value="{{ $val->id }}" data-toggle="modal" data-target="#deleteModal{{ $val->id }}"><i class="fas fa-trash-alt"></i></button>
                                    @else
                                        <button class="btn btn-danger" disabled><i class="fas fa-trash-alt"></i></button>
                                    @endif
                                </td>

                            </tr>

                            <!-- /.Delete modal -->
                            <div class="modal fade" id="deleteModal{{ $val->id }}">
                                <div class="modal-dialog">
                                <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                    <h4 class="modal-title">Delete Data</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                        <form action="{{ url('admin/delete-user/'.$val->id) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <input type="hidden" id="del_user_id">
                                                <p>Are you sure you want to delete this data with all it's Transaction?</p>
                                                <input type="hidden" value="{{ $val->id }}">
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="delete_model_btn btn btn-outline-light">DELETE</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
  <!-- /.content-wrapper -->

    {{-- @section('datatable')
    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true, "lengthChange": false, "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>
    @endsection --}}


@endsection


