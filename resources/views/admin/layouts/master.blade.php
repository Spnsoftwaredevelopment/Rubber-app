<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Rubber Formula">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link rel="stylesheet" href="{{ asset('css/st-style.css') }}" type="text/css">
    <!-- Form -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/select2/css/select2.min.css') }}" type="text/css">
    <!-- wizard -->
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/form-wizard/jquery.steps.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/admin/vendors/charts/apex/apexcharts.css') }}" type="text/css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Thai:wght@200;400;700&display=swap"
        rel="stylesheet">


    <!-- Include DataTables CSS and JS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script> --}}


    <!-- Include Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <style>
        /* #chart {
  max-width: 650px;
  margin: 35px auto;
} */
    </style>
</head>


<body class="navbar-fixed sidebar-nav fixed-nav">

    @include('admin.layouts.header')
    @include('admin.layouts.menu')

    <div id="main">
        @include('admin.layouts.menu')
        <div class="main-content">

            @yield('main')

            @include('admin.layouts.footer')
        </div>
    </div>
    <script src="{{ asset('assets/admin/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/guest/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/bundle.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/vendors/charts/apex/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('assets/admin/vendors/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/datepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/date.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/vmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/vmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('assets/admin/js/examples/vmap.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/dataTable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/dataTable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/dataTable/dataTables.responsive.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/js/examples/datatable.js') }}"></script> --}}
    <script src="{{ asset('assets/admin/vendors/prism/prism.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/form-wizard/jquery.steps.min.js') }}"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script> --}}


    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>








    {{-- <script type="text/javascript">
        $(document).ready(function() {
            $('#wizardMDR').steps({
                headerTag: 'h3',
                bodyTag: 'section',
                autoFocus: true,
                titleTemplate: '<span class="wizard-index">#index#</span> #title#',
                onStepChanging: function (event, currentIndex, newIndex) {
                    if (currentIndex < newIndex) {
                        var form = document.getElementById('form1'),
                            form2 = document.getElementById('form2');

                        if (currentIndex === 0) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                                form.classList.add('was-validated');
                            } else {
                                return true;
                            }
                        } else if (currentIndex === 1) {
                            if (form2.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                                form2.classList.add('was-validated');
                            } else {
                                return true;
                            }
                        } else {
                            return true;
                        }
                    } else {
                        return true;
                    }
                }
            });
        });
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
    </script>
    @yield('js-content')

</body>

</html>
