<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{$title}}</title>
    <!-- Favicon-->
    <link rel="icon" href="" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="{{asset('admin')}}/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    @if(in_array('node-waves', $libs_elements))
    <link href="{{asset('admin')}}/plugins/node-waves/waves.css" rel="stylesheet" />
    @endif

    <!-- Animation Css -->
    @if(in_array('animate', $libs_elements))
    <link href="{{asset('admin')}}/plugins/animate-css/animate.css" rel="stylesheet" />
    @endif

    @if(in_array('sweetalert', $libs_elements))
    <!-- Sweetalert Css -->
    <link href="{{asset('admin')}}/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    @endif
    @if(in_array('colorpicker', $libs_elements))
    <!-- Sweetalert Css -->
    <link href="{{asset('admin')}}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css" rel="stylesheet" />
    @endif

    <!-- Morris Chart Css-->
    @if(in_array('morrisjs', $libs_elements))
    <link href="{{asset('admin')}}/plugins/morrisjs/morris.css" rel="stylesheet" />
    @endif
    <!-- JQuery DataTable Css -->
    @if(in_array('dataTables', $libs_elements))
    <link href="{{asset('admin')}}/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    @endif

    <!-- Bootstrap Select Css -->
    @if(in_array('bootstrap-select', $libs_elements))
    <link href="{{asset('admin')}}/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    @endif

    <!-- Dropzone Css -->
    @if(in_array('dropzone', $libs_elements))
    <link href="{{asset('admin')}}/plugins/dropzone/dropzone.css" rel="stylesheet">
    @endif



    <!-- Custom Css -->
    <link href="{{asset('admin')}}/css/style.css" rel="stylesheet">
    @forelse($customs_css as $custom_css)
    <link href="{{asset($custom_css)}}" rel="stylesheet" />
    @empty
    @endforelse
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('admin')}}/css/themes/all-themes.css" rel="stylesheet" />



</head>
<body class="theme-red">
    @include('admin.templates.blocks.header')

    <section class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="{{asset('admin')}}/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{asset('admin')}}/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    @if(in_array('bootstrap-select', $libs_elements))
    <script src="{{asset('admin')}}/plugins/bootstrap-select/js/bootstrap-select.js"></script>
    @endif
    
    @if(in_array('jquery-slimscroll', $libs_elements))
    <!-- Slimscroll Plugin Js -->
    <script src="{{asset('admin')}}/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    @endif

    <!-- Jquery Validation Plugin Css -->
    @if(in_array('validate', $libs_elements))
    <script src="{{asset('admin')}}/plugins/jquery-validation/jquery.validate.js"></script>
    @endif

     
    
    
    @if(in_array('bootstrap-notify', $libs_elements))
    <!-- Bootstrap Notify Plugin Js -->
    <script src="{{asset('admin')}}/plugins/bootstrap-notify/bootstrap-notify.js"></script>
    @endif

    @if(in_array('node-waves', $libs_elements))
    <!-- Waves Effect Plugin Js -->
    <script src="{{asset('admin')}}/plugins/node-waves/waves.js"></script>
    @endif
    @if(in_array('sweetalert', $libs_elements))
    <!-- SweetAlert Plugin Js -->
    <script src="{{asset('admin')}}/plugins/sweetalert/sweetalert.min.js"></script>
    @endif

    @if(in_array('countTo', $libs_elements))
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{asset('admin')}}/plugins/jquery-countto/jquery.countTo.js"></script>
    @endif

    @if(in_array('raphael', $libs_elements))
    <script src="{{asset('admin')}}/plugins/raphael/raphael.min.js"></script>
    @endif

    <!-- Morris Plugin Js -->
    @if(in_array('morrisjs', $libs_elements))
    <script src="{{asset('admin')}}/plugins/morrisjs/morris.js"></script>
    @endif

    <!-- Chart Plugins Js -->
    @if(in_array('bundle', $libs_elements))       
    <script src="{{asset('admin')}}/plugins/chartjs/Chart.bundle.js"></script>
    @endif

    @if(in_array('flot-charts', $libs_elements))
    <!-- Flot Charts Plugin Js -->
    <script src="{{asset('admin')}}/plugins/flot-charts/jquery.flot.js"></script>
    <script src="{{asset('admin')}}/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="{{asset('admin')}}/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="{{asset('admin')}}/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="{{asset('admin')}}/plugins/flot-charts/jquery.flot.time.js"></script>
    @endif

    @if(in_array('sparkline', $libs_elements))
    <!-- Sparkline Chart Plugin Js -->
    <script src="{{asset('admin')}}/plugins/jquery-sparkline/jquery.sparkline.js"></script>
    @endif

    @if(in_array('ckeditor', $libs_elements))
    <!--Editor JS -->
    <script src="{{asset('admin')}}/plugins/ckeditor/ckeditor.js"></script>
    @endif

    @if(in_array('dropzone', $libs_elements))
    <script src="{{asset('admin')}}/plugins/dropzone/dropzone.js"></script>
    @endif
    @if(in_array('colorpicker', $libs_elements))
    <script src="{{asset('admin')}}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
    @endif
    
    @if(in_array('dataTables', $libs_elements))
    <!--list bale-->
    <script src="{{asset('admin')}}/plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="{{asset('admin')}}/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="{{asset('admin')}}/js/pages/tables/jquery-datatable.js"></script>
    @endif

    <!-- Custom Js -->
    @forelse($custom_scripts as $custom_script)
    <script type="text/javascript" src="{{$custom_script}}"></script>
    @empty
    @endforelse

</body>

</html>