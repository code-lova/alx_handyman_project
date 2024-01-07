@extends('layouts.admin')

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
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
                <h3 class="card-title">All {{ $title }} Table</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="datatable">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Customer</th>
                        <th>HandyMan</th>
                        <th>Star Rating</th>
                        <th>Created Date</th>
                        <th>Updated</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($rating as $k=>$val)
                        <tr>
                            <td>{{ ++$k }}</td>
                            <td>{{ $val->customer->name }}</td>
                            <td>{{ $val->handyman->name }}</td>
                            <td>{{ $val->star_rating }} Stars</td>
                            <td>{{date("M", strtotime($val->created_at))}} {{date("j", strtotime($val->created_at))}}, {{date("Y", strtotime($val->created_at))}} -{{date("h:i:A", strtotime($val->created_at))}}</td>
                            <td>{{date("M", strtotime($val->updated_at))}} {{date("j", strtotime($val->updated_at))}}, {{date("Y", strtotime($val->updated_at))}} -{{date("h:i:A", strtotime($val->updated_at))}}</td>
                        </tr>
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

  <!-- /.Delete modal -->
  <div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Delete Data</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <input type="hidden" id="del_star_id">
                <p>Are you sure you want to delete this data with all it's Transaction?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancel</button>
                <button type="button" class="delete_model_btn btn btn-outline-light">DELETE</button>
            </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

    @section('scripts')
        <script>
            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '.deleteStarBtn', function (e) {
                    e.preventDefault();

                    var rating_id = $(this).val();
                    $('#deleteModal').modal('show');
                    $('#del_star_id').val(rating_id);

                    $(document).on('click', '.delete_model_btn', function (e) {
                        e.preventDefault();

                        var id = $('#del_user_id').val();

                        $.ajax({
                            type: "POST",
                            url: "/admin/destroy-rating/"+id,
                            dataType: "json",
                            success: function (response) {
                                if(response.status == 404)
                                {
                                    $('#deleteModal').modal('hide');
                                    toastr.error(response.message);
                                }
                                else{
                                    $('#deleteModal').modal('hide');
                                    $('#datatable').load(location.href+' #datatable');
                                    toastr.success(response.message);
                                }
                            }
                        });
                    });
                });
            });


        </script>
    @endsection

@endsection
