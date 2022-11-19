<style type="text/css">
  ul li a.ex1:hover{background-color:#000080 !important; color: white !important;}
  ul li a.ex1:active {color: white !important;}
  ul li a span.ex2:hover{color:white !important;}
</style>
@php
    $fname=Session::get('fname');
@endphp
<aside class="main-sidebar" style="background-color:white;padding-top:140px;">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="../assets/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p style="color:black">{{ $fname }}</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
  
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li>
      <a href="/superadmin" class="ex1" style="color: black;">
              <i class="fa fa-dashboard"></i>
              <span class="ex2" >Dashboard</span>
            </a>
      </li>
      <li>
      <a href="/addcampus" class="ex1" style="color: black;">
          <i class="fa fa-files-o"></i>
          <span>Add Campus</span>  
        </a>  
      </li>
      <li>
        <a href="/add_admin"  class="ex1" style="color: black;">
          <i class="fa fa-th"></i> <span>Add Admin</span>         
        </a>
      </li>
      <li class="ex1">
          <a href="/manageadmin" class="ex1" style="color: black;">
            <i class="fa fa-laptop"></i>
            <span>Manage Admin</span>
            </a>
        </li>
        <li>
            <a href="/addcomplain" class="ex1" style="color: black;">
                    <i class="fa fa-dashboard"></i>
                    <span class="ex2" >Add Complain Type</span>
                  </a>
            </li>
          <li class="ex1">
            <a href="/logout" class="ex1" style="color: black;">
              <i class="fa fa-user"></i>
              <span>Logout</span>
              </a>
          </li>
        
  </section>
  <!-- /.sidebar -->
</aside>