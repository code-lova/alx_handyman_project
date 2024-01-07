<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="HandymanApp">
	<meta name="author" content="handyman">



    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- CSS
	================================================== -->
	<!-- Base + Vendors CSS -->
	<link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/fonts/font-awesome/css/font-awesome.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/fonts/entypo/css/entypo.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/vendor/owl-carousel/owl.carousel.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('asset/vendor/owl-carousel/owl.theme.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('asset/vendor/magnific-popup/magnific-popup.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('asset/vendor/flexslider/flexslider.css') }}" media="screen">
	<link rel="stylesheet" href="{{ asset('asset/vendor/job-manager/frontend.css') }}" media="screen">

	<!-- Theme CSS-->
	<link rel="stylesheet" href="{{ asset('asset/css/theme.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/theme-elements.css') }}">
	<link rel="stylesheet" href="{{ asset('asset/css/animate.min.css') }}">


	<!-- Head Libs -->
	<script src="{{ asset('asset/vendor/modernizr.js') }}"></script>


	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="{{ asset('asset/images/favicons/favicon.ico') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('asset/images/favicons/favicon-120.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('asset/images/favicons/favicon-152.png') }}">


     <!-- Laravel Toastr Alert Css -->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>
<body>

    <div class="site-wrapper">

        @include('layouts.inc.handyman.handyman_nav')
        <!-- Main -->
		<div class="main" role="main">

             @yield('content')

             @include('layouts.inc.handyman.handyman_footer')

        </div>


    </div>


    <!-- Javascript Files
	================================================== -->
	<script src="{{ asset('asset/vendor/jquery-1.11.0.min.js') }}"></script>
	<script src="{{ asset('asset/vendor/jquery-migrate-1.2.1.min.js') }}"></script>
	<script src="{{ asset('asset/vendor/bootstrap.js') }}"></script>
	<script src="{{ asset('asset/vendor/jquery.flexnav.min.js') }}"></script>
	<script src="{{ asset('asset/vendor/jquery.hoverIntent.minified.js') }}"></script>
	<script src="{{ asset('asset/vendor/jquery.flickrfeed.js') }}"></script>
	<script src="{{ asset('asset/vendor/magnific-popup/jquery.magnific-popup.js') }}"></script>
	<script src="{{ asset('asset/vendor/owl-carousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('asset/vendor/jquery.fitvids.js') }}"></script>
	<script src="{{ asset('asset/vendor/jquery.appear.js') }}"></script>
	<script src="{{ asset('asset/vendor/jquery.stellar.min.js') }}"></script>
	<script src="{{ asset('asset/vendor/flexslider/jquery.flexslider-min.js') }}"></script>
	<script src="{{ asset('asset/vendor/jquery.countTo.js') }}"></script>

	<!-- Newsletter Form -->
	<script src="{{ asset('asset/vendor/jquery.validate.js') }}"></script>
	<script src="{{ asset('asset/js/newsletter.js') }}"></script>

	<script src="{{ asset('asset/js/custom.js') }}"></script>

	<script>
		jQuery(function($){
			$('body').addClass('loading');
		});

		$(window).load(function(){
			$('.flexslider').flexslider({
				animation: "fade",
				controlNav: true,
				directionNav: false,
				prevText: "",
				nextText: "",
				start: function(slider){
					$('body').removeClass('loading');
				}
			});
		});
	</script>
    <!-- Toastr alert Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if(Session::has('message'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true,
          "preventDuplicates" : true
        }
              toastr.success("{{ session('message') }}");
        @endif

        @if(Session::has('error'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true,
          "preventDuplicates" : true

        }
              toastr.error("{{ session('error') }}");
        @endif

        @if(Session::has('info'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true,
          "preventDuplicates" : true

        }
              toastr.info("{{ session('info') }}");
        @endif

        @if(Session::has('warning'))
        toastr.options =
        {
          "closeButton" : true,
          "progressBar" : true,
          "preventDuplicates" : true
        }
              toastr.warning("{{ session('warning') }}");
        @endif
    </script>

	@yield('scripts')

</body>
</html>
