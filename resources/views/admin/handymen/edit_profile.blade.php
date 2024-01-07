@extends('layouts.admin')




@section('content')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $userProfile->name }} Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div id="profileSection">
                <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if ($userProfile->user_image == Null)
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/dist/img/avatar.png') }}" alt="User profile picture">
                            
                        @else
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('assets/uploads/'.$userProfile->user_image) }}" alt="User profile picture">
                            
                        @endif
                    </div>

                    <h3 class="profile-username text-center">{{ $userProfile->name }}e</h3>
                    @if ($userProfile->job_title == null)
                        <p class="text-muted text-center">Unspecified</p>
                    @else
                        <p class="text-muted text-center">{{ $userProfile->job_title }}</p>
                    @endif

                    @if ($userProfile->role_as == 1)
                        <p class="text-success text-center">Administrator</p>
                    @elseif ($userProfile->role_as == 2)
                        <p class="text-warning text-center">Customer</p>
                    @elseif ($userProfile->role_as == 0)
                        <p class="text-info text-center">HandyMan</p>
                    @endif

                    <ul class="list-group list-group-unbordered mb-3">
                        @if ($userProfile->job_category == null)
                            <li class="list-group-item">
                                <b>Job Category</b> <a class="float-right">Unspecified</a>
                            </li>
                        @else
                            <li class="list-group-item">
                                <b>Job Category</b> <a class="float-right">{{ $userProfile->job_category }}</a>
                            </li>
                        @endif
                    
                        @if ($userProfile->job_type == null)
                            <li class="list-group-item">
                                <b>Job Type</b> <a class="float-right">Unspecified</a>
                            </li>
                        @else
                            <li class="list-group-item">
                                <b>Job Type</b> <a class="float-right">{{ $userProfile->job_type }}</a>
                            </li>
                        @endif
                        @if ($userProfile->phone == null)
                            <li class="list-group-item">
                                <b>Phone</b> <a class="float-right">Unspecified</a>
                            </li>
                        @else
                            <li class="list-group-item">
                                <b>Phone</b> <a class="float-right">{{ $userProfile->phone }}</a>
                            </li>
                        @endif

                        <li class="list-group-item">
                            <b>Jobs Completed</b> <a class="float-right">6</a>
                        </li>

                        <li class="list-group-item">
                            @if ($countJobPosted < 1)
                                <b>Jobs Posted</b> <a class="float-right">None</a>
                            @else
                                <b>Jobs Posted</b> <a class="float-right">{{ $countJobPosted }}</a>
                            @endif
                        </li>
                    
                    </ul>

                    @if ($userProfile->is_active == 1)
                        <button type="button" value="{{ $userProfile->id }}" class="blockUserBtn btn btn-danger btn-block"><b>Block Account</b></button>
                    @else
                        <button type="button" value="{{ $userProfile->id }}" class="UnblockUserBtn btn btn-success btn-block"><b>Un-Block Account</b></button>
                    @endif
                </div>
                <!-- /.card-body -->
                </div>
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>
                @if ($userProfile->location == null)
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                    <p class="text-muted">Unspceified</p>
                @else
                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                    <p class="text-muted">{{ $userProfile->location }}</p>
                @endif
               
                <hr>

                @if ($userProfile->skills == null)
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted">Unspecified</p>
                @else
                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted">
                        @foreach (explode(',', $userProfile->skills) as $values)
                            <div class="tag tag-danger">{{ $values }}</div>
                        @endforeach
                    </p>
                @endif

                <hr>

                @if ($userProfile->experience == null)
                <strong><i class="fas fa-user-alt mr-1"></i> Experience</strong>

                <p class="text-muted">Unspecified</p>
            @else
                <strong><i class="fas fa-user-alt mr-1"></i>Experience</strong>

                <p class="text-muted">
                    @foreach (explode(',', $userProfile->experience) as $values)
                    <div class="tag tag-danger">{{ $values }}</div>
                    @endforeach
                </p>
            @endif
               
                <hr>
                @if ($userProfile == null)
                    <strong><i class="far fa-file-alt mr-1"></i> IP Address</strong>
                    <p class="text-muted">Unspecified</p>
                @else
                    <strong><i class="far fa-file-alt mr-1"></i> IP Address</strong>
                    <p class="text-muted">{{ $userProfile->ip_address }}</p>
                @endif

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Last Seen</strong>
                <p class="text-muted">{{ Carbon\Carbon::parse($userProfile->last_seen)->diffForHumans() }}</p>
                <hr>
                <strong><i class="fas fa-pencil-alt mr-1"></i> Status</strong>
                @if(Cache::has('User-is-Online' . $userProfile->id))
                    <p>
                        <span class="badge badge-success">ONLINE</span>
                    </p>
                @else
                    <p>
                        <span class="badge badge-danger">OFFLINE</span>
                    </p>
                @endif
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i>Registered Date</strong>
                <p class="text-muted">Registered: {{ $userProfile->created_at->format('d/m/y') }}.</p>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#jobs" data-toggle="tab">Jobs</a></li>
                  <li class="nav-item"><a class="nav-link" href="#comment" data-toggle="tab">Comments</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Profile Settings</a></li>
                  <li class="nav-item"><a class="nav-link active bg bg-danger" href="{{ url('admin/users-account') }}">Go Back </a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">

                <div class="tab-content">
                    
                    <!-- Job tab-pane -->
                    <div class="active tab-pane" id="jobs">
                        
                        <!-- job -->
                        <div class="post">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date Posted</th>
                                            <th>Status</th>
                                            <th>Expires at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jobListing as $val)
                                            
                                        <tr>
                                            <td>{{ $val->job_title }}</td>
                                            <td>
                                                {{date("M", strtotime($val->created_at))}} {{date("j", strtotime($val->created_at))}}, {{date("Y", strtotime($val->created_at))}}
                                            </td>
                                            <td class="text-center">
                                                @if ($val->status == 1)
                                                    <i class="fas fa-check bg-success"></i>
                                                @else
                                                    <i class="fas fa-exclamation bg-danger"></i>
                                                @endif
                                            </td>
                                            <td>
                                                {{date("M", strtotime($val->expires_at))}} {{date("j", strtotime($val->expires_at))}}, {{date("Y", strtotime($val->expires_at))}}
                                            </td>
                                            <td>
                                                <a type="button" href="{{ url('admin/viewDetails/'.$val->userId) }}" class="btn btn-primary"><i class="fas fa-file"></i>View</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Date Posted</th>
                                            <th>Status</th>
                                            <th>Expires at</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.job -->
                    </div>
                    <!-- /.end Job tab-pane -->


                  <!-- Comment tab-pane -->
                  <div class="tab-pane" id="comment">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Approve</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-success btn-sm">Approved</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.end comment tab-pane -->



                  <div class="tab-pane" id="settings">
                    <div id="res"></div>
                    <br>
                    <form class="form-horizontal" id="UpdateUserForm" method="POST">
                        <input type="hidden" value="{{ $userProfile->id }}" id="user_id">

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{ $userProfile->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" value="{{ $userProfile->email }}" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">UserName</label>
                            <div class="col-sm-10">
                                <input type="text" name="username" value="{{ $userProfile->username }}" class="form-control" id="inputName2" placeholder="Name">
                            </div>
                        </div>
                        
                        @if ($userProfile->role_as == 0 || $userProfile->role_as == 2)
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Account Type</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="customer_type">
                                        <option {{ $userProfile->role_as == '0' ? 'selected': '' }}>HandyMan</option>
                                        <option {{ $userProfile->role_as == '2' ? 'selected': '' }}>Customer</option>
                                    </select>
                                </div>
                            </div>
                        @endif
                       
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Location</label>
                        <div class="col-sm-10">
                            <input type="text" name="location" value="{{ $userProfile->location }}" class="form-control" id="location">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" value="{{ $userProfile->phone }}" class="form-control" id="phone">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">State</label>
                        <div class="col-sm-10">
                            <input type="text" name="state" value="{{ $userProfile->state }}" class="form-control" id="state">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                            <select name="gender" id="gender" class="form-control">
                                <option value="">--Unspecified--</option>
                                <option value="Male" {{ $userProfile->gender == 'Male' ? 'selected': '' }}>Male</option>
                                <option value="Female" {{ $userProfile->gender == 'Female' ? 'selected': '' }}>Female</option>
                                <option value="TransGender" {{ $userProfile->gender == 'TransGender' ? 'selected': '' }}>TransGender</option>
                                <option value="Prefer Not To Say" {{ $userProfile->gender == 'Prefer Not To Say' ? 'selected': '' }}>Prefer not to say</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Education</label>
                        <div class="col-sm-10">
                            <input type="text" name="education" value="{{ $userProfile->education }}" class="form-control" id="education">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">URL</label>
                        <div class="col-sm-10">
                            <input type="text" name="url" value="{{ $userProfile->url }}" class="form-control" id="url">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Marital Status</label>
                        <div class="col-sm-10">
                            <select name="marital_status" id="marital_status" class="form-control">
                                <option value="">--Unspecified--</option>
                                <option value="Married" {{ $userProfile->marital_status == 'Married' ? 'selected': '' }}>Married</option>
                                <option value="Single" {{ $userProfile->marital_status == 'Single' ? 'selected': '' }}>Single</option>
                                <option value="Divorced" {{ $userProfile->marital_status == 'Divorced' ? 'selected': '' }}>Divorced</option>
                                <option value="Widowed" {{ $userProfile->marital_status == 'Widowed' ? 'selected': '' }}>Widowed</option>
                            </select>
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">DOB</label>
                        <div class="col-sm-10">
                            <input type="date" name="birth_date" value="{{ $userProfile->birth_date }}" class="form-control" id="birth_date">
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputSkills" class="col-sm-2 col-form-label">Long Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" id="mysummernote" cols="30" rows="10">{!! $userProfile->description !!}</textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="short_description" value="{{ $userProfile->short_description }}" class="form-control" id="short_description">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Facebook Url</label>
                        <div class="col-sm-10">
                            <input type="text" name="fb_link" value="{{ $userProfile->fb_link }}" class="form-control" id="fb_link">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">X Url</label>
                        <div class="col-sm-10">
                            <input type="text" name="x_link" value="{{ $userProfile->x_link }}" class="form-control" id="x_link">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Linkedin Url</label>
                        <div class="col-sm-10">
                            <input type="text" name="linkedin_link" value="{{ $userProfile->linkedin_link }}" class="form-control" id="linkedin_link">
                        </div>
                      </div>



                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" required> I agree to the <a href="#">terms and conditions</a>
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->

              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>


  @section('scripts')

        @include('admin.handymen.update_js')

    @endsection

@endsection