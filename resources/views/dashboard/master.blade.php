<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('public/admin/production/images/favicon.ico')}}" type="image/ico"/>

    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="{{ asset('public/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('public/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('public/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('public/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('public/admin/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css ')}}"
          rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('public/admin/vendors/jqvmap/dist/jqvmap.min.css ')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('public/admin/vendors/bootstrap-daterangepicker/daterangepicker.css ')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('public/admin/build/css/custom.min.css ')}}" rel="stylesheet">

    <!-- Custom Css -->
    <link href="{{ asset('public/admin/production/css/custom/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/production/css/custom/buttons.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/production/css/custom/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/production/css/custom/jquery-ui-1.10.4.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/production/css/custom/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/production/css/custom/style-responsive.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/production/css/custom/widgets.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/production/css/custom/xcharts.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>

    <!--Date Picker -->
    {{--<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
--}}

    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
</head>
<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-12">
            <!-- Menu -->
        @include('dashboard.includes.menu')
        <!-- End Menu -->
            <!-- top navigation -->
        @include('dashboard.includes.header')
        <!-- /top navigation -->

            <!-- page content -->

        @yield('mainContent')

        <!-- /page content -->


            <!-- footer content -->
        @include('dashboard.includes.footer')
        <!-- /footer content -->
        </div>
    </div>
</div>
</body>
</html>

<!-- jQuery -->
<script src="{{ asset('public/admin/vendors/jquery/dist/jquery.min.js ')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('public/admin/vendors/bootstrap/dist/js/bootstrap.min.js ')}}"></script>
<!-- FastClick -->
<script src="{{ asset('public/admin/vendors/fastclick/lib/fastclick.js ')}}"></script>
<!-- NProgress -->
<script src="{{ asset('public/admin/vendors/nprogress/nprogress.js ')}}"></script>
<!-- Chart.js -->
<script src="{{ asset('public/admin/vendors/Chart.js/dist/Chart.min.js ')}}"></script>
<!-- gauge.js -->
<script src="{{ asset('public/admin/vendors/gauge.js/dist/gauge.min.js ')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('public/admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js ')}}"></script>
<!-- iCheck -->
<script src="{{ asset('public/admin/vendors/iCheck/icheck.min.js ')}}"></script>
<!-- Skycons -->
<script src="{{ asset('public/admin/vendors/skycons/skycons.js ')}}"></script>
<!-- Flot -->
<script src="{{ asset('public/admin/vendors/Flot/jquery.flot.js ')}}"></script>
<script src="{{ asset('public/admin/vendors/Flot/jquery.flot.pie.js ')}}"></script>
<script src="{{ asset('public/admin/vendors/Flot/jquery.flot.time.js ')}}"></script>
<script src="{{ asset('public/admin/vendors/Flot/jquery.flot.stack.js ')}}"></script>
<script src="{{ asset('public/admin/vendors/Flot/jquery.flot.resize.js ')}}"></script>
<!-- Flot plugins -->
<script src="{{ asset('public/admin/vendors/flot.orderbars/js/jquery.flot.orderBars.js ')}}"></script>
<script src="{{ asset('public/admin/vendors/flot-spline/js/jquery.flot.spline.min.js ')}}"></script>
<script src="{{ asset('public/admin/vendors/flot.curvedlines/curvedLines.js ')}}"></script>
<!-- DateJS -->
<script src="{{ asset('public/admin/vendors/DateJS/build/date.js ')}}"></script>
<!-- JQVMap -->
<script src="{{ asset('public/admin/vendors/jqvmap/dist/jquery.vmap.js ')}}"></script>
<script src="{{ asset('public/admin/vendors/jqvmap/dist/maps/jquery.vmap.world.js ')}}"></script>
<script src="{{ asset('public/admin/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js ')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('public/admin/vendors/moment/min/moment.min.js ')}}"></script>
<script src="{{ asset('public/admin/vendors/bootstrap-daterangepicker/daterangepicker.js ')}}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('public/admin/build/js/custom.min.js ')}}"></script>
<script src="{{ asset('public/admin/build/js/bootstrap-timepicker.min.js ')}}"></script>

<!-- Custom Script -->
<script src="{{ asset('public/admin/production/js/custom/buttons.html5.min.js ')}}"></script>
<script src="{{ asset('public/admin/production/js/custom/dataTables.buttons.min.js ')}}"></script>
<script src="{{ asset('public/admin/production/js/custom/jquery.dataTables.min.js ')}}"></script>
<script src="{{ asset('public/admin/production/js/custom/jszip.min.js ')}}"></script>
<script src="{{ asset('public/admin/production/js/custom/pdfmake.min.js ')}}"></script>
<script src="{{ asset('public/admin/production/js/custom/vfs_fonts.js ')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>

<!--Date Picker -->
{{--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}




@yield('script')

<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>


