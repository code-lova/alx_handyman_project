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
                            <th>Username</th>
                            <th>Subject</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Sent Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($listing as $k=>$val)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ $val->userName->name }}</td>
                                <td>{{ $val->subject }}</td>
                                <td>{{ $val->email }}</td>
                               
                                <td class="text-center">
                                    {{ $val->status }}
                                </td>
                                <td>
                                    {{date("M", strtotime($val->created_at))}} {{date("j", strtotime($val->created_at))}}, {{date("Y", strtotime($val->created_at))}}
                                </td>

                                <td>
                                    <button type="button" class="btn btn-default viewMsgBtn" value="{{ $val->id }}" data-toggle="modal" data-target="#viewSentMessage">View Message</button>

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

  <div class="modal fade" id="viewSentMessage">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Sent handyMen Message Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" id="viewMessageForm" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="sent_id" id="sent_id">

            <div class="modal-body">

                <div class="form-group">
                    <label for="inputDescription">Sent Message</label>
                    <textarea id="view_sent" name="message" class="form-control" rows="6"></textarea>
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
       @include('admin.messages.view_js')
   @endsection


@endsection


