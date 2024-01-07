
<div class="modal fade" id="AddJobModal">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Add Job Type</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="AddJobFORM" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div id="res"></div>
                <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Select Job Category</label>
                                <select class="custom-select" name="catId">
                                    <option value="">--Select Job Category--</option>
                                    @foreach ($category as $categories)
                                        <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Product Name">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" name="slug" class="form-control" placeholder="Enter slug Name">

                            </div>
                        </div>
                    </div>
                    
                  
                    <div class="row">
                        
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
                    <hr>
                    <h4>SEO DATA</h4>
                    <div class="row">
                      
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Meta Title</label>
                                <input type="text" name="meta_title" class="form-control" placeholder="Enter Meta Title">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="3" placeholder="Enter Meta Keyword"></textarea>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="3" placeholder="Enter Meta Description"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Job Type</button>
                    </div>

            </div>
        </form>

    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
