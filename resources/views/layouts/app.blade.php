<!DOCTYPE html>
<html>
<head>
    @include('layouts.stylesheet')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <!-- header -->
    @include('layouts.header')
    <!-- end header -->
  <!-- Left side column. contains the logo and sidebar -->
    @include('layouts.aside')

  <!-- Content Wrapper. Contains page content -->
    @yield('content')
    @yield('viewcomplains')
  <!-- /.content-wrapper -->
  <!--footer-->
    @include('layouts.footer')
  <!--end footer--> 
</div>
</body>
</html>
