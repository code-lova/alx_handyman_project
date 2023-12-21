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
						<div class="col-md-8 col-md-offset-2">
							<!-- Job Form -->
							<form action="#" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">

								<fieldset>
									{{-- <label>Have an account?</label> --}}
									<div class="field account-sign-in">
										{{-- <p>
											<a class="btn btn-primary btn-sm" href="#"><i class="fa fa-key"></i> Sign in</a>
										</p> --}}

										<div class="alert alert-info alert-dismissable">
											<button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
											post a joib for clients to see in your community. Easy and straight foward.
										</div>
									</div>
								</fieldset>

								<fieldset>
									<label>Your Email <span class="required">*</span></label>
									<div class="field">
										<input type="email" class="form-control" name="create_account_email" id="account_email" placeholder="you@yourdomain.com" value="" />
									</div>
								</fieldset>
								
								<!-- Job Information Fields -->
								<fieldset class="fieldset-job_title">
									<label for="job_title">Job Title</label>
									<div class="field">
										<input type="text" class="form-control" name="job_title" id="job_title" placeholder="e.g. “Painter”" />
									</div>
								</fieldset>

								<fieldset class="fieldset-job_location">
									<label for="job_location">Job Location <small>(optional)</small></label>
									<div class="field">
										<input type="text" class="form-control" name="job_location" id="job_location" placeholder="e.g. &quot;London, UK&quot;, &quot;New York&quot;, &quot;Houston, TX&quot;" />
										<small class="description">Leave this blank if the job can be done from anywhere</small>
									</div>
								</fieldset>

								<div class="row">
									<div class="col-md-6">
										<fieldset class="fieldset-job_type">
											<label for="job_type">Job Type</label>
											<div class="field select-style">
												<select name="job_type" id="job_type" class="form-control">
													<option>Unspecified</option>
													<option>Furniture Repair &amp; Refinish</option>
													<option>Pools</option>
													<option>Plaster &amp; Drywall</option>
													<option>Painting</option>
												</select>
											</div>
										</fieldset>
									</div>
									<div class="col-md-6">
										<fieldset class="fieldset-job_category">
											<label for="job_category">Job category</label>
											<div class="field select-style">
												<select name="job_category" id="job_category" class="form-control">
													<option>Unspecified</option>
													<option>Appliance Services</option>
													<option>Electrical</option>
													<option>Handiwork</option>
													<option>Plumbing</option>
													<option>Bathroom Design &amp; Remodelling</option>
												</select>
											</div>
										</fieldset>
									</div>
								</div>

								<fieldset class="fieldset-job_description">
									<label>Description</label>
									<div class="field">
										<textarea name="textarea" cols="30" rows="8" class="form-control"></textarea>
									</div>
								</fieldset>

								<fieldset class="fieldset-application">
									<label for="application">Application email/URL</label>
									<div class="field">
										<input type="text" class="form-control" name="application" id="application" placeholder="Enter an email address or website URL" />
									</div>
								</fieldset>

								<fieldset class="fieldset-company_logo">
									<label for="company_logo">Photo <small>(optional)</small></label>
									<div class="field">
										<input type="file" class="form-control" name="company_logo" id="company_logo" />
										<small class="description">
										Max. file size: 32 MB.</small>
									</div>
								</fieldset>

								<div class="spacer"></div>

								<p>
									<input type="submit" name="submit_job" class="btn btn-primary" value="Preview Job Listing &rarr;" />
								</p>

							</form>
							<!-- Job Form / End -->
						</div>
					</div>

				</div>
			</section>
			<!-- Page Content / End -->



@endsection