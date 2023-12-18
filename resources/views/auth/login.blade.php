@extends('layouts.app')



@section('content')

    <!-- Page Heading -->
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Authentication</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Heading / End -->

    <!-- Page Content -->
    <section class="page-content">
        <div class="container">

            <div class="row">
                <div class="col-md-6" >
                    <div class="box">
                        <h3>{{ __('Login') }}</h3>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label>{{ __('Email Address') }} <span class="required">*</span></label>
                                <input type="text" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" style="color: red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="clearfix">
                                    <label class="pull-left">
                                        Password <span class="required">*</span>
                                    </label>
                                    <span class="pull-right"><a href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></span>
                                </div>
                                <input type="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback"style="color: red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary btn-inline"> {{ __('Login') }}</button>&nbsp; &nbsp; &nbsp;

                            <label for="remember" class="checkbox-inline">
                                <input type="checkbox" name="remember" id="remember"> {{ __('Remember Me') }}
                            </label>
                        </form>
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="spacer-lg visible-sm visible-xs"></div>
                    <div class="box">
                        <h2 style="color: chocolate;">Note:</h2>
                        <h3 style="text-align: center; color:chocolate;">Only registered users, <br>who are rendering services can login</h3>
                        
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- Page Content / End -->








@endsection
