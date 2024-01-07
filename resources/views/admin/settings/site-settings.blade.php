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

                    <form id="AddSettingForm" method="POST">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">General Settings</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div id="res"></div>
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Website Title</label>
                                            <input type="text" name="title" @if($settings)value="{{ $settings->title }}" @endif class="form-control form-control-border">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Company/WebApp Name</label>
                                            <input type="text" name="app_name" @if($settings)value="{{ $settings->app_name }}" @endif class="form-control form-control-border">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Working Hours</label>
                                            <input type="text" name="working_hours" @if($settings)value="{{ $settings->working_hours }}" @endif class="form-control form-control-border">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Tawk ID</label>
                                            <input type="text" name="tawk_id" @if($settings)value="{{ $settings->tawk_id }}" @endif class="form-control form-control-border">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Company Email</label>
                                            <input type="email" name="email" @if($settings)value="{{ $settings->email }}" @endif class="form-control form-control-border">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Company Mobile</label>
                                            <input type="text" name="mobile" @if($settings)value="{{ $settings->mobile }}" @endif class="form-control form-control-border">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Company Address</label>
                                            <textarea class="form-control form-control-border" rows="3" name="address">@if($settings){{ $settings->address }} @endif</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">WebSite Description</label>
                                            <textarea class="form-control form-control-border" rows="3" name="app_desc">@if($settings){{ $settings->app_desc }} @endif</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">SEO Keywords</label>
                                            <textarea class="form-control form-control-border" rows="5" name="keywords">@if($settings){{ $settings->keywords }} @endif</textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h4>Switch Section</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Registration ON/OFF</label>
                                            <select class="custom-select form-control-border" name="registration">
                                                <option value="1"{{ $settings->registration == '1' ? 'selected':'' }}>Activated</option>
                                                <option value="0"{{ $settings->registration == '0' ? 'selected':'' }}>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Email Notify ON/OFF </label>
                                            <select class="custom-select form-control-border" name="email_notify">
                                                <option value="1"{{ $settings->email_notify == '1' ? 'selected':'' }}>Activated</option>
                                                <option value="0"{{ $settings->email_notify == '0' ? 'selected':'' }}>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Payment ON/OFF</label>
                                            <select class="custom-select form-control-border" name="payment">
                                                <option value="1"{{ $settings->payment == '1' ? 'selected':'' }}>Activated</option>
                                                <option value="0"{{ $settings->payment == '0' ? 'selected':'' }}>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Pricing ON/OFF</label>
                                            <select class="custom-select form-control-border" name="pricing">
                                                <option value="1"{{ $settings->pricing == '1' ? 'selected':'' }}>Activated</option>
                                                <option value="0"{{ $settings->pricing == '0' ? 'selected':'' }}>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">HandyMan ON/OFF</label>
                                            <select class="custom-select form-control-border" name="handyman">
                                                <option value="1"{{ $settings->handyman == '1' ? 'selected':'' }}>Activated</option>
                                                <option value="0"{{ $settings->handyman == '0' ? 'selected':'' }}>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleSelectBorder">Testimony ON/OFF</label>
                                            <select class="custom-select form-control-border" name="testimony">
                                                <option value="1"{{ $settings->testimony == '1' ? 'selected':'' }}>Activated</option>
                                                <option value="0"{{ $settings->testimony == '0' ? 'selected':'' }}>Deactivated</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="modal-footer justify-content-between">
                                    <button type="submit" class="btn btn-success">SAVE SETTING!</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

 </div>

    @section('scripts')
        <script>
            $(document).ready(function () {

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('submit', '#AddSettingForm', function (e) {
                    e.preventDefault();

                    let formData = new FormData($('#AddSettingForm')[0]);

                    $.ajax({
                        type: "POST",
                        url: "/admin/create-settings",
                        data: formData,
                        dataType: "json",
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            //console.log(formData);
                            if(response.status == 400)
                            {
                                $('#res').html("");
                                let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                                $("#res").html(error);
                            }
                            else if(response.status == 200){
                                $('#res').html("");
                                toastr.success(response.message);
                            }
                        }
                    });

                });
            });
        </script>

    @endsection

@endsection
