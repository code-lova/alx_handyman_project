@extends('layouts.admin')

@section('content')

    @include('admin.payment-option.add-model')

    @include('admin.payment-option.update-model')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ $title }}</h1>
            </div>
            <div class="col-sm-6">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#AddPaymentModal">Add Payment Option</button>
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
                            <h3 class="card-title">List of Payment Options</h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0" style="height: 350px;">
                            <table class="table table-head-fixed text-nowrap">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Update</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($payment as $k=>$val)
                                <tr>
                                    <td>{{ ++$k }}</td>
                                    <td>{{ $val->payment_name }}</td>
                                    <td>
                                        @if($val->status==1)
                                            <span class="badge badge-success">Active</span>
                                        @else
                                            <span class="badge badge-danger">Not-active</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($val->status == 0)
                                           
                                            <button type="button" value="{{ $val->id }}" class="activate btn btn-success">Activate</button>
                                        @endif
                                    </td>
                                    <td>{{date("d/m/Y", strtotime($val->created_at))}}</td>
                                    <td>{{ $val->updated_at->diffForHumans() }}</td>

                                    <td>
                                        <button class="btn btn-primary editPaymentBtn" data-toggle="modal" data-target="#UpdatePaymentModal" value="{{ $val->id }}"><i class="fas fa-edit"></i></button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td>
                                        <b>Your Have Not Created Any Payment Option Yet. </b>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                            </table>

                        </div>
                        <div class="your-paginate">
                            {{ $payment->links() }}
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>

    @section('scripts')
        @include('admin.payment-option.payment_js')

        <script>
            

            $(function () {
                bsCustomFileInput.init();
            });
        </script>
    @endsection


@endsection
