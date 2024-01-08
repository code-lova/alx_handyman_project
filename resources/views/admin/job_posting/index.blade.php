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
                    <h3 class="card-title">All Job Posted Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="datatable">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Posted By</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Status</th>
                            <th>Posted On</th>
                            <th>Expires</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($Listing as $k=>$val)
                            <tr>
                                <td>{{ ++$k }}</td>
                                <td>{{ $val->userName->name }}</td>
                                <td>{{ $val->job_title }}</td>
                                <td>{{ $val->job_location }}</td>
                                <td class="text-center">
                                    @if ($val->status == 1)
                                        <i class="fas fa-check bg-success"></i>
                                    @else
                                        <i class="fas fa-exclamation bg-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    {{date("M", strtotime($val->created_at))}} {{date("j", strtotime($val->created_at))}}, {{date("Y", strtotime($val->created_at))}}
                                </td>
                                <td>
                                    {{date("M", strtotime($val->expires_at))}} {{date("j", strtotime($val->expires_at))}}, {{date("Y", strtotime($val->expires_at))}}
                                </td>
                                <td>
                                    <a type="button" href="{{ url('admin/viewDetails/'.$val->id) }}" class="btn btn-primary"><i class="fas fa-file"></i>View</a>
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

   


@endsection


