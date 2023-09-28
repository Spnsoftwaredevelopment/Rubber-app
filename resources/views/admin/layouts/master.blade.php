<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="DJOP AD">
        <link rel="shortcut icon" href="{{ url('assets/admin/img/favicon.ico') }}">
        <title>DJOP AD - @yield('title')</title>
        <!-- Main styles for this application -->
        <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/admin/css/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/admin/css/lightbox.css') }}" rel="stylesheet">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" type="text/css" href="{{asset('vendor/dropzone/dist/min/dropzone.min.css')}}">
        <script src="{{asset('vendor/dropzone/dist/min/dropzone.min.js')}}" type="text/javascript"></script>

    </head>
    <body class="navbar-fixed sidebar-nav fixed-nav">
        @include('admin.layouts.header')
        @include('admin.layouts.panes')
        @include('admin.layouts.menu')

        <main class="main">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-10 col-xs-12">
                        <h1 class="h2 page-title">@yield('topic')</h1>
                    </div>

                    <div class="col-md-2 col-xs-12">
                        <div class="row pull-right">
                            @yield('tools')
                        </div>
                    </div>
                </div>
            </div>

            <ol class="breadcrumb">
                <li><a href="#">ข้อมูลสรุป</a></li>
                @yield('breadcrumb')
            </ol>

            @yield('main')
        </main>

        @include('admin.layouts.footer')
        <!-- Bootstrap and necessary plugins -->
        <script src="{{ asset('assets/admin/js/libs/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/libs/tether.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/libs/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/libs/pace.min.js') }}"></script>
        <!-- GenesisUI main scripts -->
        <script src="{{ asset('assets/admin/js/app.js') }}"></script>
        <!-- Plugins and scripts required by this views -->
        <script src="{{ asset('assets/admin/js/libs/toastr.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/libs/gauge.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/libs/moment.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/libs/daterangepicker.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/libs/select2.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/libs/jquery.maskedinput.min.js') }}"></script>

        <script src="{{ asset('assets/admin/js/libs/ion.rangeSlider.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/views/sliders.js') }}"></script>
        <script src="{{ asset('assets/admin/js/views/lightbox.js') }}"></script>

        <!-- Custom scripts required by this view -->
        <script src="{{ asset('assets/admin/js/views/forms.js') }}"></script>
        <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>

        <script src="{{ asset('assets/admin/js/libs/jquery.mCustomScrollbar.concat.min.js') }}"></script>


        <script>
                (function($){
                    $(window).on("load",function(){
                        $(".content").mCustomScrollbar({
                            theme:"dark",
                        });
                    });

                    $('.nav-dropdown').on('click',function(){
                        $(this).find('ul').toggle(300);
                    });
                })(jQuery);

        </script>

        <script>
            var editor_config = {
                path_absolute : "{{ url('/') }}/",
                selector: "textarea#editor",
                height : "300",
                image_class_list: [
                    {title: 'Response', value: 'img-fluid'},
                ],
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | forecolor backcolor",
                relative_urls: false,
                file_browser_callback : function(field_name, url, type, win) {
                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                        var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                        if (type == 'image') {
                            cmsURL = cmsURL + "&type=Images";
                        } else {
                            cmsURL = cmsURL + "&type=Files";
                        }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });

                }
            };

            tinymce.init(editor_config);
        </script>
    </body>
</html>
