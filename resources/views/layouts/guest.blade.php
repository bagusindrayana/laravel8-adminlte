<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title','Login') | {{ env("APP_NAME") }}</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/fontawesome-free/css/all.min.css') }}">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('admin-assets/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/sweetalert2/sweetalert2.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin-assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

        @stack('styles')

    </head>
    <body class="hold-transition login-page">
        
        @yield('content')

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
