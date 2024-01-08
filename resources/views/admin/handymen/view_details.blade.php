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
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{ $details->name }}</li>
                </ol>
            </div>
            </div>
        </div><!-- /.container-fluid -->
        </section>

        <!-- Horizontal Form -->
        <div class="card card-info">
            <div class="card-header">
            <h3 class="card-title">{{ $details->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form class="form-horizontal">
            <div class="card-body">

                <div>
                    @if ($jobDetails->image == Null)
                        <img class="profile-user-img img-fluid" src="{{ asset('assets/dist/img/default.png') }}" alt="Job Image">
                        
                    @else
                        <img class="profile-user-img img-fluid" src="{{ asset('uploads/job_posting/'.$jobDetails->image) }}" alt="Job Image">
                        
                    @endif
                </div>


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ $jobDetails->job_title }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Location</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ $jobDetails->job_location }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ $jobDetails->type->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ $jobDetails->category->name }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">URL</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ $jobDetails->url }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                        <textarea name="job_description" id="mysummernote" cols="30" rows="10">{!! $jobDetails->job_description !!}</textarea>
                    </div>
                </div>
                
                
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" disabled class="btn btn-info">Save</button>
                <a type="button" href="{{ route('jobs.posted') }}" class="btn btn-default float-right">Go Back</a>
            </div>
            <!-- /.card-footer -->
            </form>
        </div>
        <!-- /.card -->
    </div>




@endsection