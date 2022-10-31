<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets\images\log.png') }}">

    <title>নৈমিত্তিক ছুটি ব্যবস্থাপনা</title>

    <!-- select2 css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/select2/css/select2.min.css') }}">
    <!-- bootstrap-datepicker css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">

    <!-- Responsive datatable examples -->
    <link rel="stylesheet"
        href="{{ asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- Icons Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}">
    <!-- App Css-->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.js"></script>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
</head>

<body data-sidebar="dark">
    <div id="layout-wrapper">
        <x-dashboard.navbar />
        <x-dashboard.sidebar />

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <!-- content -->
                    @yield('main_contant')
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

    <script src="{{ asset('assets\libs\bootstrap\js\bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets\libs\metismenu\metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets\libs\simplebar\simplebar.min.js') }}"></script>
    <script src="{{ asset('assets\libs\node-waves\waves.min.js') }}"></script>
    <!-- select2 -->
    <script src="{{ asset('assets\libs\select2\js\select2.min.js') }}"></script>
    <!-- bootstrap-datepicker js -->
    <script src="{{ asset('assets\libs\bootstrap-datepicker\js\bootstrap-datepicker.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('assets\libs\datatables.net\js\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets\libs\datatables.net-bs4\js\dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('assets\libs\datatables.net-responsive\js\dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets\libs\datatables.net-responsive-bs4\js\responsive.bootstrap4.min.js') }}"></script>
    <!-- apexcharts -->
    <script src="{{ asset('assets\libs\apexcharts\apexcharts.min.js') }}"></script>
    <!-- Saas dashboard init -->
    <script src="{{ asset('assets\js\pages\saas-dashboard.init.js') }}"></script>

    <script src="{{ asset('assets\js\app.js') }}"></script>
    <script src="{{ asset('assets\js\pages\datatables.init.js') }}"></script>
</body>

</html>
