@extends('layouts.admin')

@section('content')

    @include('admin.types.add-model')

    @include('admin.types.update-model')

    @include('admin.types.delete-model')


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products List</h1>
                </div>
                <div class="col-sm-6">
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#AddJobModal">Add Job Type</button>
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
                                <h3 class="card-title">Job Types</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="resp"></div>
                                <br>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Slug</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($type as $k=>$items)
                                            <tr>
                                                <td>{{ ++$k }}</td>
                                                <td>{{ $items->name }}</td>
                                                <td>{{ $items->jobCats->name }}</td>
                                                <td>{{ $items->slug }}</td>
                                                <td>
                                                    @if ($items->status == 1)
                                                        <span class="badge badge-success">ACTIVE</span>
                                                    @else
                                                        <span class="badge badge-danger">DEACTIVE</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary editTypeBtn" data-toggle="modal" data-target="#UpdateTypeModal" value="{{ $items->id }}"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-danger deleteTypeBtn" value="{{ $items->id }}" data-toggle="modal" data-target="#deleteModal"><i class="fas fa-trash-alt"></i></button>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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


   
    @section('scripts')
        <script>

            //This is to Fetch the data from database with ajax to view on edit model 
            //before updating
            $(document).ready(function () {
                $(document).on('click', '.editTypeBtn', function (e) {
                    e.preventDefault();

                    var type_id = $(this).val();
                    $('#type_id').val(type_id);
                    $('#UpdateTypeModal').modal('show');

                    $.ajax({
                        type: "GET",
                        url: "/admin/edit-type/"+type_id,
                        success: function (response) {
                            //console.log(response);

                            if(response.status == 404)
                            {
                                $('#res').html("");
                                let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                                $("#res").html(error);
                            }
                            else
                            {
                                $('#edit_catId').val(response.type.catId);
                                $('#edit_name').val(response.type.name);
                                $('#edit_slug').val(response.type.slug);
                                $('#edit_status').val(response.type.status);
                                $('#edit_meta_title').val(response.type.meta_title);
                                $('#edit_meta_keyword').val(response.type.meta_keyword);
                                $('#edit_meta_description').val(response.type.meta_description);
                                $('#edit_type_id').val(type_id);
                            }
                        }
                    });

                });
            });



           $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                //This is for Updating the Job type
                $(document).on('submit', '#UpdateJobTypeFORM', function (e) {
                    e.preventDefault();

                    var id = $('#type_id').val();
                    let EditformData = new FormData($('#UpdateJobTypeFORM')[0]);

                    $.ajax({
                        type: "POST",
                        url: "/admin/update-type/"+id,
                        data: EditformData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if(response.status == 400)
                            {
                                $('#resp').html("");
                                let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                                $("#resp").html(error);
                            }
                            else if(response.status == 404)
                            {
                                alert(response.message);
                            }
                            else if(response.status == 200)
                            {
                                $('#resp').html("");
                                $('#UpdateTypeModal').modal('hide');
                                $('#UpdateTypeModal').find('input').val("");
                                command: toastr["success"](response.message, "Success")
                                toastr.options = {
                                    "closeButton" : true,
                                    "progressBar" : true,
                                    "positionClass" : "toast-top-right",
                                    "preventDublicates" : false
                                }
                                $('.table').load(location.href+' .table');
                            }
                        }
                    });
                });


                //This is for deleting the Job type
                $(document).on('click', '.deleteTypeBtn', function (e) {
                    e.preventDefault();

                    var type_id = $(this).val();
                    $('#deleteModal').modal('show');
                    $('#del_type_id').val(type_id);
                });
                 //deleting the job type ID
                $(document).on('click', '.delete_model_btn', function (e) {
                    e.preventDefault();

                    var id = $('#del_type_id').val();

                    $.ajax({
                        type: "DELETE",
                        url: "/admin/delete-type/"+id,
                        dataType: "json",
                        success: function (response) {
                            if(response.status == 404)
                            {
                                $('#deleteModal').modal('hide');
                                let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                                $("#resp").html(error);
                            }
                            else{
                                $('#deleteModal').modal('hide');
                                $('.table').load(location.href+' .table');
                                command: toastr["success"](response.msg, "Success")
                                toastr.options = {
                                    "closeButton" : true,
                                    "progressBar" : true,
                                    "positionClass" : "toast-top-right",
                                    "preventDublicates" : false
                                }
                            }
                        }
                    });
                });

                //This is for adding the job Type
                $(document).on('submit', '#AddJobFORM', function (e) {
                    e.preventDefault();

                    let formData = new FormData($('#AddJobFORM')[0]);

                    $.ajax({
                        type: "POST",
                        url: "/admin/create-job",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if(response.status == 400)
                            {
                                $('#res').html("");
                                let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                                $("#res").html(error);
                            }
                            else{
                                $('#res').html("");
                                $('#AddJobModal').modal('hide');
                                $('#AddJobModal').find('input').val("");
                                $('#AddJobModal').find('textarea').val("");
                                $('#AddJobModal').find('select').val("");
                                $('#example1').load(location.href+' #example1');
                                command: toastr["success"](response.message, "Success")
                                toastr.options = {
                                    "closeButton" : true,
                                    "progressBar" : true,
                                    "positionClass" : "toast-top-right",
                                    "preventDublicates" : false
                                }
                            }
                        }
                    });
                });
           });

        </script>

        {{-- <script>
            $(function () {
                bsCustomFileInput.init();
            });
        </script> --}}

    @endsection
@endsection

