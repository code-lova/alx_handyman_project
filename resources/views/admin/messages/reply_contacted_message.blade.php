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

                    <form action="{{ url('admin/replymessage/'.$replyId->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Send a Reply to <b>{{ $replyId->name }}</b> <span>
                                    <a type="button" href="{{ route('contact.message') }}" class="btn btn-info">Go Back</a>
                                    </span></h3>
                                <br>
                              
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body" id="station">
                                
                                <div class="row">
                                    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Email</label>
                                            <input type="text" value="{{ $replyId->email }}" class="form-control form-control-border" disabled>
                                        </div>
                                    </div>

                                    <input type="hidden" value="{{ $replyId->email }}" name="email">
                                    <input type="hidden" value="{{ $replyId->name }}" name="name">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Replying To Subject</label>
                                            <input type="text" value="{{ $replyId->subject }}" class="form-control form-control-border" disabled>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                <hr class="bg-warning">

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Message from Client</label>
                                            <textarea rows="6" class="form-control" disabled>{{ $replyId->message }}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputBorder">Reply Message</label>
                                            <textarea rows="6" class="form-control form-control-border" placeholder="Write your message to reply here" name="replied_message" required></textarea>
                                        </div>
                                    </div>
                                </div>

                                <br>
                                @if ($replyId->replied == 1)
                                    <button type="button" disabled class="btn btn-success">MESSAGE REPLIED</button>
                                @else
                                    <button type="submit" class="btn btn-success">SEND REPLY</button>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

  </div>






@endsection
