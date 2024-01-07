@extends('layouts.handyman')


@section('content')

    <!-- Page Heading -->
    <section class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $title }}</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Heading / End -->

    <!-- Page Content -->
    <section class="page-content">
        <div class="container">

            <div class="row">
                <div class="content col-md-8">

                    <div class="box mb-30">
                        <div class="job-profile-info">
                            <div class="row">
                                <div class="col-md-5">
                                    <figure class="alignnone">
                                        <img src="{{ asset('asset/images/samples/team-member-1-lg.jpg') }}" alt="">
                                    </figure>
                                </div>
                                <div class="col-md-7">
                                    <h2 class="name">C &amp; G Plastering</h2>
                                    <i class="tagline">Please write a few words about your service</i>
                                    <ul class="meta">
                                        <li>Plaster &amp; Drywall</li>
                                        <li>Painting</li>
                                    </ul>
                                    <ul class="info">
                                        <li><i class="fa fa-location-arrow"></i> Looking within 20 miles of <a href="#">London, UK</a></li>
                                        <li><i class="fa fa-clock-o"></i> Updated 4 minutes ago.</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="spacer-lg"></div>
                            
                            <h4>Description</h4>
                            <p>I am an individual with several years of experience in my line of work. CFC is a trustworthy company with a strong work ethic and excellent communications skills providing our customers with quality workmanship.</p>

                            <p>Some of our previous projects include door preparation, installation, casings around doors and windows, baseboard and shoe molding and hardware installation. We also do custom projects such as wall paneling from applied molding to recessed or raised panels, custom closet organizers, on-site custom cabinetry and fireplace mantels.</p>
                            
                            <hr class="lg">
                            
                            <h4>Location</h4>
                            <!-- Google Map -->
                            <div class="googlemap-wrapper">
                                <div id="map_canvas" class="map-canvas"></div>
                            </div>
                            <!-- Google Map / End -->
                            
                        </div>
                    </div>

                    <!-- Additional Info Tabs -->
                    <div class="tabs">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab1-1" data-toggle="tab">Reviews</a></li>
                            <li><a href="#tab1-2" data-toggle="tab">Details</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="tab1-1">
                                <!-- Comments -->
                                <div class="comments-wrapper">
                                    <h3>Reviews (5)</h3>
                                    <ol class="commentlist">
                                        <li class="comment">
                                            <div class="comment-wrapper">
                                                <div class="comment-author vcard">
                                                    <img src="images/samples/user2-sm.jpg" alt="" class="gravatar">
                                                    <h5>Jane Doe</h5>
                                                    <span class="says">says:</span>
                                                    <div class="comment-meta">
                                                        <a href="#">October 27, 2015 5:45pm</a>
                                                    </div>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                                <div class="comment-body">
                                                    If you're faced with home improvement or repair tasks, and don't have the time, I would give Handyman my highest recommendation.
                                                </div>
                                            </div>
                                        </li>
                                        <li class="comment bypostauthor">
                                            <div class="comment-wrapper">
                                                <div class="comment-author vcard">
                                                    <img src="images/samples/user1-sm.jpg" alt="" class="gravatar">
                                                    <h5>Timothy White</h5>
                                                    <span class="says">says:</span>
                                                    <div class="comment-meta">
                                                        <a href="#">October 27, 2015 5:45pm</a>
                                                    </div>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <div class="comment-body">
                                                    They worked hard and offered to help me set up my furniture once it was in my new home.
                                                </div>
                                            </div>
                                        </li>
                                       
                                    </ol>
                                </div>
                                <!-- Comments / End -->

                                <!-- Comments Form -->
                                <div id="respond" class="comment-respond">
                                    <h3 class="reply-title">Leave a review</h3>
                                    <p class="comment-notes text-muted"><i>Your email address will not be published. Required fields are marked <span class="required">*</span></i></p>

                                    <form action="#" method="POST" role="form">
                                    
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-grop__icon">
                                                    <i class="entypo user"></i>
                                                    <input type="text" class="form-control" placeholder="Name">
                                                </div>
                                                <div class="form-group form-grop__icon">
                                                    <i class="entypo mail"></i>
                                                    <input type="email" class="form-control" placeholder="Email">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <textarea name="textarea" cols="30" rows="10" class="form-control" placeholder="Comment"></textarea>
                                        </div>
                                    
                                        <button type="submit" class="btn btn-primary">Publish Review</button>
                                    </form>
                                </div>
                                <!-- Comments Form / End -->
                            </div>
                            <div class="tab-pane fade" id="tab1-2">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <h4>Skills</h4>
                                        <div class="list list__arrow2">
                                            <ul>
                                                <li>Paint</li> 
                                                <li>Drywall/Plaster Repairs</li> 
                                                <li>Shelves</li>
                                                <li>Chair Rails</li> 
                                                <li>Hardware Replacement</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <h4>Experience</h4>
                                        <div class="list list__arrow2">
                                            <ul>
                                                <li>Sink/Faucet Replacement</li> 
                                                <li>Lighting</li> 
                                                <li>Crown/Base Molding</li>
                                                <li>Electrical</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Additional Info Tabs / End -->

                </div>

                <!-- Sidebar -->
                <aside class="sidebar col-md-4">
                    <hr class="visible-sm visible-xs lg">

                    <div class="box box__color-darken mb-30">
                        <h4>Contact</h4>
                        <form action="#" method="POST" id="profile-form">
                            <div class="form-group form-grop__icon">
                                <i class="entypo user"></i>
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group form-grop__icon">
                                <i class="entypo mail"></i>
                                <input type="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group form-grop__icon">
                                <i class="entypo pencil"></i>
                                <textarea name="textarea" cols="30" rows="8" class="form-control" placeholder="Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>

                    <div class="box box__color-darken mb-30">
                        <h4>Social Profiles</h4>
                        <ul class="social-links social-links__dark">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>

                    <div class="box box__color-darken mb-30">
                        <h4>Contact Timing</h4>
                        <div class="table-responsive">
                            <table class="table table-striped business-hours">
                                <tbody>
                                    <tr>
                                        <td><i class="fa fa-clock-o"></i> Sunday</td>
                                        <td>9:00 - 18:00</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-clock-o"></i> Monday</td>
                                        <td>9:00 - 18:00</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-clock-o"></i> Tuesday</td>
                                        <td>9:00 - 18:00</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-clock-o"></i> Wednesday</td>
                                        <td>9:00 - 18:00</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-clock-o"></i> Thursday</td>
                                        <td>9:00 - 18:00</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-clock-o"></i> Friday</td>
                                        <td>9:00 - 18:00</td>
                                    </tr>
                                    <tr>
                                        <td><i class="fa fa-clock-o"></i> Saturday</td>
                                        <td>12:00 - 16:00</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Table (Bordered) / End -->
                    </div>

                    
                </aside>
                <!-- Sidebar / End -->

            </div>
        </div>
    </section>
    <!-- Page Content / End -->

@endsection