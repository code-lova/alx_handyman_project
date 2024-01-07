<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete this Job Post</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this data with all it's Transaction? data cannot be recovered.
                <input type="hidden" id="job_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="delete-job-post btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>