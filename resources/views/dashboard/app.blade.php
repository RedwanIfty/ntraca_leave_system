<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ url('public/assets/images/log.png') }}">

    <title>নৈমিত্তিক ছুটি ব্যবস্থাপনা</title>

    <!-- select2 css -->
    <link rel="stylesheet" href="{{ url('public/assets/libs/select2/css/select2.min.css') }}">
    <!-- bootstrap-datepicker css -->
    <link rel="stylesheet" href="{{ url('public/assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ url('public/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">

    <!-- Responsive datatable examples -->
    <link rel="stylesheet"
        href="{{ url('public/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ url('public/assets/css/bootstrap.min.css') }}">
    <!-- Icons Css -->
    <link rel="stylesheet" href="{{ url('public/assets/css/icons.min.css') }}">
    <!-- App Css-->
    <link rel="stylesheet" href="{{ url('public/assets/css/app.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <script src="{{ url('public/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('css')
</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <x-dashboard.navbar />
{{--        <x-dashboard.sidebar />--}}
        @include('components.dashboard.sidebar')


        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- content -->
                    @yield('content')
                    <!-- ./content -->

                    <x-dashboard.footer />
                </div>
            </div>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.js"></script>

    <script src="{{ url('public/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/node-waves/waves.min.js') }}"></script>
    <!-- select2 -->
    <script src="{{ url('public/assets/libs/select2/js/select2.min.js') }}"></script>
    <!-- bootstrap-datepicker js -->
    <script src="{{ url('public/assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ url('public/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ url('public/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('public/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
    <!-- apexcharts -->
{{--    <script src="{{ url('public/assets/libs/apexcharts/apexcharts.min.js') }}"></script>--}}
    <!-- Saas dashboard init -->
{{--    <script src="{{ url('public/assets/js/pages/saas-dashboard.init.js') }}"></script>--}}

    <script src="{{ url('public/assets/js/app.js') }}"></script>
    <script src="{{ url('public/assets/js/pages/datatables.init.js') }}"></script>
    @yield('js')
</body>

</html>
