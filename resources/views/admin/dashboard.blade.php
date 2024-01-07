@extends('layouts.admin')


@section('content')

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">760</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">{{ $totalUsers }} Users in Total</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Customers</span>
                <span class="info-box-number">{{ $totalCustomers }} Customers in Total</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total HandyMen</span>
                <span class="info-box-number">{{ $totalHandyMen }} Handymen in Total</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">

            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Monthly Recap Report</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
             
              <!-- ./card-body -->
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                      <h5 class="description-header">$35,210.43</h5>
                      <span class="description-text">TOTAL REVENUE</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                      <h5 class="description-header">$10,390.90</h5>
                      <span class="description-text">TOTAL COST</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                      <h5 class="description-header">$24,813.53</h5>
                      <span class="description-text">TOTAL PROFIT</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                      <h5 class="description-header">1200</h5>
                      <span class="description-text">JOB COMPLETIONS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Bordered Table</h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Name</th>
                              <th>Last Seen</th>
                              <th>IP Address</th>
                              <th style="width: 40px">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse ($users as $k=>$user)
                                <tr>
                                    <td>{{ ++$k }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
                                    <td>{{ $user->ip_address }}</td>
                                    <td>
                                        @if(Cache::has('user-is-online' . $user->id))
                                            <span class="badge bg-success">Online</span>
                                        @else
                                            <span class="badge bg-danger">Offline</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Registered User Yet</td>
                                </tr>
                            @endforelse

                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer clearfix">
                        <ul class="pagination pagination-sm m-0 float-right">
                            {{ $users->links() }}
                        </ul>
                      </div>
                    </div>
                    <!-- /.card -->
                  </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

           
            <div class="row">
             

              <div class="col-md-10">
                <!-- USERS LIST -->
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Latest App Users</h3>

                    <div class="card-tools">
                      <span class="badge badge-danger">{{ count($members) }} New Users</span>
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <ul class="users-list clearfix">
                      @forelse ($members as $val)
                        <li>
                          @if ($val->user_image == null)
                            <img src="{{ asset('assets/dist/img/default.png') }}" alt="User Image">
                          @else
                            <img src="{{ asset('uploads/profile/'.$val->user_image) }}" alt="User Image">
                          @endif
                          <a class="users-list-name" href="#">{{ $val->name }}</a>
                          <span class="users-list-date">{{ Carbon\Carbon::parse($val->created_at)->diffForHumans() }}</span>
                        </li>
                      @empty
                        <li>
                          <img src="{{ asset('assets/dist/img/default.png') }}" alt="User Image">
                          <a class="users-list-name" href="#">No hadymen yet</a>
                          <span class="users-list-date">No Customers yet</span>
                        </li>
                      @endforelse
                      
                      {{-- <li>
                        <img src="dist/img/user8-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Norman</a>
                        <span class="users-list-date">Yesterday</span>
                      </li>
                      <li>
                        <img src="dist/img/user7-128x128.jpg" alt="User Image">
                        <a class="users-list-name" href="#">Jane</a>
                        <span class="users-list-date">12 Jan</span>
                      </li>
                      --}}
                    </ul>
                    <!-- /.users-list -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="{{ url('admin/users-account') }}" target="__blank">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Jobs Posted</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>View Job</th>
                      <th>Job Title</th>
                      <th>Posted By</th>
                      <th>Status</th>
                      <th>Date Posted</th>
                      <th>Expires</th>
                    </tr>
                    </thead>
                    <tbody>
                      @forelse ($jobPosted as $posted)
                        <tr>
                          <td><a href="{{ url('admin/viewDetails/'.$posted->userId) }}">View</a></td>
                          <td>{{ $posted->job_title }}</td>
                          <td>{{ $posted->userName->name }}</td>
                          <td>
                            @if ($posted->status == 1)
                              <span class="badge badge-success">Running</span>
                            @else
                              <span class="badge badge-danger">Expired</span>
                            @endif
                          </td>
                         
                          <td>
                            {{ date("D", strtotime($posted->expires_at)) }}, {{ date("M", strtotime($posted->created_at)) }} {{ date("j", strtotime($posted->created_at)) }}, {{ date("Y", strtotime($posted->created_at)) }}
                          </td>

                          <td>
                            {{ date("D", strtotime($posted->expires_at)) }}, {{ date("M", strtotime($posted->expires_at)) }} {{ date("j", strtotime($posted->expires_at)) }}, {{ date("Y", strtotime($posted->expires_at)) }}
                          </td>
                        </tr>
                      @empty
                        <tr>
                          <td>
                            <span>No Posted Jobs Yet</span>
                          </td>
                        </tr>
                      @endforelse
                    
                    
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                {{-- <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a> --}}
                <a href="{{ route('jobs.posted') }}" class="btn btn-sm btn-secondary float-right">View All Jobs</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Job Category</span>
                <span class="info-box-number">{{ $jobCategory }} in Total</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Clicks</span>
                <span class="info-box-number">92,050</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Job Types</span>
                <span class="info-box-number">{{ $jobType }} in Total</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Direct Messages</span>
                <span class="info-box-number">163,921</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

           

            <!-- PRODUCT LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Contacted</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="products-list product-list-in-card pl-2 pr-2">

                  @forelse ($contactUs as $message)
                    <li class="item">
                      <div class="product-img">
                        <img src="{{ asset('assets/dist/img/message.png') }}" alt="message Image" class="img-size-50">
                      </div>
                      <div class="product-info">
                        <a href="{{ url('admin/reply_contact_messsage/'.$message->id) }}" class="product-title">{{ $message->name }}
                          @if ($message->replied == 0)
                            <span class="badge badge-warning float-right">Not Replied </span>
                          @elseif ($message->replied == 1)
                            <span class="badge badge-success float-right">Replied </span>
                          @endif
                        </a>
                        <span class="product-description">
                          {{ date("D", strtotime($posted->created_at)) }}, {{ date("M", strtotime($posted->created_at)) }} {{ date("j", strtotime($posted->created_at)) }}, {{ date("Y", strtotime($posted->created_at)) }}

                        </span>
                      </div>
                    </li>
                  @empty
                    
                  @endforelse
                  
                </ul>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{ route('contact.message') }}" class="uppercase">View All Messages</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection