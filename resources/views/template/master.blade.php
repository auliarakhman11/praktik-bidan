<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <link rel="icon" type="image/png" href="{{asset('adminlte')}}/dist/img/IBI.png"/>
  <title>{{ $title }}</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/fontawesome-free/css/all.min.css">
  {{-- <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> --}}
  @yield('swalcss')
  @yield('chart_header')
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminlte')}}/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @livewireStyles
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    @include('template._navbar')
    @include('template._sidebar')

    @yield('content')



<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{ date('Y') }} <a href="#">Aulia Rakhman</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
@livewireScripts
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('adminlte')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('adminlte')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('adminlte')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
@yield('swaljs')
@yield('chart_footer')
{{-- <!-- SweetAlert2 -->
<script src="{{asset('adminlte')}}/plugins/sweetalert2/sweetalert2.min.js"></script> --}}
<!-- AdminLTE App -->
<script src="{{asset('adminlte')}}/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('adminlte')}}/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('adminlte')}}/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="{{asset('adminlte')}}/plugins/raphael/raphael.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="{{asset('adminlte')}}/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('adminlte')}}/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('adminlte')}}/dist/js/pages/dashboard2.js"></script>
{{-- <script type="text/javascript">
Swal.fire({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000,
      icon: 'success',
        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
})
</script> --}}
@yield('footer')
</body>
</html>
