<div class="modal fade" id="UpdateTypeModal">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Update Products</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form id="UpdateJobTypeFORM" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                <div id="resp"></div>
                <br>
                <input type="hidden" name="type_id" id="type_id">
                    <div class="row">
                        <div class="col-sm-4">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Select Category</label>
                                <select class="custom-select" name="catId" id="edit_catId">
                                    <option value="">--Select Category--</option>
                                    @foreach ($category as $categories)
                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Job Type Name</label>
                                <input type="text" name="name" id="edit_name" class="form-control" placeholder="Enter Product Name">

                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" name="slug" id="edit_slug" class="form-control" placeholder="Enter slug Name">

                            </div>
                        </div>
                    </div>
                   
                        

                    <div class="row">
                       
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Product Status</label>
                            <select class="custom-select" name="status" id="edit_status">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
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
                                <input type="text" name="meta_title" id="edit_meta_title" class="form-control" placeholder="Enter Meta Title">

                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Meta Keyword</label>
                                <textarea name="meta_keyword" id="edit_meta_keyword" class="form-control" rows="3" placeholder="Enter Meta Keyword"></textarea>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Meta Description</label>
                                <textarea name="meta_description" id="edit_meta_description" class="form-control" rows="3" placeholder="Enter Meta Description"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Job Type</button>
                    </div>

            </div>
        </form>

    </div>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
