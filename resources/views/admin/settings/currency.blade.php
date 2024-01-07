@extends('layouts.admin')

@section('content')



   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Currency List</h1>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">


            <div class="card sections">
                <div class="card-header">
                    <h3 class="card-title">All Countries Currency</h3>
                </div>
              <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Country</th>
                        <th>Currency</th>
                        <th>Name</th>
                        <th>Symbol</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($currency as $k=>$val)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ $val->country }}</td>
                                <td>#{{ $val->currency }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->symbol }}</td>
                                <td>
                                    @if ($val->status == 1)
                                        <span class="badge badge-success">In-Use</span>
                                    @else
                                        <span class="badge badge-danger">Not-Used</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($val->status == 0)
                                        <button type="button" value="{{ $val->id }}" class="activate btn btn-primary">Activate</button>
                                    @endif
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
            $(document).ready(function () {

                $(document).on('click', '.activate', function (e) {
                    e.preventDefault();

                    var currency_id = $(this).val();

                    $.ajax({
                        type: "GET",
                        url: "/admin/activate-currency/"+currency_id,
                        dataType: "json",
                        success: function (response) {
                            console.log(response);

                            if(response.status == 404)
                            {
                                //$('.table').load(location.href+' .table');
                               
                                toastr.error(response.message);

                            }
                            else if(response.status == 200)
                            {
                                $('.sections').load(location.href+' .sections');
                                toastr.success(response.message);

                            }
                        }
                    });
                });
            });

        </script>

    @endsection
@endsection



