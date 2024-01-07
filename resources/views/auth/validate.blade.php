@extends('layouts.frontend')



@section('content')

    <!-- Page Heading -->
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Email Validation</h1>
                    <p>If the email does not arrive, please check your spam folder.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Heading / End -->

    <!-- Page Content -->
    <section class="page-content">
        <div class="container">

            <div class="row">
                <div class="col-md-7" >
                    <div class="box">
                        <h3>Validation</h3>
                        <form action="{{ route('verifyuser') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <div class="clearfix">
                                    <label class="pull-left">
                                        Verification Code <span class="required">*</span>
                                    </label>
                                </div>
                                <input type="text" placeholder="Enter Verification code" class="form-control @error('otp') is-invalid @enderror" name="otp" required autocomplete="otp">
                            </div>

                            <button type="submit" class="btn btn-primary btn-inline"> {{ __('Verify Now') }}</button>&nbsp; &nbsp; &nbsp;

                        </form>
                    </div>
                </div>



            </div>

        </div>
    </section>
    <!-- Page Content / End -->








@endsection
