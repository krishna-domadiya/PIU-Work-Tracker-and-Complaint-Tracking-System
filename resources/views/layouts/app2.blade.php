<!DOCTYPE html>
<html>
<head>
    @include('layouts.stylesheet')
</head>
<body class="hold-transition skin-blue sidebar-mini" >
  <!-- Left side column. contains the logo and sidebar -->
    @include('inc.message')
  <!-- Content Wrapper. Contains page content -->
    @yield('content')
    @yield('content1')
  <!-- /.content-wrapper -->
  <!--footer-->
  
  <!--end footer--> 
</body>
</html>
