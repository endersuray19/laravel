<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="web icon" type="photo" href="{{ asset ('assets/dist/img/logo-esta-vet.png') }}">
    <title>Sistem Informasi Keuangan Koperasi | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset ('assets/dist/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset ('assets/dist/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset ('assets/dist/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset ('assets/dist/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset ('assets/dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset ('assets/dist/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset ('assets/dist/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset ('assets/dist/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- Alert Js -->
    <link rel="stylesheet" href="{{ asset ('assets/dist/css/alert.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        @include('anggota.layouts.header')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <!-- Sidebar -->
        @include('anggota.layouts.sidebar')
        <!-- Sidebar -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="padding: 15px; background-color:#F0F8FF;">
        @yield('content')
        </div>
        <!-- /.content-wrapper -->

        <!-- Footer -->
        @include('anggota.layouts.footer')
        <!-- /. Footer-->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset ('assets/dist/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset ('assets/dist/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset ('assets/dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset ('assets/dist/plugins/chart.js/Chart.min.js') }}"></scrip>
    <!-- Sparkline -->
    <script src="{{ asset ('assets/dist/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset ('assets/dist/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset ('assets/dist/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset ('assets/dist/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset ('assets/dist/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset ('assets/dist/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset ('assets/dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset ('assets/dist/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset ('assets/dist/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset ('assets/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset ('assets/dist/js/pages/dashboard.js') }}"></script>
     <!-- DataTables -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @stack('myscript')

</body>

</html>
