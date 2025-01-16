<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel Vue Routing</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Stylesheets -->
    <!-- Icons css -->
    <link href="{{ asset('dashboard/assets/css/icons.css') }}" rel="stylesheet" />
    <!--  Owl-carousel css-->
    <link href="{{ asset('dashboard/assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!--  Custom Scroll bar-->
    <link href="{{ asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css') }}" rel="stylesheet" />
    <!--  Sidebar css -->
    <link href="{{ asset('dashboard/assets/plugins/sidebar/sidebar.css') }}" rel="stylesheet" />
    <!-- Sidemenu css -->
    <link href="{{ asset('dashboard/assets/css-rtl/sidemenu.css') }}" rel="stylesheet" />
    <!--- Internal Morris css-->
    <link href="{{ asset('dashboard/assets/plugins/morris.js/morris.css') }}" rel="stylesheet" />
    <!--- Style css --->
    <link href="{{ asset('dashboard/assets/css-rtl/style.css') }}" rel="stylesheet" />
    <!--- Dark-mode css -->
    <link href="{{ asset('dashboard/assets/css-rtl/style-dark.css') }}" rel="stylesheet" />
    <!---Skinmodes css-->
    <link href="{{ asset('dashboard/assets/css-rtl/skin-modes.css') }}" rel="stylesheet" />
</head>

<body class="main-body app sidebar-mini dark-theme">
    <!-- Loader -->
    <div id="global-loader">
        <img src="/dashboard/assets/img/loader.svg" class="loader-img" alt="Loader" />
    </div>
    <div id="app"></div>
    <!-- JQuery min js -->
    <script src="{{asset('dashboard/assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap Bundle js -->
    <script src="{{asset('dashboard/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!--Internal  Chart.bundle js -->
    <script src="{{asset('dashboard/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{asset('dashboard/assets/plugins/ionicons/ionicons.js')}}"></script>
    <!-- Moment js -->
    <script src="{{asset('dashboard/assets/plugins/moment/moment.js')}}"></script>
    <!--Internal Sparkline js -->
    <script src="{{asset('dashboard/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- Moment js -->
    <script src="{{asset('dashboard/assets/plugins/raphael/raphael.min.js')}}"></script>
    <!--Internal  Flot js-->
    <script src="{{asset('dashboard/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/dashboard.sampledata.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/chart.flot.sampledata.js')}}"></script>
    <!-- Custom Scroll bar Js-->
    <script src="{{asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <!-- Rating js-->
    <script src="{{asset('dashboard/assets/plugins/rating/jquery.rating-stars.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/rating/jquery.barrating.js')}}"></script>
    <!-- P-scroll js -->
    <script src="{{asset('dashboard/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
    <!-- Horizontalmenu js-->
    <script src="{{asset('dashboard/assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/sidebar/sidebar-custom.js')}}"></script>
    <!-- Eva-icons js -->
    <script src="{{asset('dashboard/assets/js/eva-icons.min.js')}}"></script>
    <!-- Sticky js -->
    <script src="{{asset('dashboard/assets/js/sticky.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/modal-popup.js')}}"></script>
    <!-- Left-menu js-->
    <script src="{{asset('dashboard/assets/plugins/side-menu/sidemenu.js')}}"></script>
    <!-- Internal Map -->
    <script src="{{asset('dashboard/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!--Internal  index js -->
    <script src="{{asset('dashboard/assets/js/index-dark.js')}}"></script>

    <!-- custom js -->
    <script src="{{asset('dashboard/assets/js/custom.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/jquery.vmap.sampledata.js')}}"></script>

</body>

</html>
