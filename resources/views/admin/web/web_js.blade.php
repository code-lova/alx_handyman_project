<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //Home slider setting
        $(document).on('submit', '#SliderSettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#SliderSettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/create-slider",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#res').html("");
                        let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                        $("#res").html(error);
                    }
                    else{
                        $('#res').html("");
                        $('#sections').load(location.href+' #sections');
                        toastr.success(response.message);
                    }
                }
            });

        });

        //Updating the Logo and Favicon
        $(document).on('submit', '#LogoFavSettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#LogoFavSettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/logo-favicon",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#res').html("");
                        let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                        $("#res").html(error);
                    }
                    else if(response.status == 200){
                        $('#res').html("");
                        $('#LogoFavSettingForm').find('input').val("");
                        $('#sections').load(location.href+' #sections');
                        toastr.success(response.message);
                    }
                }
            });

        });




        //Home Feature Section

         //Adding New Home Feature
         $(document).on('submit', '#HomeFeatureSettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#HomeFeatureSettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-feature",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#res').html("");
                        let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                        $("#res").html(error);
                    }
                    else{
                        $('#res').html("");
                        $('#HomeFeatureSettingForm').find('input').val("");
                        $('#HomeFeatureSettingForm').find('textarea').val("");
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });

        });



        //This Fetch the requested Home Feature ID and data from database
        $(document).on('click', '.editFeatureBtn', function (e) {
            e.preventDefault();

            var homft_id = $(this).val();
            $('#feature_id').val(homft_id);
            $('#UpdateHomeFeatureModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-home-feature/"+homft_id,
                success: function (response) {
                    //console.log(response);

                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else
                    {
                        $('#edit_icon').val(response.homeft.icon);
                        $('#edit_title').val(response.homeft.title);
                        $('#edit_details').val(response.homeft.details);
                        $('#edit_feature_id').val(feature_id);
                    }
                }
            });
        });


         //This is for Updating the Home Feature
         $(document).on('submit', '#UpdateHomeFeatureForm', function (e) {
            e.preventDefault();

            var id = $('#feature_id').val();
            let EditformData = new FormData($('#UpdateHomeFeatureForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/update-home-feature/"+id,
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
                    else if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#resp').html("");
                        $('#UpdateHomeFeatureModal').modal('hide');
                        $('#UpdateHomeFeatureModal').find('input').val("");
                        $('#UpdateHomeFeatureModal').find('textarea').val("");
                        toastr.success(response.message);
                        $('.table').load(location.href+' .table');
                    }
                }
            });
        });



        //Home Service Section

         //Adding New Home Service
         $(document).on('submit', '#HomeServiceSettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#HomeServiceSettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-service",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#reso').html("");
                        let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                        $("#reso").html(error);
                    }
                    else{
                        $('#res').html("");
                        $('#HomeServiceSettingForm').find('input').val("");
                        $('#HomeServiceSettingForm').find('textarea').val("");
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });
        });


        //This Fetch the requested Home Service ID and data from database
        $(document).on('click', '.editServiceBtn', function (e) {
            e.preventDefault();

            var homsv_id = $(this).val();
            $('#service_id').val(homsv_id);
            $('#UpdateHomeServiceModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-home-service/"+homsv_id,
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else
                    {
                        $('#edit_icon').val(response.homesv.icon);
                        $('#edit_title').val(response.homesv.title);
                        $('#edit_slug').val(response.homesv.slug);
                        $('#edit_details').val(response.homesv.details);
                        $('#edit_service_id').val(service_id);
                    }
                }
            });
        });


        //This is for Updating the Home Service Section
        $(document).on('submit', '#UpdateHomeServiceForm', function (e) {
            e.preventDefault();

            var id = $('#service_id').val();
            let EditformData = new FormData($('#UpdateHomeServiceForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/update-home-service/"+id,
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
                    else if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#resp').html("");
                        $('#UpdateHomeServiceModal').modal('hide');
                        $('#UpdateHomeServiceModal').find('input').val("");
                        $('#UpdateHomeServiceModal').find('textarea').val("");
                        toastr.success(response.message);
                        $('.table').load(location.href+' .table');
                    }
                }
            });
        });

        //HomePage Banner Setup script
        $(document).on('submit', '#HomeBannerSettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#HomeBannerSettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/create-banner",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#respo').html("");
                        let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                        $("#respo").html(error);
                    }
                    else{
                        $('#respo').html("");
                        $('#sections').load(location.href+' #sections');
                        toastr.success(response.message);
                    }
                }
            });

        });

        //About Us page scritp
        $(document).on('submit', '#AboutUsSettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#AboutUsSettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-about",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#respon').html("");
                        let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                        $("#respon").html(error);
                    }
                    else{
                        $('#respon').html("");
                        $('#sections').load(location.href+' #sections');
                        toastr.success(response.message);
                    }
                }
            });

        });

         //Why Us page scritp
         $(document).on('submit', '#WhyUsSettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#WhyUsSettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-why-us",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#resps').html("");
                        let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                        $("#resps").html(error);
                    }
                    else{
                        $('#resps').html("");
                        $('#sections').load(location.href+' #sections');
                        toastr.success(response.message);
                    }
                }
            });

        });


        //Adding New Pricing Plan
        $(document).on('submit', '#PricingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#PricingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-plan",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#resxc').html("");
                        let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                        $("#resxc").html(error);
                    }
                    else{
                        $('#resxc').html("");
                        $('#PricingForm').find('input').val("");
                        $('#PricingForm').find('textarea').val("");
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });
        });


        //This Fetch the requested Pricing ID and data from database
        $(document).on('click', '.editPlanBtn', function (e) {
            e.preventDefault();

            var plan_id = $(this).val();
            $('#pricing_id').val(plan_id);
            $('#UpdatePlanModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-plan/"+plan_id,
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else
                    {
                        $('#edit_heading').val(response.pricing.heading);
                        $('#edit_name').val(response.pricing.name);
                        $('#edit_amount').val(response.pricing.amount);
                        $('#edit_period').val(response.pricing.period);
                        $('#edit_duration').val(response.pricing.duration);
                        $('#edit_detail').val(response.pricing.detail);
                        $('#edit_search_engine').val(response.pricing.search_engine);
                        $('#edit_admin_panel').val(response.pricing.admin_panel);
                        $('#edit_https').val(response.pricing.https);
                        $('#edit_hosting_service').val(response.pricing.hosting_service);
                        $('#edit_chat_support').val(response.pricing.chat_support);
                        $('#edit_business_logo').val(response.pricing.business_logo);
                        $('#edit_pricing_id').val(pricing_id);
                    }
                }
            });
        });


        //This is for Updating the Pricing Plan
        $(document).on('submit', '#UpdatePricingFORM', function (e) {
            e.preventDefault();

            var id = $('#pricing_id').val();
            let EditformData = new FormData($('#UpdatePricingFORM')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/update-pricing/"+id,
                data: EditformData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400)
                    {
                        $('#rexo').html("");
                        let error = '<span class="alert alert-danger">'+response.message+'</span>';
                        $("#rexo").html(error);
                    }
                    else if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#rexo').html("");
                        $('#UpdatePlanModal').modal('hide');
                        $('#UpdatePlanModal').find('input').val("");
                        $('#UpdatePlanModal').find('textarea').val("");
                        toastr.success(response.message);
                        $('.table').load(location.href+' .table');
                    }
                }
            });
        });


        //Add new faq and help
        $(document).on('submit', '#FaqHelpForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#FaqHelpForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/create-faq",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#resxop').html("");
                        let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                        $("#resxop").html(error);
                    }
                    else{
                        $('#resxop').html("");
                        $('#FaqHelpForm').find('input').val("");
                        $('#FaqHelpForm').find('textarea').val("");
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });
        });


        //This Fetch the requested FAQ and Help ID and data from database
        $(document).on('click', '.editHelpBtn', function (e) {
            e.preventDefault();

            var faq_id = $(this).val();
            $('#help_id').val(faq_id);
            $('#UpdateHelpModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-faq/"+faq_id,
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else
                    {
                        $('#edit_name').val(response.faq.name);
                        $('#edit_question').val(response.faq.question);
                        $('#edit_answer').val(response.faq.answer);
                        $('#edit_help_id').val(help_id);
                    }
                }
            });
        });


         //This is for Updating the FAq
         $(document).on('submit', '#UpdateHelpFORM', function (e) {
            e.preventDefault();

            var id = $('#help_id').val();
            let EditformData = new FormData($('#UpdateHelpFORM')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/update-faq/"+id,
                data: EditformData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400)
                    {
                        $('#repps').html("");
                        let error = '<span class="alert alert-danger">'+response.message+'</span>';
                        $("#repps").html(error);
                    }
                    else if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#repps').html("");
                        $('#UpdateHelpModal').modal('hide');
                        $('#UpdateHelpModal').find('input').val("");
                        $('#UpdateHelpModal').find('textarea').val("");
                        toastr.success(response.message);
                        $('.table').load(location.href+' .table');
                    }
                }
            });
        });


        //This is for deleting the Faq
        $(document).on('click', '.deleteHelpBtn', function (e) {
            e.preventDefault();

            var faq_id = $(this).val();
            $('#deleteModal').modal('show');
            $('#del_help_id').val(faq_id);
        });

        //deleting the Faq ID
        $(document).on('click', '.delete_model_btn', function (e) {
            e.preventDefault();

            var id = $('#del_help_id').val();

            $.ajax({
                type: "DELETE",
                url: "/admin/delete-faq/"+id,
                dataType: "json",
                success: function (response) {
                    if(response.status == 404)
                    {
                        $('#deleteModal').modal('hide');
                        toastr.error(response.msg);
                    }
                    else{
                        $('#deleteModal').modal('hide');
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });
        });


         //Terms and conditions page
         $(document).on('submit', '#TermsSettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#TermsSettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-terms",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#responx').html("");
                        let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                        $("#responx").html(error);
                    }
                    else{
                        $('#responx').html("");
                        toastr.success(response.message);
                    }
                }
            });

        });


        //Privacy Policy page
        $(document).on('submit', '#PrivacyPolicySettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#PrivacyPolicySettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-privacy",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#responsex').html("");
                        let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                        $("#responsex").html(error);
                    }
                    else{
                        $('#responsex').html("");
                        toastr.success(response.message);
                    }
                }
            });

        });


         //Refund Policy page
        $(document).on('submit', '#RefundPolicySettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#RefundPolicySettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-refund",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#resssp').html("");
                        let error = '<span class="alert alert-warning">'+response.msg+'</span>';
                        $("#resssp").html(error);
                    }
                    else{
                        $('#resssp').html("");
                        toastr.success(response.message);
                    }
                }
            });

        });



         //Adding New License Plan
        $(document).on('submit', '#LicenseForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#LicenseForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-license",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#repssp').html("");
                        let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                        $("#repssp").html(error);
                    }
                    else{
                        $('#repssp').html("");
                        $('#LicenseForm').find('input').val("");
                        $('#LicenseForm').find('textarea').val("");
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });
        });


        //This Fetch the requested License ID and data from database
        $(document).on('click', '.editLicenseBtn', function (e) {
            e.preventDefault();

            var license_id = $(this).val();
            $('#license_id').val(license_id);
            $('#UpdateLicenseModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-license/"+license_id,
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else
                    {
                        $('#edit_heading').val(response.license.heading);
                        $('#edit_name').val(response.license.name);
                        $('#edit_domain').val(response.license.domain);
                        $('#edit_right_to_use').val(response.license.right_to_use);
                        $('#edit_long_term_support').val(response.license.long_term_support);
                        $('#edit_no_user_limit').val(response.license.no_user_limit);
                        $('#edit_ticket_support').val(response.license.ticket_support);
                        $('#edit_license_id').val(license_id);
                    }
                }
            });
        });


         //This is for Updating the License Plan
         $(document).on('submit', '#UpdateLicenseFORM', function (e) {
            e.preventDefault();

            var id = $('#license_id').val();
            let EditformData = new FormData($('#UpdateLicenseFORM')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/update-license/"+id,
                data: EditformData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400)
                    {
                        $('#rexopons').html("");
                        let error = '<span class="alert alert-danger">'+response.message+'</span>';
                        $("#rexopons").html(error);
                    }
                    else if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#rexopons').html("");
                        $('#UpdateLicenseModal').modal('hide');
                        $('#UpdateLicenseModal').find('input').val("");
                        toastr.success(response.message);
                        $('.table').load(location.href+' .table');
                    }
                }
            });
        });



        //This Fetch the requested Social Media Link ID and data from database
        $(document).on('click', '.editSocialBtn', function (e) {
            e.preventDefault();

            var media_id = $(this).val();
            $('#social_id').val(media_id);
            $('#UpdateSocialModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-social/"+media_id,
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else
                    {
                        $('#edit_type').val(response.media.type);
                        $('#edit_value').val(response.media.value);
                        $('#edit_social_id').val(social_id);
                    }
                }
            });
        });



        //This is for Updating the Social Media Link
        $(document).on('submit', '#UpdateSocialFORM', function (e) {
            e.preventDefault();

            var id = $('#social_id').val();
            let EditformData = new FormData($('#UpdateSocialFORM')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/update-social/"+id,
                data: EditformData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400)
                    {
                        $('#rexopons').html("");
                        let error = '<span class="alert alert-danger">'+response.message+'</span>';
                        $("#rexopons").html(error);
                    }
                    else if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#rexopons').html("");
                        $('#UpdateSocialModal').modal('hide');
                        $('#UpdateSocialModal').find('input').val("");
                        toastr.success(response.message);
                        $('.table').load(location.href+' .table');
                    }
                }
            });
        });




         //Adding New Portfolio
         $(document).on('submit', '#PortfolioForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#PortfolioForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-port",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#responses').html("");
                        let error = '<span class="alert alert-danger">'+response.msg+'</span>';
                        $("#responses").html(error);
                    }
                    else{
                        $('#responses').html("");
                        $('#PortfolioForm').find('input').val("");
                        $('#PortfolioForm').find('textarea').val("");
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });
        });


        //This Fetch the requested Portfolio ID and data from database
        $(document).on('click', '.editPortBtn', function (e) {
            e.preventDefault();

            var port_id = $(this).val();
            $('#port_id').val(port_id);
            $('#UpdatPortModal').modal('show');

            $.ajax({
                type: "GET",
                url: "/admin/fetch-portfolio/"+port_id,
                success: function (response) {
                    //console.log(response);
                    if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else
                    {
                        $('#edit_image').val(response.port.image);
                        $('#edit_timeline_desc').val(response.port.timeline_desc);
                        $('#edit_timeline_project').val(response.port.timeline_project);
                        $('#edit_port_id').val(port_id);
                    }
                }
            });
        });


         //This is for Updating the  Portfolio
         $(document).on('submit', '#UpdatePortFORM', function (e) {
            e.preventDefault();

            var id = $('#port_id').val();
            let EditformData = new FormData($('#UpdatePortFORM')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/update-portfolio/"+id,
                data: EditformData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if(response.status == 400)
                    {
                        $('#remerror').html("");
                        let error = '<span class="alert alert-danger">'+response.message+'</span>';
                        $("#remerror").html(error);
                    }
                    else if(response.status == 404)
                    {
                        toastr.error(response.message);
                    }
                    else if(response.status == 200)
                    {
                        $('#remerror').html("");
                        $('#UpdatPortModal').modal('hide');
                        $('#UpdatPortModal').find('input').val("");
                        $('#UpdatPortModal').find('textarea').val("");
                        toastr.success(response.message);
                        $('.table').load(location.href+' .table');
                    }
                }
            });
        });



        //This is for deleting the portfolio
        $(document).on('click', '.deletPortBtn', function (e) {
            e.preventDefault();

            var port_id = $(this).val();
            $('#deleteModal').modal('show');
            $('#del_port_id').val(port_id);
        });

        //deleting the portfolio ID
        $(document).on('click', '.delete_model_btn', function (e) {
            e.preventDefault();

            var id = $('#del_port_id').val();

            $.ajax({
                type: "DELETE",
                url: "/admin/delete-port/"+id,
                dataType: "json",
                success: function (response) {
                    if(response.status == 404)
                    {
                        $('#deleteModal').modal('hide');
                        toastr.error(response.msg);
                    }
                    else{
                        $('#deleteModal').modal('hide');
                        $('.table').load(location.href+' .table');
                        toastr.success(response.message);
                    }
                }
            });
        });


        //Scam page Setting
        $(document).on('submit', '#ScamSettingForm', function (e) {
            e.preventDefault();

            let formData = new FormData($('#ScamSettingForm')[0]);

            $.ajax({
                type: "POST",
                url: "/admin/store-scam",
                data: formData,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function (response) {
                    //console.log(formData);
                    if(response.status == 400)
                    {
                        $('#rexopse').html("");
                        let error = '<p style="color:red;">'+response.msg+'</p>';
                        $("#rexopse").html(error);
                    }
                    else{
                        $('#rexopse').html("");
                        toastr.success(response.message);
                    }
                }
            });

        });




    });
</script>
