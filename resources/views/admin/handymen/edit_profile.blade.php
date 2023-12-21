@extends('layouts.admin')




@section('content')


     <!-- Start::app-content -->
     <div class="main-content app-content">
        <div class="container-fluid">

            <!-- Page Header -->
            <div class="my-4 page-header-breadcrumb d-flex align-items-center justify-content-between flex-wrap gap-2">
                <div>
                    <h1 class="page-title fw-medium fs-18 mb-2">Profile</h1>
                    <div class="">
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                
            </div>
            <!-- Page Header Close -->

            <!-- Start:: row-1 -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card custom-card">
                        <div class="card-body">
                            <div class="d-sm-flex flex-wrap align-items-top gap-5 p-2 border-bottom-0">
                                <div>
                                    <div class="d-flex align-items-center gap-2 mb-4">
                                        <div class="lh-1">
                                            @if ($userProfile->user_image == null)
                                                <span class="avatar avatar-xxl avatar-rounded online me-3">
                                                    <img src="{{ asset('assets/images/faces/21.jpg') }}" alt="">
                                                </span>
                                            @else
                                                <span class="avatar avatar-xxl avatar-rounded online me-3">
                                                    <img src="{{ asset('uploads/handyman_image/'.$userProfile->user_image) }}" alt="">
                                                </span>
                                            @endif
                                            
                                        </div>
                                        <div class="flex-fill main-profile-info">
                                            <div class="d-flex align-items-center justify-content-between mb-1">
                                                <h6 class="fw-medium mb-1">{{ $userProfile->name }}</h6>
                                            </div>
                                            @if ($userProfile->job_title == null && $userProfile->job_category == null)
                                                <p class="mb-1 text-muted op-7">Job Title Null (Job category Null)</p>
                                                
                                            @else
                                                <p class="mb-1 text-muted op-7">{{ $userProfile->job_title }} ({{ $userProfile->job_category }})</p>
                                                
                                            @endif
                                            <p class="fs-12 mb-0 op-5">
                                                <span class="me-3"><i class="ri-building-line me-1 align-middle"></i>{{ $userProfile->location }}</span> 
                                            @if ($userProfile->state == null)
                                                <span><i class="ri-map-pin-line me-1 align-middle"></i>State Null</span> 
                                            @else
                                                <span><i class="ri-map-pin-line me-1 align-middle"></i>{{ $userProfile->state }}</span> 
                                            @endif
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-sm-flex justify-content-center mb-0">
                                        <div class="me-sm-3 mb-2 border p-3 border-dashed rounded">
                                            <p class="fw-bold fs-20 text-shadow mb-0">113 Jobs</p>
                                            <p class="mb-0 fs-11 op-5">Completed</p>
                                        </div>
                                        <div class="me-sm-3 mb-2 border p-3 border-dashed rounded">
                                            <p class="fw-bold fs-20 text-shadow mb-0">4 Stars</p>
                                            <p class="mb-0 fs-11 op-5">Start Ratings</p>
                                        </div>
                                        <div class="me-0 me-sm-3 mb-2 border p-3 border-dashed rounded">
                                            <p class="fw-bold fs-20 text-shadow mb-0">128</p>
                                            <p class="mb-0 fs-11 op-5">Job Posts</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="professional-bio">
                                    <div class="mb-4">
                                        <p class="fs-15 mb-3 fw-medium">Professional Bio :</p>
                                        @if ($userProfile->description == null)
                                            <p class="fs-12 text-muted op-7 mb-0">
                                                I am <b class="text-default">{{ $userProfile->name }},</b> here by conclude that,i am the 
                                               description of the handyman employee goes here.
                                            </p>
                                        @else
                                            <p class="fs-12 text-muted op-7 mb-0">
                                                I am <b class="text-default">{{ $userProfile->name }},</b> {{ $userProfile->description }}
                                            </p>
                                        @endif
                                        
                                    </div>   
                                    <div class="mb-0">
                                        <p class="fs-15 mb-2 fw-medium">Links :</p>
                                        <div class="mb-0">
                                            <p class="mb-0">
                                                <a href="https://themeforest.net/user/spruko/portfolio" target="_blank" class="text-primary"><u>API of the user profile: no authentication only for admin</u></a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="fs-15 mb-3 me-4 fw-medium">Contact Information :</p>
                                    <div class="text-muted">
                                        <p class="mb-4">
                                            <span class="avatar avatar-sm avatar-rounded me-2 bg-light border text-muted">
                                                <i class="ri-mail-line align-middle fs-14"></i>
                                            </span>
                                            {{ $userProfile->email }}
                                        </p>
                                        <p class="mb-4">
                                            <span class="avatar avatar-sm avatar-rounded me-2 bg-light border text-muted">
                                                <i class="ri-phone-line align-middle fs-14"></i>
                                            </span>
                                            {{ $userProfile->phone }}
                                        </p>
                                        @if ($userProfile->address == null)
                                            <p class="mb-0">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light border text-muted">
                                                    <i class="ri-map-pin-line align-middle fs-14"></i>
                                                </span>
                                                HandyMan Address: Null
                                            </p>
                                        @else
                                            <p class="mb-0">
                                                <span class="avatar avatar-sm avatar-rounded me-2 bg-light border text-muted">
                                                    <i class="ri-map-pin-line align-middle fs-14"></i>
                                                </span>
                                                {{ $userProfile->address }}
                                            </p>
                                        @endif
                                       
                                    </div>
                                </div>
                                <div class="skills-section">
                                    <p class="fs-15 mb-3 me-4 fw-medium">Skills :</p>
                                    @if ($userProfile->skills == null)
                                        <div class="d-flex align-items-center gap-2 flex-wrap mb-4">

                                            <a href="javascript:void(0);">
                                                <span class="badge bg-light border text-muted fw-medium">Skills: Null</span>
                                            </a>
                                        </div>
                                    @else
                                        <div class="d-flex align-items-center gap-2 flex-wrap mb-4">
                                            @foreach ($userProfile->skills as $val)
                                                <a href="javascript:void(0);">
                                                    <span class="badge bg-light border text-muted fw-medium">{{ $val->skills }}</span>
                                                </a>
                                            @endforeach
                                        </div>
                                    @endif
                                    
                                    <div class="d-flex align-items-center gap-3 flex-wrap">
                                        <h6 class="fw-medium mb-0">Follow :</h6>
                                        <div class="btn-list mb-0">
                                            <button class="btn btn-sm btn-icon btn-primary-light btn-wave waves-effect waves-light">
                                                <i class="ri-facebook-line fw-medium"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-secondary-light btn-wave waves-effect waves-light">
                                                <i class="ri-twitter-line fw-medium"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-warning-light btn-wave waves-effect waves-light">
                                                <i class="ri-instagram-line fw-medium"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-success-light btn-wave waves-effect waves-light">
                                                <i class="ri-github-line fw-medium"></i>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-danger-light btn-wave waves-effect waves-light">
                                                <i class="ri-youtube-line fw-medium"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End:: row-1 -->

            <!-- Start::row-2 -->
            <div class="row">
                <div class="col-xxl-3 col-xl-12">
                    <div class="card custom-card">
                        <div class="card-header">
                            <div class="card-title">
                                Personal Info
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-medium">
                                            Name :
                                        </div>
                                        <span class="fs-12 text-muted">{{ $userProfile->name }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-medium">
                                            Email :
                                        </div>
                                        <span class="fs-12 text-muted">{{ $userProfile->email }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-medium">
                                            Phone :
                                        </div>
                                        <span class="fs-12 text-muted">{{ $userProfile->phone }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-medium">
                                            Job Category :
                                        </div>
                                        @if ($userProfile->job_category == null)
                                            <span class="fs-12 text-muted">Null</span>
                                        @else
                                            <span class="fs-12 text-muted">{{ $userProfile->job_category }}</span>
                                        @endif
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-medium">
                                            Age :
                                        </div>
                                        <span class="fs-12 text-muted">28</span>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-medium">
                                            Experience :
                                        </div>
                                        @if ($userProfile->experience == null)
                                            <span class="fs-12 text-muted">Null Years</span>
                                        @else
                                            <span class="fs-12 text-muted">{{ $userProfile->experience }} Years</span>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                </div>
                <div class="col-xxl-9 col-xl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-body p-0">
                                    <div class="p-3 border-bottom border-block-end-dashed d-flex align-items-center justify-content-between">
                                        <div>
                                            <ul class="nav nav-tabs mb-0 tab-style-6 justify-content-start" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="edit-tab" data-bs-toggle="tab"
                                                        data-bs-target="#edit-tab-pane" type="button" role="tab"
                                                        aria-controls="edit-tab-pane" aria-selected="false"><i
                                                            class="ri-gift-line me-1 align-middle d-inline-block"></i>Edit</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="comment-tab" data-bs-toggle="tab"
                                                        data-bs-target="#comment-tab-pane" type="button" role="tab"
                                                        aria-controls="comment-tab-pane" aria-selected="false"><i
                                                            class="ri-bill-line me-1 align-middle d-inline-block"></i>Comments</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="jobpost-tab" data-bs-toggle="tab"
                                                        data-bs-target="#jobpost-tab-pane" type="button" role="tab"
                                                        aria-controls="jobpost-tab-pane" aria-selected="true"><i
                                                            class="ri-money-dollar-box-line me-1 align-middle d-inline-block"></i>Job Post</button>
                                                </li>
                                                {{-- <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="gallery-tab" data-bs-toggle="tab"
                                                        data-bs-target="#gallery-tab-pane" type="button" role="tab"
                                                        aria-controls="gallery-tab-pane" aria-selected="false"><i
                                                            class="ri-exchange-box-line me-1 align-middle d-inline-block"></i>Gallery</button>
                                                </li> --}}
                                            </ul>
                                        </div>   
                                        <div>
                                            <p class="fw-medium mb-2">Complete your profile - <a href="javascript:void(0);" class="text-primary fs-12">Finish now</a></p>
                                            <div class="progress progress-xs progress-animate">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%"></div>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="p-3">
                                        <div class="tab-content" id="myTabContent">

                                            <div class="tab-pane fade p-0 border-0" id="edit-tab-pane"
                                                role="tabpanel" aria-labelledby="edit-tab" tabindex="0">

                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <p class="mb-2 text-muted">Name:</p>
                                                    <input type="text" name="name" class="form-control" id="input" value="{{ $userProfile->name }}">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-label" class="form-label">Form Input With Label</label>
                                                    <input type="text" class="form-control" id="input-label">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-placeholder" class="form-label">Form Input With Placeholder</label>
                                                    <input type="text" class="form-control" id="input-placeholder" placeholder="Placeholder">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-text" class="form-label">Type Text</label>
                                                    <input type="text" class="form-control" id="input-text" placeholder="Text">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-number" class="form-label">Type Number</label>
                                                    <input type="number" class="form-control" id="input-number" placeholder="Number">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-password" class="form-label">Type Password</label>
                                                    <input type="password" class="form-control" id="input-password" placeholder="Password">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-email" class="form-label">Type Email</label>
                                                    <input type="email" class="form-control" id="input-email" placeholder="Email@xyz.com">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-tel" class="form-label">Type Tel</label>
                                                    <input type="tel" class="form-control" id="input-tel" placeholder="+1100-2031-1233">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-date" class="form-label">Type Date</label>
                                                    <input type="date" class="form-control" id="input-date">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-week" class="form-label">Type Week</label>
                                                    <input type="week" class="form-control" id="input-week">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-month" class="form-label">Type Month</label>
                                                    <input type="month" class="form-control" id="input-month">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-time" class="form-label">Type Time</label>
                                                    <input type="time" class="form-control" id="input-time">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-datetime-local" class="form-label">Type datetime-local</label>
                                                    <input type="datetime-local" class="form-control" id="input-datetime-local">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-search" class="form-label">Type Search</label>
                                                    <input type="search" class="form-control" id="input-search" placeholder="Search">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-submit" class="form-label">Type Submit</label>
                                                    <input type="submit" class="form-control" id="input-submit" value="Submit">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-reset" class="form-label">Type Reset</label>
                                                    <input type="reset" class="form-control" id="input-reset">
                                                </div>
                                                <div class="col-xl-12 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input-button" class="form-label">Type Button</label>
                                                    <input type="button" class="form-control btn btn-primary" id="input-button"  value="Button">
                                                </div>


                                            </div>


                                            <div class="tab-pane fade p-0 border-0" id="comment-tab-pane"
                                                role="tabpanel" aria-labelledby="comment-tab" tabindex="0">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="d-sm-flex align-items-center lh-1">
                                                            <div class="me-3">
                                                                <span class="avatar avatar-md avatar-rounded">
                                                                    <img src="../assets/images/faces/9.jpg" alt="">
                                                                </span>
                                                            </div>  
                                                           
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item" id="profile-posts-scroll">
                                                        <div class="row gy-3">
                                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                <div class="rounded border">
                                                                    <div class="p-3 d-flex align-items-top flex-wrap">
                                                                        <div class="me-2">
                                                                            <span class="avatar avatar-sm avatar-rounded">
                                                                                <img src="../assets/images/faces/9.jpg" alt="">
                                                                            </span>
                                                                        </div>
                                                                        <div class="flex-fill">
                                                                            <p class="mb-1 fw-medium lh-1">You</p>
                                                                            <p class="fs-11 mb-2 text-muted">24, Dec - 04:32PM</p>
                                                                            <p class="fs-12 text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                                                             <p class="fs-12 text-muted mb-3">As opposed to using 'Content here &#128076;</p>
                                                                             <div class="d-flex align-items-center justify-content-between mb-md-0 mb-2">
                                                                                <div>
                                                                                    <div class="btn-list">
                                                                                        <button class="btn btn-primary-light btn-sm btn-wave">
                                                                                            Comment
                                                                                        </button>
                                                                                        <button class="btn btn-icon btn-sm btn-success-light btn-wave">
                                                                                            <i class="ri-thumb-up-line"></i>
                                                                                        </button>
                                                                                        <button class="btn btn-icon btn-sm btn-danger-light btn-wave">
                                                                                            <i class="ri-share-line"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex align-items-top">
                                                                            <div>
                                                                                <span class="badge bg-primary-transparent me-2">Fashion</span>
                                                                            </div>
                                                                            <div class="dropdown">
                                                                                <button class="btn btn-sm btn-icon btn-light btn-wave" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                    <i class="ti ti-dots-vertical"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Delete</a></li>
                                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Hide</a></li>
                                                                                    <li><a class="dropdown-item" href="javascript:void(0);">Edit</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                </div>  
                                                            </div>
                                                            <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                                                <div class="rounded border">
                                                                    <div class="p-3 d-flex align-items-top flex-wrap">
                                                                        <div class="me-2">
                                                                            <span class="avatar avatar-sm avatar-rounded">
                                                                                <img src="../assets/images/faces/9.jpg" alt="">
                                                                            </span>
                                                                        </div>
                                                                        <div class="flex-fill">
                                                                            <p class="mb-1 fw-medium lh-1">You</p>
                                                                            <p class="fs-11 mb-2 text-muted">26, Dec - 12:45PM</p>
                                                                            <p class="fs-12 text-muted mb-1">Shared pictures with 4 of friends <span>Hiren,Sasha,Biden,Thara</span>.</p>
                                                                            <div class="d-flex lh-1 justify-content-between mb-3">
                                                                                <div>
                                                                                    <a href="javascript:void(0);">
                                                                                        <span class="avatar avatar-md me-1">
                                                                                            <img src="../assets/images/media/media-52.jpg" alt="">
                                                                                        </span>
                                                                                    </a>    
                                                                                    <a href="javascript:void(0);">
                                                                                        <span class="avatar avatar-md me-1">
                                                                                            <img src="../assets/images/media/media-56.jpg" alt="">
                                                                                        </span>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                             <div class="d-flex align-items-center justify-content-between mb-md-0 mb-2">
                                                                                <div>
                                                                                    <div class="btn-list">
                                                                                        <button class="btn btn-primary-light btn-sm btn-wave">
                                                                                            Comment
                                                                                        </button>
                                                                                        <button class="btn btn-icon btn-sm btn-success-light btn-wave">
                                                                                            <i class="ri-thumb-up-line"></i>
                                                                                        </button>
                                                                                        <button class="btn btn-icon btn-sm btn-danger-light btn-wave">
                                                                                            <i class="ri-share-line"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div class="d-flex align-items-top">
                                                                                <div>
                                                                                    <span class="badge bg-success-transparent me-2">Nature</span>
                                                                                </div>
                                                                                <div class="dropdown">
                                                                                    <button class="btn btn-sm btn-icon btn-light btn-wave" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                                        <i class="ti ti-dots-vertical"></i>
                                                                                    </button>
                                                                                    <ul class="dropdown-menu">
                                                                                        <li><a class="dropdown-item" href="javascript:void(0);">Delete</a></li>
                                                                                        <li><a class="dropdown-item" href="javascript:void(0);">Hide</a></li>
                                                                                        <li><a class="dropdown-item" href="javascript:void(0);">Edit</a></li>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>    
                                                                            <div class="avatar-list-stacked d-block mt-4 text-end">
                                                                                <span class="avatar avatar-xs avatar-rounded">
                                                                                    <img src="../assets/images/faces/2.jpg" alt="img">
                                                                                </span>
                                                                                <span class="avatar avatar-xs avatar-rounded">
                                                                                    <img src="../assets/images/faces/8.jpg" alt="img">
                                                                                </span>
                                                                                <span class="avatar avatar-xs avatar-rounded">
                                                                                    <img src="../assets/images/faces/2.jpg" alt="img">
                                                                                </span>
                                                                                <span class="avatar avatar-xs avatar-rounded">
                                                                                    <img src="../assets/images/faces/10.jpg" alt="img">
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>  
                                                                </div>  
                                                            </div>
                                                            
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="text-center">
                                                            <button class="btn btn-primary-light btn-wave">Show All</button>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="tab-pane show active fade p-0 border-0" id="jobpost-tab-pane"
                                                role="tabpanel" aria-labelledby="jobpost-tab" tabindex="0">
                                                <div class="row">
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card custom-card shadow-none border">
                                                            <div class="card-body p-4">
                                                                <div class="text-center">
                                                                    <span class="avatar avatar-xl avatar-rounded">
                                                                        <img src="../assets/images/faces/2.jpg" alt="">
                                                                    </span>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0 fw-medium">Samantha May</p>
                                                                        <p class="fs-12 op-7 mb-1 text-muted">samanthamay2912@gmail.com</p>
                                                                        <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list">
                                                                    <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                    <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card custom-card shadow-none border">
                                                            <div class="card-body p-4">
                                                                <div class="text-center">
                                                                    <span class="avatar avatar-xl avatar-rounded">
                                                                        <img src="../assets/images/faces/15.jpg" alt="">
                                                                    </span>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0 fw-medium">Andrew Garfield</p>
                                                                        <p class="fs-12 op-7 mb-1 text-muted">andrewgarfield98@gmail.com</p>
                                                                        <span class="badge bg-success-transparent rounded-pill">Team Lead</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list">
                                                                    <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                    <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card custom-card shadow-none border">
                                                            <div class="card-body p-4">
                                                                <div class="text-center">
                                                                    <span class="avatar avatar-xl avatar-rounded">
                                                                        <img src="../assets/images/faces/5.jpg" alt="">
                                                                    </span>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0 fw-medium">Jessica Cashew</p>
                                                                        <p class="fs-12 op-7 mb-1 text-muted">jessicacashew143@gmail.com</p>
                                                                        <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list">
                                                                    <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                    <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card custom-card shadow-none border">
                                                            <div class="card-body p-4">
                                                                <div class="text-center">
                                                                    <span class="avatar avatar-xl avatar-rounded">
                                                                        <img src="../assets/images/faces/11.jpg" alt="">
                                                                    </span>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0 fw-medium">Simon Cowan</p>
                                                                        <p class="fs-12 op-7 mb-1 text-muted">jessicacashew143@gmail.com</p>
                                                                        <span class="badge bg-warning-transparent rounded-pill">Team Manager</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list">
                                                                    <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                    <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card custom-card shadow-none border">
                                                            <div class="card-body p-4">
                                                                <div class="text-center">
                                                                    <span class="avatar avatar-xl avatar-rounded">
                                                                        <img src="../assets/images/faces/7.jpg" alt="">
                                                                    </span>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0 fw-medium">Amanda nunes</p>
                                                                        <p class="fs-12 op-7 mb-1 text-muted">amandanunes45@gmail.com</p>
                                                                        <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list">
                                                                    <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                    <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12">
                                                        <div class="card custom-card shadow-none border">
                                                            <div class="card-body p-4">
                                                                <div class="text-center">
                                                                    <span class="avatar avatar-xl avatar-rounded">
                                                                        <img src="../assets/images/faces/12.jpg" alt="">
                                                                    </span>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0 fw-medium">Mahira Hose</p>
                                                                        <p class="fs-12 op-7 mb-1 text-muted">mahirahose9456@gmail.com</p>
                                                                        <span class="badge bg-info-transparent rounded-pill">Team Member</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list">
                                                                    <button class="btn btn-sm btn-light btn-wave">Block</button>
                                                                    <button class="btn btn-sm btn-primary btn-wave">Unfollow</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="text-center mt-4">
                                                            <button class="btn btn-primary-light btn-wave">Show All</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            {{-- <div class="tab-pane fade p-0 border-0" id="gallery-tab-pane"
                                                role="tabpanel" aria-labelledby="gallery-tab" tabindex="0">
                                                <div class="row">
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-40.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-40.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-41.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-41.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-42.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-42.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-43.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-43.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-44.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-44.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-45.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-45.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-46.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-46.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-60.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-60.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-26.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-26.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-32.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-32.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-30.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-30.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                                        <a href="../assets/images/media/media-31.jpg" class="glightbox card" data-gallery="gallery1">
                                                            <img src="../assets/images/media/media-31.jpg" alt="image" >
                                                        </a>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="text-center mt-4">
                                                            <button class="btn btn-primary-light btn-wave">Show All</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> --}}

                                        </div>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End::row-2 -->

        </div>
    </div>
    <!-- End::app-content -->




@endsection