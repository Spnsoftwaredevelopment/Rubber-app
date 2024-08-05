<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Rubber Formula">
    <title>Rubber</title>
    <!-- Main styles for this application -->
    <link rel="shortcut icon" href="{{ asset('assets/admin/media/image/favicon.png') }}" />
    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/bundle.css') }}" type="text/css">
    <!-- Datepicker -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/datepicker/daterangepicker.css') }}" type="text/css">
    <!-- Data Table -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/dataTable/dataTables.min.css') }}" type="text/css">
    <!-- Prism -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/prism/prism.css') }}" type="text/css">
    <!-- Vmap -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/vmap/jqvmap.min.css') }}">
    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/app.min.css') }}" type="text/css">

    <!-- GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@200;400;700&display=swap"
        rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<body class="navbar-fixed sidebar-nav fixed-nav">



    <div id="main">

        <div class="main-content">

            @yield('main')
            @include('admin.layouts.footer')
        </div>
    </div>


    <!-- Plugin scripts -->
    <script src="{{ asset('assets/admin/vendors/bundle.js') }}"></script>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{ asset('assets/admin/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/libs/tether.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/libs/pace.min.js') }}"></script>
    <!-- Plugin scripts -->
    <script src="{{ asset('assets/admin/vendors/bundle.js') }}"></script>
    <!-- Chartjs -->
    <script src="{{ asset('assets/admin/vendors/charts/chartjs/chart.min.js') }}"></script>
    <!-- Apex chart -->
    <script src="{{ asset('assets/admin/vendors/charts/apex/apexcharts.min.js') }}"></script>
    <!-- Circle progress -->
    <script src="{{ asset('assets/admin/vendors/circle-progress/circle-progress.min.js') }}"></script>
    <!-- Peity -->
    <script src="{{ asset('assets/admin/vendors/charts/peity/jquery.peity.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/examples/charts/peity.js') }}"></script>
    <!-- Datepicker -->
    <script src="{{ asset('assets/admin/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/date.js') }}"></script>
    <!-- Slick -->
    <script src="{{ asset('asstes/admin/venders/slick/slick.min.js') }}"></script>
    <!-- Vamp -->
    <script src="{{ asset('assets/admin/vendors/vmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/vmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('assets/admin/js/examples/vmap.js') }}"></script>
    <!-- Data Table -->
    <script src="{{ asset('assets/admin/vendors/dataTable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/dataTable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/dataTable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/examples/datatable.js') }}"></script>
    <!-- Prism -->
    <script src="{{ asset('assets/admin/vendors/prism/prism.js') }}"></script>
    <!-- Advande Form -->
    <script src="{{ asset('assets/admin/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.js') }}"></script>

    <!-- Dashboard scripts -->
    <script src="{{ asset('assets/admin/js/examples/dashboard.js') }}"></script>
    <div class="colors"> <!-- To use theme colors with Javascript -->
        <div class="bg-primary"></div>
        <div class="bg-primary-bright"></div>
        <div class="bg-secondary"></div>
        <div class="bg-secondary-bright"></div>
        <div class="bg-info"></div>
        <div class="bg-info-bright"></div>
        <div class="bg-success"></div>
        <div class="bg-success-bright"></div>
        <div class="bg-danger"></div>
        <div class="bg-danger-bright"></div>
        <div class="bg-warning"></div>
        <div class="bg-warning-bright"></div>
    </div>

    <!-- App scripts -->
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>

    <script src="{{ asset('assets/admin/vendors/form-wizard/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('assets/js/examples/form-wizard.js') }}"></script>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script>
    <!-- Ensure jQuery is included before this script -->



</body>

</html>
