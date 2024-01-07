@extends('layouts.handyman')



@section('content')

    @include('handyman.jobPost.edit_view_modal')

    @include('handyman.jobPost.markfill-modal')

    @include('handyman.jobPost.markunfill-model')

    @include('handyman.jobPost.delete-model')



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

                    <div class="table-responsive maker">
                        <table class="job-manager-jobs table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="job_title">Job Title</th>
                                    <th class="image">Company Logo</th>
                                    <th class="date">Date Posted</th>
                                    <th class="status">Status</th>
                                    <th class="expires">Expires</th>
                                    <th class="filled">Filled?</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($listing as $list)
                                <tr>
                                    <td class="job_title">
                                        <a href="#" class="job_title_link">{{ $list->job_title }}</a>
                                        <ul class="job-dashboard-actions">
                                            <li><button data-toggle="modal" value="{{ $list->id }}" data-target="#bsModal2" class="job-dashboard-action-edit editJobPostBtn">Edit/View</button></li>
                                            @if ($list->filled == 0)
                                                <li><button data-toggle="modal" value="{{ $list->id }}" data-target="#markfillModal"  class="filledBtn job-dashboard-action-mark_filled">Mark filled</button></li>
                                            @elseif ($list->filled == 1)
                                                <li><button data-toggle="modal" value="{{ $list->id }}" data-target="#markUnfillModal"  class="unFilledBtn job-dashboard-action-mark_filled">Mark Unfilled</button></li>
                                            @endif
                                          
                                            <li><button data-toggle="modal" value="{{ $list->id }}" data-target="#deleteModal" class="deleteJobPostBtn job-dashboard-action-delete">Delete</button></li>
                                        </ul>
                                    </td>
                                    <td class="status"><img width="90" height="50" src="{{ asset('uploads/job_posting/'.$list->image) }}" alt="company logo"></td>
                                    <td class="date">
                                        {{ date("D", strtotime($list->created_at)) }}, {{ date("M", strtotime($list->created_at)) }} {{ date("j", strtotime($list->created_at)) }}, {{ date("Y", strtotime($list->created_at)) }}
                                    </td>
                                    <td class="status">
                                        @if ($list->status == 1)
                                            <div class="fa fa-check"></div>
                                        @elseif ($list->status == 0)
                                            <div class="fa fa-times"></div>
                                        @endif
                                    </td>
                                    <td class="expires">
                                        {{ date("D", strtotime($list->expires_at)) }}, {{ date("M", strtotime($list->expires_at)) }} {{ date("j", strtotime($list->expires_at)) }}, {{ date("Y", strtotime($list->expires_at)) }}
                                    </td>
                                    <td class="filled">
                                        @if ($list->filled == 0)
                                            &ndash;
                                        @elseif ($list->filled == 1)
                                            <div class="fa fa-check-square text-info"></div>
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td style="text-align: center">
                                            <span>You have not posted any job yet</span>
                                        </td>
                                    </tr>
                                @endforelse
                               
                               
                            </tbody>
                        </table>
                        
                    </div>
                   
                </div>
                <div class="your-paginate">
                    {{ $listing->links() }}
                </div>
            </div>
        </section>
        <!-- Page Content / End -->

        
        
    </div>
    <!-- Main / End -->


    @section('scripts')
        <script>

             //This is to Fetch the data from database with ajax
            $(document).ready(function () {

                $(document).on('click', '.editJobPostBtn', function (e) {
                    e.preventDefault();

                    var jobpost_id = $(this).val();
                    $('#jobpost_id').val(jobpost_id);
                    $('#bsModal2').modal('show');

                    $.ajax({
                        type: "GET",
                        url: "/handyman-app/edit-jobposting/"+jobpost_id,
                        success: function (response) {
                            //console.log(response);

                            if(response.status == 404)
                            {

                                $('#res').html("");
                                let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                                $("#res").html(error);
                            }
                            else
                            {
                                $('#edit_job_title').val(response.job.job_title);
                                $('#edit_url').val(response.job.url);
                                $('#edit_job_location').val(response.job.job_location);
                                $('#edit_job_description').val(response.job.job_description);
                                $('#edit_image').val(response.job.image);
                                
                                $('#category_dd').val(response.job.job_category);
                                $('#jobtype_dd').val(response.job.job_type);

                                $('#edit_jobpost_id_id').val(jobpost_id);
                            }
                        }
                    });

                });
            });



            //fetching category and type
            $(document).ready(function () {
			$('#category_dd').change(function (e) {
				e.preventDefault();

				var IdCategory = this.value;
				//alert(IdCategory);
				$('#jobtype_dd').html('');

				$.ajax({
					type: "POST",
					url: "/handyman-app/api/fetch-jobtype",
					data: {job_category: IdCategory,_token:"{{ csrf_token() }}"},
					dataType: 'json',
					success: function (response) {
						$('#jobtype_dd').html('<option value="">Unspecified</option>');
						$.each(response.jobtype,function(postJob, val){
							$('#jobtype_dd').append('<option value="'+val.id+'"> '+val.name+' </option>')
						});
					}
				});

			});

		});


        //Updating the Job post
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            //This is for Updating the Product
            $(document).on('submit', '#UpdateJobPostFORM', function (e) {
                e.preventDefault();

                var id = $('#jobpost_id').val();
                let EditformData = new FormData($('#UpdateJobPostFORM')[0]);

                $.ajax({
                    type: "POST",
                    url: "/handyman-app/update-jobpost/"+id,
                    data: EditformData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if(response.status == 400)
                        {
                            $('#resp').html("");
                            let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                            $("#resp").html(error);
                        }
                        else if(response.status == 404)
                        {
                            alert(response.message);
                        }
                        else if(response.status == 200)
                        {
                            $('#resp').html("");
                            $('#bsModal2').modal('hide');
                            $('#bsModal2').find('input').val("");
                            command: toastr["success"](response.message, "Success")
                            toastr.options = {
                                "closeButton" : true,
                                "progressBar" : true,
                                "positionClass" : "toast-top-right",
                                "preventDublicates" : false
                            }
                            $('.maker').load(location.href+' .maker');
                        }
                    }
                });
            });



             //This is for making the job post to be marked as filled
            $(document).on('click', '.filledBtn', function (e) {
                e.preventDefault();

                var filled_id = $(this).val();
                $('#markfillModal').modal('show');
                $('#filled_id').val(filled_id);
            });
                //making the job post ID as marked filled
            $(document).on('click', '.fill_model_btn', function (e) {
                e.preventDefault();

                var id = $('#filled_id').val();

                $.ajax({
                    type: "GET",
                    url: "/handyman-app/activate-fill/"+id,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 404)
                        {
                            $('#markfillModal').modal('hide');
                            command: toastr["error"](response.message, "error")
                            toastr.options = {
                                "closeButton" : true,
                                "progressBar" : true,
                                "positionClass" : "toast-top-right",
                                "preventDublicates" : false
                            }
                        }
                        else if(response.status == 200){
                            $('#markfillModal').modal('hide');
                            $('.maker').load(location.href+' .maker');
                            command: toastr["success"](response.message, "Success")
                            toastr.options = {
                                "closeButton" : true,
                                "progressBar" : true,
                                "positionClass" : "toast-top-right",
                                "preventDublicates" : false
                            }
                        }
                    }
                });
            });



             //This is for making the job post to be marked as Unfilled
             $(document).on('click', '.unFilledBtn', function (e) {
                e.preventDefault();

                var unFilled_id = $(this).val();
                $('#markUnfillModal').modal('show');
                $('#unFilled_id').val(unFilled_id);
            });
                //making the job post ID as marked Unfilled
            $(document).on('click', '.unfill_model_btn', function (e) {
                e.preventDefault();

                var id = $('#unFilled_id').val();

                $.ajax({
                    type: "GET",
                    url: "/handyman-app/deactivate-fill/"+id,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 404)
                        {
                            $('#markUnfillModal').modal('hide');
                            command: toastr["error"](response.message, "error")
                            toastr.options = {
                                "closeButton" : true,
                                "progressBar" : true,
                                "positionClass" : "toast-top-right",
                                "preventDublicates" : false
                            }
                        }
                        else if(response.status == 200){
                            $('#markUnfillModal').modal('hide');
                            $('.maker').load(location.href+' .maker');
                            command: toastr["success"](response.message, "Success")
                            toastr.options = {
                                "closeButton" : true,
                                "progressBar" : true,
                                "positionClass" : "toast-top-right",
                                "preventDublicates" : false
                            }
                        }
                    }
                });
            });





             //This is for deleting the job post
             $(document).on('click', '.deleteJobPostBtn', function (e) {
                e.preventDefault();

                var job_id = $(this).val();
                $('#deleteModal').modal('show');
                $('#job_id').val(job_id);
            });
                //making the job post ID as marked Unfilled
            $(document).on('click', '.delete-job-post', function (e) {
                e.preventDefault();

                var id = $('#job_id').val();

                $.ajax({
                    type: "DELETE",
                    url: "/handyman-app/delete-job-post/"+id,
                    dataType: "json",
                    success: function (response) {
                        if(response.status == 404)
                        {
                            $('#deleteModal').modal('hide');
                            command: toastr["error"](response.message, "error")
                            toastr.options = {
                                "closeButton" : true,
                                "progressBar" : true,
                                "positionClass" : "toast-top-right",
                                "preventDublicates" : false
                            }
                        }
                        else if(response.status == 200){
                            $('#deleteModal').modal('hide');
                            $('.maker').load(location.href+' .maker');
                            command: toastr["success"](response.message, "Success")
                            toastr.options = {
                                "closeButton" : true,
                                "progressBar" : true,
                                "positionClass" : "toast-top-right",
                                "preventDublicates" : false
                            }
                        }
                    }
                });
            });









             
        });



          

       








        </script>
    @endsection



@endsection