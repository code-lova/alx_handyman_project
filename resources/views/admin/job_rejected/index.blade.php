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
                    <h3 class="card-title">All contacted Jobs Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="datatable">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Customer</th>
                            <th>Email</th>
                            <th>Handyman Contacted</th>
                            <th>Status</th>
                            <th>Contacted</th>
                            <th>Starts</th>
                            <th>End's</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($Listing as $k=>$val)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                                <td>{{ $val->userName->name }}</td>
                               
                                <td class="text-center">
                                    <span class="badge badge-danger">Rejected</span>
                                </td>
                                <td>
                                    {{date("M", strtotime($val->created_at))}} {{date("j", strtotime($val->created_at))}}, {{date("Y", strtotime($val->created_at))}}
                                </td>

                                <td>
                                    {{date("M", strtotime($val->start_date))}} {{date("j", strtotime($val->start_date))}}, {{date("Y", strtotime($val->start_date))}}
                                </td>

                                <td>
                                    {{date("M", strtotime($val->end_date))}} {{date("j", strtotime($val->end_date))}}, {{date("Y", strtotime($val->end_date))}}
                                </td>
                               
                                <td>
                                    <button type="button" class="btn btn-default viewDesBtn" value="{{ $val->id }}" data-toggle="modal" data-target="#viewDescription">Description</button>
                                    <a type="button" href="{{ url('admin/messagehandyman/'.$val->userId) }}" class="btn btn-success">Send Message</a>

                                </td>
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

  <div class="modal fade" id="viewDescription">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Job Description Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" id="viewDescriptionForm" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="details_id" id="details_id">

            <div class="modal-body">

                <div class="form-group row">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Job Title:</label>
                    <div class="col-sm-10">
                        <input id="view_title" type="text" name="job_title" class="form-control form-control-border">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Job Category:</label>
                    <div class="col-sm-10">
                        <input id="view_cat" type="text" name="job_category" class="form-control form-control-border">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Job Type:</label>
                    <div class="col-sm-10">
                        <input id="view_type" type="text" name="job_type" class="form-control form-control-border">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Job Location:</label>
                    <div class="col-sm-10">
                        <input id="view_location" type="text" name="job_location" class="form-control form-control-border">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea id="view_details" name="details" class="form-control" rows="10"></textarea>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

   @section('scripts')
       @include('admin.job_contacted.view_js')
   @endsection


@endsection


