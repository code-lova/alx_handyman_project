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
					<form action="{{ url('handyman-app/store-jobpost') }}" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">
						@csrf

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

						
						
						<!-- Job Information Fields -->
						<fieldset class="fieldset-job_title">
							<label for="job_title">Job Title <span class="required">*</span></label>
							<div class="field">
								<input type="text" class="form-control" name="job_title" id="job_title" placeholder="e.g. “Painter”"  value="{{ old('job_title') }}"/>
							</div>
							@error('job_title')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</fieldset>

						<fieldset class="fieldset-job_location">
							<label for="job_location">Job Location <small>(required)</small></label>
							<div class="field">
								<input type="text" value="{{ old('job_location') }}" class="form-control" name="job_location" id="job_location" placeholder="e.g. &quot;London, UK&quot;, &quot;Nigeria, Benin City&quot;, &quot;Abuja, Guarimpa&quot;" />
								<small class="description">Input "Any Where" if the job can be done from anywhere</small>
							</div>
							@error('job_location')
								<span class="text-danger">{{ $message }}</span>
							@enderror
						</fieldset>
						
						<div class="row">
							<div class="col-md-6">
								<fieldset class="fieldset-job_category">
									<label for="job_category">Job category</label>
									<div class="field select-style">
										<select name="job_category" id="category_dd" class="form-control">
											<option>Unspecified</option>
											@foreach ($jobCategory as $cat)
												<option value="{{ $cat->id }}">{{ $cat->name }}</option>
											@endforeach
											
										</select>
									</div>
									<small class="description">Job Types are based on categories selected</small>
									@error('job_category')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</fieldset>
							</div>
							<div class="col-md-6">
								<fieldset class="fieldset-job_type">
									<label for="job_type">Job Type</label>
									<div class="field select-style">
										<select name="job_type" id="jobtype_dd" class="form-control">
											<option>Unspecified</option>
											
										</select>
									</div>
									@error('job_type')
										<span class="text-danger">{{ $message }}</span>
									@enderror
								</fieldset>
							</div>
							
						</div>

						<fieldset class="fieldset-job_description">
							<label>Description</label>
							<div class="field">
								<textarea name="job_description" cols="30" rows="8" class="form-control">{{ old('job_description') }}</textarea>
							</div>
						</fieldset>

						<fieldset class="fieldset-application">
							<label for="application">Application/URL</label>
							<div class="field">
								<input type="text" class="form-control" name="url" id="url" placeholder="Enter your website URL" />
								<small class="description">Leave empty if you dont have a personal URL</small>

							</div>
						</fieldset>

						<fieldset class="fieldset-company_logo">
							<label for="company_logo">Photo <small>(optional)</small></label>
							<div class="field">
								<input type="file" class="form-control" placeholder="Company Logo" name="image" id="company_logo" {{ old('image') }} />
								<small class="description">
								Max. file size: 1 MB.</small>
							</div>
						</fieldset>

						<div class="spacer"></div>

						<p>
							<input type="submit" class="btn btn-primary" value="Post Job Listing &rarr;" />
						</p>

					</form>
					<!-- Job Form / End -->
				</div>
			</div>

		</div>
	</section>
	<!-- Page Content / End -->

	@section('scripts')
	<script>
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
	</script>
@endsection

@endsection