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

                    <form action="{{ url('admin/sendmessage') }}" method="POST">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">{{ $title }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" id="station">
                                
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">HandyMan Name</label>
                                            <select name="userId" id="userId" class="form-control form-control-border" required>
                                                <option value="">--Please Select Handyman</option>
                                                @forelse ($handymen as $val)
                                                    <option value="{{ $val->id }}">{{ $val->name }}</option>
                                                @empty
                                                    <option value="">--No Handyman Available</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Status</label>
                                            <select name="status" id="status" class="form-control form-control-border" required>
                                                <option value="">--Please Select Priority</option>
                                                <option value="High Priority">High Priority</option>
                                                <option value="Medium Priority">Medium Priority</option>
                                                <option value="Low Priority">Low Priority</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Subject</label>
                                            <input type="text" name="subject" placeholder="Message Subject" class="form-control form-control-border" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Message Details</label>
                                            <textarea rows="6" class="form-control form-control-border" name="message" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <button type="submit" class="btn btn-success">SEND MESSAGE!</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

  </div>






@endsection
