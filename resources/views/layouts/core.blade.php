<!DOCTYPE html>
<html class="no-js">
     <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="icon" type="image/png" href="images/favicon.png">
        <title>IVAO Indonesia - Training Department</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="format-detection" content="telephone=no">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- Template CSS Files
        ================================================== -->
        <!-- Twitter Bootstrs CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Ionicons Fonts Css -->
        <link rel="stylesheet" href="css/ionicons.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="css/animate.css">
        <!-- Hero area slider css-->
        <link rel="stylesheet" href="css/slider.css">
        <!-- owl craousel css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/owl.theme.css">
        <link rel="stylesheet" href="css/jquery.fancybox.css">
        <!-- template main css file -->
        <link rel="stylesheet" href="css/main.css">
        <!-- responsive css -->
        <link rel="stylesheet" href="css/responsive.css">

        <link href="/vendors/pnotify/dist/pnotify.custom.min.css" rel="stylesheet">

        <link href="/css/pace-theme-corner-indicator.css" rel="stylesheet" />
        
        <!-- Template Javascript Files
        ================================================== -->
        <!-- modernizr js -->
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
        <!-- jquery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!-- owl carouserl js -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- bootstrap js -->

        <script src="js/bootstrap.min.js"></script>
        <!-- wow js -->
        <script src="js/wow.min.js"></script>
        <!-- slider js -->
        <script src="js/slider.js"></script>
        <script src="js/jquery.fancybox.js"></script>
        <!-- template main js -->
        <script src="js/main.js"></script>
        <script src="/vendors/pnotify/dist/pnotify.custom.min.js"></script>
        <script src="/js/pace.min.js"></script>
    </head>
    <body>
        @include('layouts.header')
        
        @yield('content')
            
            @include('layouts.footer')

        @if(session('success'))
        <script type="text/javascript">
            $(window).load(function() {
                new PNotify({
                    title: 'Success',
                    text: '{{ session('success') }}',
                    type: 'success'
                });
            });


        </script>
        @endif

        @if(session('error'))
        <script type="text/javascript">
            $(window).load(function() {
                new PNotify({
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    type: 'error'
                });
        </script>
        @endif

        <script type="text/javascript">
            $('#request-form').submit(function() {
                $('body').removeClass("pace-done");
                $('body').addClass("pace-running");
                $('div:first').removeClass("pace-inactive");
                $('div:first').addClass("pace-active");
            });
        </script>
                
        </body>
    </html>