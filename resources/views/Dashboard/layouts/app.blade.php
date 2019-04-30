<!DOCTYPE html>
<html lang="en">
<head>
    @include('Dashboard.layouts.head')
</head>
<!--<body class="hold-transition skin-blue sidebar-mini">-->
<body class="hold-transition skin-purple sidebar-mini">
    <div class="wrapper">
    
        @include('Dashboard.layouts.header')
        @include('Dashboard.layouts.sidebar')
        <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   

    @yield('content')


    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        @include('Dashboard.layouts.footer')
    </div>

<script src="{{asset('dashboard/bower_components/jquery/dist/jquery.min.js')}}"></script>

<script src="{{asset('dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

<script src="{{asset('dashboard/dist/js/datatables.min.js')}}"></script>

<script src="{{asset('dashboard/dist/js/adminlte.min.js')}}"></script>
    @yield('scripts')
</body>
</html>