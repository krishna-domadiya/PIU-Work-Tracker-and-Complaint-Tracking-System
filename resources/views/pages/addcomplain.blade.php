@include('pages.session')
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
  @include('layouts.stylesheet')
  <style>
      .cs{
  width: 60%;
  box-shadow: 0px 2px 15px -3px rgba(0,0,0,0.75);
  margin-left: auto;
  margin-right:auto;
}
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        @include('layouts.header')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper"><!-- Left side column. contains the logo and sidebar -->
            @include('layouts.asidesuperadmin')
            <!-- Content Wrapper. Contains page content -->
            <section class="content">
                @if (session('alert'))
                    <div class="alert alert-success">
                        {{ session('alert')}}
                    </div> 
                @endif
                <div class="row">
                    {{-- <div class="col-xs-6">
                        <div class="box" >
                            <div class="box-body">
                                <div class="col-sm-3 col-md-3 col-lg-3" >
                                    <h4 style="float: right">Add Complain Type</h4>
                                </div>
                                <form action="/addcomplain" method="post" id="form">
                                    <div class="col-sm-3 col-md-3 col-lg-3">
                                        <div class="form-group has-feedback">
                                            <div class="input-group">
                                                <input type="text" id="cname" name="comp_name" class="form-control" placeholder="Complain name" required style="padding-right: 0px; margin-top: 10px;">
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="_token" value="{{csrf_token() }}">
                                    <div class="col-sm-2 col-md-2 col-lg-2">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat" style="float: left;margin-top: 10px;">Add</button>
                                    </div>
                                </form>
                            </div>       
                            <!-- /.form-box -->
                        </div>
                    </div> --}}
                {{-- </div>
                <div class="row"> --}}
                    <div class="col-xs-5">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Manage Complain</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Id</th>
                              <th>Complain Name</th>
                              <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                                 @if(count($data) > 0)
                                    @foreach ($data as $value)
                                    <tr>
                                        <td class="nr">{{$value->comp_cat_id}}</td> 
                                        <td>{{$value->comp_name}}</td>
                                        <td style="align=center;">
                                            <div class="tools">
                                                <!-- Modal content -->
                                                <a href="/deletecomplain/{{$value->comp_cat_id}}" onclick="return confirm('Are you sure you want to delete this item?');" rel="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <option>no data found</option>
                                @endif
                                    <tr>
                                        <td></td>
                                        <td>
                                            <form action="/addcomplain" method="post" id="form" onsubmit="return val2()">
                                                    <div class="form-group has-feedback">
                                                        <div class="input-group">
                                                            <input type="text" id="comp_name" name="comp_name" class="form-control" placeholder="Complain name" required style="padding-right: 0px;">
                                                        </div>  
                                                </div>
                                        </td>
                                        <td>
                                            <input type="hidden" name="_token" value="{{csrf_token() }}">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat" style="float: left;">Add</button>
                                            </form>
                                        </td>
                                    </tr>
                               
                            </tbody>
                            <tfoot>
                          </table>
                          <input type="hidden" name="_token" value="{{csrf_token() }}">  
                        
                        </div>
                        <!-- /.box-body -->
                      </div>
                      <!-- /.box -->
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-7">
                            <div class="box">
                              <div class="box-header">
                                <h3 class="box-title">Manage Complain type</h3>
                              </div>
                              <!-- /.box-header -->
                              <div class="box-body">
                                  
                                <table id="example2" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    <th>Id</th>
                                    <th>Complain Name</th>
                                    <th>Complain Type</th>
                                    <th>Delete</th>
                                  </tr>
                                  </thead>
                                  <tbody>
                                       @if(count($data1) > 0)
                                          @foreach ($data1 as $value)
                                          <tr>
                                              <td>{{$value->type_id}}</td> 
                                              <td>{{$value->comp_name}}</td>
                                              <td>{{$value->type_name}}</td>
                                              <td style="align=center;">
                                                  <div class="tools">
                                                      <!-- Modal content -->
                                                      <a href="/deletetype/{{$value->comp_cat_id}}" onclick="return confirm('Are you sure you want to delete this item?');" rel="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
                                                  </div>
                                              </td>
                                          </tr>
                                          @endforeach
                                          @else
                                          <option>no data found</option>
                                      @endif
                                          <tr>
                                              <td></td>
                                              <td>
                                                  <form action="/addtype" method="post" id="form1" onsubmit="return val1()">
                                                    <div class="form-group">
                                                            <select class="form-control select2" id="complain_cat" name="complain_cat" style="padding-right: 0px;" >
                                                                <option selected="selected" disabled value="">Select Complain Category</option>
                                                                @if(count($data) > 0)
                                                                @foreach ($data as $value)
                                                                <option value="{{$value->comp_cat_id}}">{{$value->comp_name}}</option>  
                                                                @endforeach
                                                                @else
                                                                    <option>no data found</option>
                                                                @endif
                                                            </select>
                                                        </div> 
                                            </td>
                                              <td>
                                                <div class="form-group has-feedback">
                                                              <div class="input-group">
                                                                  <input type="text" id="type_name" name="type_name" class="form-control" placeholder="Complain name" style="padding-right: 0px;">
                                                              </div>  
                                                      </div>
                                              </td>
                                              <td>
                                                  <input type="hidden" name="_token" value="{{csrf_token() }}">
                                                      <button type="submit" class="btn btn-primary btn-block btn-flat" style="float: left;">Add</button>
                                                  </form>
                                              </td>
                                          </tr>
                                      
                                  </tbody>
                                  <tfoot>
                                </table>
                                <input type="hidden" name="_token" value="{{csrf_token() }}">  
                              
                              </div>
                              <!-- /.box-body -->
                            </div>
                            <!-- /.box -->
                          </div>
                          <!-- /.col -->    
                  </div>
                  <!-- /.row -->
            </section>
        </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>

@include('layouts.footer2')
<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable()
  })
</script>
<script type="text/javascript">
      function val1(){
    var c1=document.getElementById("complain_cat");
    var c2=document.getElementById("type_name");
    if(c1.value==""&&c2.value==""){
      alert("Enter Category and Complain Type");
      c1.focus();
      return false;
    }else{ return true;}
  } 
  
   function val2(){
    var c=document.getElementById("comp_name");
    if(c.value==""){
      alert("Enter Complain Name");
      c.focus();
      return false;
    }else{ return true;}
  }
    $('#state').change(function(){
    var stateid = $(this).val();    
    if(stateid){
        $.ajax({
           type:"GET",
           url:"{{url('get-city-list')}}?state_id="+stateid,
           success:function(res){               
            if(res){
                $("#city").empty();
                $("#city").append('<option>Select</option>');
                $.each(res,function(key,value){
                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#city").empty();
            }
           }
        });
    }else{
        $("#state").empty();
    }      
   });
</script>
          </body></html>