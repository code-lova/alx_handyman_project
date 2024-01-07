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
                    <h3 class="card-title">All Messages from Contact Us Page</h3>
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
                            <th>Status</th>
                            <th>Replied</th>
                            <th>Date Sent</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact as $k=>$val)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ $val->name }}</td>
                                <td>{{ $val->email }}</td>
                                <td class="text-center">
                                    @if ($val->replied == 0)
                                        <span class="badge badge-warning">Not Replied</span>
                                    @elseif ($val->replied == 1)
                                        <span class="badge badge-success">Replied</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($val->date_replied == null)
                                        <span class="badge badge-primary">No reply</span>
                                    @elseif ($val->date_replied != null)
                                        {{date("M", strtotime($val->date_replied))}} {{date("j", strtotime($val->date_replied))}}, {{date("Y", strtotime($val->date_replied))}}
                                    @endif
                                </td>
                                <td>
                                    {{date("M", strtotime($val->created_at))}} {{date("j", strtotime($val->created_at))}}, {{date("Y", strtotime($val->created_at))}}
                                </td>

                                {{-- <td>
                                    {{date("M", strtotime($val->start_date))}} {{date("j", strtotime($val->start_date))}}, {{date("Y", strtotime($val->start_date))}}
                                </td>

                                <td>
                                    {{date("M", strtotime($val->end_date))}} {{date("j", strtotime($val->end_date))}}, {{date("Y", strtotime($val->end_date))}}
                                </td> --}}
                               
                                <td>
                                    <button type="button" class="btn btn-default viewDesBtn" value="{{ $val->id }}" data-toggle="modal" data-target="#viewDescription">View Message</button>
                                    <a type="button" href="{{ url('admin/reply_contact_messsage/'.$val->id) }}" class="btn btn-primary">Reply Message</a>

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

  <div class="modal fade" id="viewMessage">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Job Message Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" id="viewMessageForm" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="message_id" id="message_id">

            <div class="modal-body">
                <div class="form-group">
                    <label for="inputDescription">Subject</label>
                    <input type="text" id="view_subject" name="subject" class="form-control form-control-border">
                </div>

                <div class="form-group">
                    <label for="inputDescription">Contact Message</label>
                    <textarea id="view_message" name="message" class="form-control" rows="6"></textarea>
                </div>
                <br>
                <hr class="bg-primary">

                <div class="form-group">
                    <label for="inputDescription">Replied Message</label>
                    <textarea id="view_reply" name="replied_message" class="form-control" rows="6"></textarea>
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


