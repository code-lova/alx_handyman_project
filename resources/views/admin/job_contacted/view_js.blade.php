<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         //This Fetch the requested Home Service ID and data from database
         $(document).on('click', '.viewDesBtn', function (e) {
            e.preventDefault();

            var detail_id = $(this).val();
            $('#details_id').val(detail_id);
            $('#viewDescription').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-description/"+detail_id,
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#view_title').val(response.description.job_title);
                        $('#view_cat').val(response.description.job_category);
                        $('#view_type').val(response.description.job_type);
                        $('#view_location').val(response.description.job_location);
                        $('#view_details').val(response.description.details);                       
                    }
                }
            });
        });



    });



</script>