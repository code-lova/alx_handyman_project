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

            <!-- Default box -->
            <div class="card">
            <div class="card-header">
                <h3 class="card-title">Update Account</h3>

                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
                </div>
            </div>
            <div class="card-body">

                <!-- general form elements disabled -->
            <div class="card card-warning">
                <div class="card-header">
                  <h3 class="card-title">Account Details</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body" id="station">
                  <form id="AccountSettingForm" method="POST">
                    @method('PUT')
                    <div id="res"></div>
                    <div class="row">
                      <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>Name</label>
                            <input type="text" disabled class="form-control is-valid" id="inputSuccess" value="{{ $user->name }}">
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>Email</label>
                            <input type="text" disabled class="form-control is-valid" id="inputSuccess" value="{{ $user->email }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                              <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>Username</label>
                              <input type="text" disabled class="form-control is-valid" id="inputSuccess" value="{{ $user->username }}">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                              <label class="col-form-label" for="inputSuccess"><i class="fas fa-check"></i>IP Address</label>
                              <input type="text" disabled class="form-control is-valid" id="inputSuccess" value="{{ $user->ip_address }}">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-sm-4">
                          <!-- text input -->
                          <div class="form-group">
                              <label class="col-form-label" for="inputSuccess"><i class="far fa-bell"></i>Old Password</label>
                              <input type="password" name="oldpassword" class="form-control is-warning" id="inputWarning" placeholder="Enter old password">
                          </div>
                        </div>
                        <div class="col-sm-4">
                          <div class="form-group">
                              <label class="col-form-label" for="inputSuccess"><i class="far fa-bell"></i>New Password</label>
                              <input type="password" name="password" class="form-control is-warning" id="inputWarning" placeholder="Enter new password">
                          </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="col-form-label" for="inputSuccess"><i class="far fa-bell"></i>Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control is-warning" id="inputWarning" placeholder="confirm password">
                            </div>
                          </div>
                      </div>

                      <div>
                        <button type="submit" class="btn btn-success">Update Account</button>
                      </div>

                  </form>
                </div>
                <!-- /.card-body -->
              </div>




            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                Footer
            </div>
            <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->

    </div>

    @section('scripts')

        <script>

            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });


                $(document).on('submit', '#AccountSettingForm', function (e) {
                e.preventDefault();

                    let formData = new FormData($('#AccountSettingForm')[0]);
                    //alert(id);

                    $.ajax({
                        type: "POST",
                        url: "/admin/update-admin/",
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            if(response.status == 400)
                            {
                                $('#res').html("");
                                let error = '<p style="color:red">'+response.message+'</p>';
                                $("#res").html(error);
                            }
                            else if(response.status == 200) {
                                $('#res').html("");
                                $('#station').load(location.href+' #station');
                                toastr.success(response.message);
                            }
                            else if(response.status == 403) {
                                //$('#station').load(location.href+' #station');
                                toastr.warning(response.message);
                            }
                            else if(response.status == 404) {
                                toastr.danger(response.message);
                            }
                        }
                    });
                });
            });

        </script>

    @endsection

@endsection
