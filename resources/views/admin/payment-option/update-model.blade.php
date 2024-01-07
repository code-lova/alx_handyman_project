<div class="modal fade" id="UpdatePaymentModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title">Update Payment Option</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <div id="resp"></div>
                <br>
                <form class="form-horizontal" id="UpdatePaymentOptionForm" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="payment_id" id="payment_id">

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Payment Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="payment_name" id="edit_payment_name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Payment Details</label>
                        <div class="col-sm-10">
                            <textarea id="edit_payment_details" name="payment_details" rows="6" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>

                </form>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
