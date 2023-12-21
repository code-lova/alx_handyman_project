@extends('layouts.handyman')



@section('content')


    <!-- Main -->
    <div class="main" role="main">

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
                
                

                <div id="job-manager-job-dashboard">
                    <div class="alert alert-info alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                        Your job listings are shown in the table below. Expired listings will be automatically removed after 30 days.
                    </div>

                    <div class="table-responsive">
                        <table class="job-manager-jobs table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="job_title">Job Title</th>
                                    <th class="date">Date Posted</th>
                                    <th class="status">Status</th>
                                    <th class="expires">Expires</th>
                                    <th class="filled">Filled?</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="job_title">
                                        <a href="#" class="job_title_link">Carpenter</a>
                                        <ul class="job-dashboard-actions">
                                            <li><a href="#" class="job-dashboard-action-edit">Edit</a></li>
                                            <li><a href="#" class="job-dashboard-action-mark_filled">Mark filled</a></li>
                                            <li><a href="#" class="job-dashboard-action-delete">Delete</a></li>
                                        </ul>
                                    </td>
                                    <td class="date">April 3, 2015</td>
                                    <td class="status"><div class="fa fa-check"></div></td>
                                    <td class="expires">May 3, 2015</td>
                                    <td class="filled">&ndash;</td>
                                </tr>
                                <tr>
                                    <td class="job_title">
                                        <a href="#" class="job_title_link">Plumber</a>
                                        <ul class="job-dashboard-actions">
                                            <li><a href="#" class="job-dashboard-action-edit">Edit</a></li>
                                            <li><a href="#" class="job-dashboard-action-mark_filled">Mark filled</a></li>
                                            <li><a href="#" class="job-dashboard-action-delete">Delete</a></li>
                                        </ul>
                                    </td>
                                    <td class="date">April 3, 2015</td>
                                    <td class="status"><div class="fa fa-check"></div></td>
                                    <td class="expires">May 3, 2015</td>
                                    <td class="filled">&ndash;</td>
                                </tr>
                                <tr>
                                    <td class="job_title">
                                        <a href="#" class="job_title_link">Engineer</a>
                                        <ul class="job-dashboard-actions">
                                            <li><a href="#" class="job-dashboard-action-edit">Edit</a></li>
                                            <li><a href="#" class="job-dashboard-action-mark_filled">Mark filled</a></li>
                                            <li><a href="#" class="job-dashboard-action-delete">Delete</a></li>
                                        </ul>
                                    </td>
                                    <td class="date">April 3, 2015</td>
                                    <td class="status"><div class="fa fa-check"></div></td>
                                    <td class="expires">May 3, 2015</td>
                                    <td class="filled">&ndash;</td>
                                </tr>
                                <tr>
                                    <td class="job_title">
                                        <a href="#" class="job_title_link">Painter</a>
                                        <ul class="job-dashboard-actions">
                                            <li><a href="#" class="job-dashboard-action-edit">Edit</a></li>
                                            <li><a href="#" class="job-dashboard-action-mark_filled">Mark filled</a></li>
                                            <li><a href="#" class="job-dashboard-action-delete">Delete</a></li>
                                        </ul>
                                    </td>
                                    <td class="date">April 3, 2015</td>
                                    <td class="status"><div class="fa fa-check"></div></td>
                                    <td class="expires">May 3, 2015</td>
                                    <td class="filled">&ndash;</td>
                                </tr>
                                <tr>
                                    <td class="job_title">
                                        <a href="#" class="job_title_link">Solar Engineer</a>
                                        <ul class="job-dashboard-actions">
                                            <li><a href="#" class="job-dashboard-action-edit">Edit</a></li>
                                            <li><a href="#" class="job-dashboard-action-mark_filled">Mark filled</a></li>
                                            <li><a href="#" class="job-dashboard-action-delete">Delete</a></li>
                                        </ul>
                                    </td>
                                    <td class="date">April 3, 2015</td>
                                    <td class="status"><div class="fa fa-times"></div></td>
                                    <td class="expires">May 3, 2015</td>
                                    <td class="filled">&ndash;</td>
                                </tr>
                                <tr>
                                    <td class="job_title">
                                        <a href="#" class="job_title_link">Builder</a>
                                        <ul class="job-dashboard-actions">
                                            <li><a href="#" class="job-dashboard-action-edit">Edit</a></li>
                                            <li><a href="#" class="job-dashboard-action-mark_filled">Mark filled</a></li>
                                            <li><a href="#" class="job-dashboard-action-delete">Delete</a></li>
                                        </ul>
                                    </td>
                                    <td class="date">April 3, 2015</td>
                                    <td class="status"><div class="fa fa-times"></div></td>
                                    <td class="expires">May 3, 2015</td>
                                    <td class="filled">&ndash;</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </section>
        <!-- Page Content / End -->

        
        
    </div>
    <!-- Main / End -->



@endsection