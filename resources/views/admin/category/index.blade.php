@extends('layouts.admin')

@section('content')

    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Add New Job Catrgory</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('admin/add-category') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                            @if ($errors->any('name'))
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" name="slug" class="form-control" placeholder="Enter Slug" required>
                                @if ($errors->any('slug'))
                                    <small class="text-danger">{{ $errors->first('slug') }}</small>
                                @endif
                        </div>
                        </div>
                    </div>
                    
                    <hr>
                    <h4>SEO DATA</h4>
                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" placeholder="Enter Meta Title" required>
                            @if ($errors->any('meta_title'))
                                <small class="text-danger">{{ $errors->first('meta_title') }}</small>
                            @endif
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Status Action</label>
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" name="status" class="custom-control-input" id="customSwitch3" >
                                <label class="custom-control-label" for="customSwitch3">ON/OFF</label>
                            </div>
                        </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <textarea class="form-control" name="meta_keyword" rows="3" placeholder="Enter Meta Keyword" required></textarea>
                            @if ($errors->any('meta_keyword'))
                                <small class="text-danger">{{ $errors->first('meta_keyword') }}</small>
                            @endif
                        </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <label>Meta Description</label>
                            <textarea class="form-control" name="meta_description" rows="3" placeholder="Enter Meta Description" required></textarea>
                            @if ($errors->any('meta_description'))
                                <small class="text-danger">{{ $errors->first('meta_description') }}</small>
                            @endif
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Category</button>
                    </div>
                </form>
            </div>

        </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category List</h1>
          </div>
          <div class="col-sm-6">
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-lg">Add Category</button>
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
                <h3 class="card-title">Categories</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S/N</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach ($cat as $k=>$val)
                  <tr>
                    <td>{{ ++$k }}</td>
                    <td>{{ $val->name }}</td>
                    {{-- <td><img src="{{ asset('uploads/category/'.$val->image) }}" alt="img" height="30px"></td> --}}
                    {{-- <td>{{ $val->description }}</td> --}}
                    <td>
                        @if ($val->status == 1)
                            <span class="badge badge-success">ACTIVE</span>
                        @else
                            <span class="badge badge-danger">DEACTIVE</span>
                        @endif
                    </td>
                    <td>
                        {{ date("M", strtotime($val->created_at)) }} {{ date("j", strtotime($val->created_at)) }}, {{ date("Y", strtotime($val->created_at)) }} 
                    </td>

                    <td>
                        {{ date("M", strtotime($val->updated_at)) }} {{ date("j", strtotime($val->updated_at)) }}, {{ date("Y", strtotime($val->updated_at)) }} 
                    </td>
                    <td>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-default{{ $val->id }}"><i class="fas fa-edit"></i>Update</button>
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modal-danger{{ $val->id }}"><i class="fas fa-trash-alt"></i>Delete</button>
                    </td>
                  </tr>

                  <!-- /DElete modal -->
                  <div class="modal fade" id="modal-danger{{ $val->id }}">
                    <div class="modal-dialog">
                      <div class="modal-content bg-danger">
                        <div class="modal-header">
                          <h4 class="modal-title">Delete Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('admin/delete-cat/'.$val->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <p>Are You Sure You want to delete this data ? Data can't be retrieve.</p>
                                <input type="hidden" value="{{ $val->id }}">
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-outline-light">Yes.Delete!</button>
                                </div>
                            </form>
                        </div>

                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  <!-- /.Edit modal-content -->
                  <div class="modal fade" id="modal-default{{ $val->id }}">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Edit Category</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('admin/edit-cat/'.$val->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{ $val->id }}">
                                <div class="row">
                                    <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $val->name }}" required>
                                        @if ($errors->any('name'))
                                            <small class="text-danger">{{ $errors->first('name') }}</small>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Slug</label>
                                        <input type="text" name="slug" class="form-control" value="{{ $val->slug }}"  required>
                                            @if ($errors->any('slug'))
                                                <small class="text-danger">{{ $errors->first('slug') }}</small>
                                            @endif
                                    </div>
                                    </div>
                                </div>
                                
                                <hr>
                                <h4>SEO DATA</h4>
                                <div class="row">
                                    <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" value="{{ $val->meta_title }}" required>
                                        @if ($errors->any('meta_title'))
                                            <small class="text-danger">{{ $errors->first('meta_title') }}</small>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Custom Status</label>
                                        <select class="custom-select" name="status">
                                          <option value="1" {{ $val->status == '1' ? 'selected':'' }}>Active</option>
                                          <option value="0" {{ $val->status == '0' ? 'selected':'' }}>Not-Active</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Meta Keyword</label>
                                        <textarea class="form-control" name="meta_keyword" rows="3" required>{!! $val->meta_keyword !!}</textarea>
                                        @if ($errors->any('meta_keyword'))
                                            <small class="text-danger">{{ $errors->first('meta_keyword') }}</small>
                                        @endif
                                    </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                        <label>Meta Description</label>
                                        <textarea class="form-control" name="meta_description" rows="3" required>{!! $val->meta_description !!}</textarea>
                                        @if ($errors->any('meta_description'))
                                            <small class="text-danger">{{ $errors->first('meta_description') }}</small>
                                        @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                  </div>
                            </form>
                        </div>

                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->

                  @endforeach
                  </tbody>
                </table>
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

    {{-- @section('datatable')

        <script>
            $(function () {
                $("#example1").DataTable({
                    "responsive": true, "lengthChange": false, "autoWidth": false,
                    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            });
        </script>
    @endsection --}}
@endsection
