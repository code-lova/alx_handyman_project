<!-- Modal -->
<div class="modal fade" id="bsModal2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myLargeModalLabel">View/Edit Job Post</h4>
            </div>
            <form id="UpdateJobPostFORM" method="POST" enctype="multipart/form-data">
                <div id="resp"></div>
                <input type="hidden" name="jobpost_id" id="jobpost_id">

                <div class="modal-body">

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <fieldset class="fieldset-company_logo">
                                    <label for="company_logo">Company Logo <small>(optional)</small></label>
                                    <div class="field">
                                        <input type="file" class="form-control" placeholder="Company Logo" name="image" id="company_logo" />
                                        <small class="description">
                                        Max. file size: 1 MB.</small>
                                    </div>

                                </fieldset>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <!-- Job Information Fields -->
                                <fieldset class="fieldset-job_title">
                                    <label for="url"> URL</label>
                                    <div class="field">
                                        <input type="text" class="form-control" name="url" id="edit_url"/>
                                    </div>
                                
                                </fieldset>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <!-- Job Information Fields -->
                                <fieldset class="fieldset-job_title">
                                    <label for="job_title">Job Title <span class="required">*</span></label>
                                    <div class="field">
                                        <input type="text" class="form-control" name="job_title" id="edit_job_title"/>
                                    </div>
                                    
                                </fieldset>
                            </div>
                        </div>


                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                            <!-- Job Information Fields -->
                                <fieldset class="fieldset-job_title">
                                    <label for="job_title">Job Location <span class="required">*</span></label>
                                    <div class="field">
                                        <input type="text" class="form-control" name="job_location" id="edit_job_location"/>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                    </div>

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
                               
                            </fieldset>
                        </div>
                        <div class="col-md-6">
                            <fieldset class="fieldset-job_type">
                                <label for="job_type">Job Type</label>
                                <div class="field select-style">
                                    <select name="job_type" id="jobtype_dd" class="form-control">
                                        <option>Unspecified</option>
                                        @foreach ($jobType as $val)
                                            <option value="{{ $val->id }}" {{ $val->id ? 'selected':'' }}>
                                                {{ $val->name }}
                                            </option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                                
                            </fieldset>
                        </div>
                        
                    </div>
                    <br>
                    <hr>

                    <fieldset class="fieldset-job_description">
                        <label>Description</label>
                        <div class="field">
                            <textarea name="job_description" id="edit_job_description" cols="30" rows="8" class="form-control"></textarea>
                        </div>
                    </fieldset>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>