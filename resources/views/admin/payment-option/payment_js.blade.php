<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //This adding the Post to Database
        $(document).on('submit', '#AddPaymentOptionForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#AddPaymentOptionForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/create-payment",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400)
                    {
                        $('#res').html("");
                        let error = '<span class="alert alert-warning">'+response.message+'</span>';
                        $("#res").html(error);
                    }
                    else if(response.status == 200){
                        $('#res').html("");
                        $('#AddPaymentModal').modal('hide');
                        $('#AddPaymentModal').find('input').val("");
                        $('#AddPaymentModal').find('textarea').val("");
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);

                    }
                }
            });
        });


         //This Fetch the requested ID and data from database
         $(document).on('click', '.editPaymentBtn', function (e) {
            e.preventDefault();

            var payment_id = $(this).val();
            $('#payment_id').val(payment_id);
            $('#UpdatePaymentModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-payment/"+payment_id,
                success: function (response) {
                    //console.log(response);

                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else
                    {
                        $('#edit_payment_name').val(response.option.payment_name);
                        $('#edit_payment_details').val(response.option.payment_details);
                        $('#edit_payment_id').val(payment_id);
                    }
                }
            });
        });


         //This is for Updating the payment option
         $(document).on('submit', '#UpdatePaymentOptionForm', function (e) {
            e.preventDefault();

            var id = $('#payment_id').val();
            let EditformData = new FormData($('#UpdatePaymentOptionForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/update-payment/"+id,
                data: EditformData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400)
                    {
                        $('#resp').html("");
                        let error = '<span class="alert alert-danger">'+response.message+'</span>';
                        $("#resp").html(error);
                    }
                    else if(response.status == 404){
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#resp').html("");
                        $('#UpdatePaymentModal').modal('hide');
                        $('#UpdatePaymentModal').find('input').val("");
                        $('#UpdatePaymentModal').find('textarea').val("");
                        toastr.success(response.message);
                        $('.table').load(location.href+' .table');
                    }
                }
            });
        });



        //Activate the Payment option
        $(document).on('click', '.activate', function (e) {
            e.preventDefault();

            var id = $(this).val();

            $.ajax({
                type: "GET",
                url: "/admin/activate/"+id,
                dataType: "json",
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404)
                    {
                        $('.table').load(location.href+' .table');
                        toastr.error(response.message);
                    }
                    else{
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });
        });



    });




</script>
