<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

         //This Fetch the requested ID and data from database
         $(document).on('click', '.viewDesBtn', function (e) {
            e.preventDefault();

            var message_id = $(this).val();
            $('#message_id').val(message_id);
            $('#viewMessage').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-message/"+message_id,
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#view_message').val(response.messages.message);
                        $('#view_reply').val(response.messages.replied_message);
                        $('#view_subject').val(response.messages.subject);  
                    }
                }
            });
        });


         //This Fetch the requested message ID and data from database
         $(document).on('click', '.viewMsgBtn', function (e) {
            e.preventDefault();

            var sent_id = $(this).val();
            $('#sent_id').val(sent_id);
            $('#viewSentMessage').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-sent/"+sent_id,
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#view_sent').val(response.sent.message);
                       
                    }
                }
            });
        });



    });



</script>