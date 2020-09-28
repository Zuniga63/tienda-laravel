<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title', 'Tienda online') | Tienda Carmú</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("assets/$theme/plugins/fontawesome-free/css/all.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/adminlte.min.css")}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Estilos personalizados -->
  @yield('styles')
  <link rel="stylesheet" href="{{asset("assets/css/customs.css")}}">
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    @include("theme/$theme/layout_main_navbar")
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include("theme/$theme/layout_main_sidebar")

    <!-- Content Wrapper. Contains page content -->
    @include("theme/$theme/layout_content_wrapper")
    <!-- /.content-wrapper -->

    <!-- Main footer -->
    @include("theme/$theme/layout_main_footer");
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>

  <!-- jQuery -->
  <script src="{{asset("assets/$theme/plugins/jquery/jquery.min.js")}}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{asset("assets/$theme/plugins/bootstrap/js/bootstrap.bundle.min.js")}}"></script>
  <!-- AdminLTE App -->
  <script src="{{asset("assets/$theme/dist/js/adminlte.js")}}"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="{{asset("assets/$theme/dist/js/demo.js")}}"></script>
  <!-- Plugin of jQuery-validations -->
  <script src="{{asset("assets/$theme/plugins/jquery-validation/jquery.validate.min.js")}}"></script>
  <script src="{{asset("assets/$theme/plugins/jquery-validation/localization/messages_es.min.js")}}"></script>
  <script src="{{asset("assets/js/generalValidations.js")}}"></script>
  @yield('scriptPlugins')
  @yield('scripts')
</body>

</html>