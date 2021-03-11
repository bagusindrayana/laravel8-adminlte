<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title','Dashboard') | {{ env("APP_NAME") }}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin-assets/css/adminlte.min.css') }}">

        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/sweetalert2/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

        @stack('head')

        @stack('styles')
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

        <!-- Navbar -->
        @include('admin.layouts.includes.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layouts.includes.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                @yield('header')
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
            <div class="container-fluid">
                
                @yield('content')
                
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        @include('admin.layouts.includes.control-sidebar')
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('admin.layouts.includes.footer')
        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED SCRIPTS -->

        <!-- jQuery -->
        <script src="{{ asset('admin-assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('admin-assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('admin-assets/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('admin-assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

        @if(Session::has('success'))
            <script>
                Swal.fire("Success!",'{{ Session::get("success") }}','success');
            </script> 
        @endif

        @if(Session::has('info'))
            <script>
                Swal.fire("Info!",'{{ Session::get("info") }}');
            </script>
        @endif

        @if(Session::has('warning'))
            <script>
                Swal.fire("Warning!",'{{ Session::get("warning") }}','warning');
            </script>
        @endif

        @if(Session::has('error'))
            <script>
                Swal.fire("Ops!",'{{ Session::get("error") }}','error');
            </script>
        @endif

        @if (session('status'))
            <script>
                Swal.fire("Info!",'{{ session('status') }}');
            </script>
        @endif

        @stack('scripts')
    </body>
</html>
