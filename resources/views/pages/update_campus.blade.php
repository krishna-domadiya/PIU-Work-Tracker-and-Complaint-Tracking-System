@include('pages.session')
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
  @include('layouts.stylesheet')
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
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="register-box" style="width:600px;background-color: white">
                            <div class="register-logo" style="margin-bottom: 0px">
                                 <a class="fsize">Update Campus Details</a>
                            </div>
                            <div class="register-box-body">
                                <form action="/update_campus/{{$camp_id}}" method="post" id="form">
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group has-feedback">
                                                <div class="input-group" style="width:560px">
                                                    <input type="text" id="cname" name="camp_name" class="form-control" value="{{$data->camp_name}}" placeholder="campus name" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group has-feedback">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="glyphicon glyphicon-envelope"></i>
                                                    </div>
                                                    <input type="email" name="email" id="email" class="form-control" value="{{$data->email}}" placeholder="Email" required>
                                                </div>
                                            </div>               
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group has-feedback">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="glyphicon fa fa-phone"></i>
                                                    </div>
                                                    <input type="text" name="phno" id="phno" class="form-control" value="{{$data->phone_no}}" placeholder="Phone Number" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row"></div>    
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <div class="form-group has-feedback">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="glyphicon fa fa-map-marker"></i>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address" style="height:84px;">{{$data->address}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <div class="form-group">
                                                    <select class="form-control select2" id="state" name="state" style="width: 100%;">
                                                    <option selected="selected" value="{{$data->state_name}}" disabled>{{$data->state_name}}</option>
                                                        @if(count($state) > 0)
                                                        @foreach ($state as $value)
                                                        <option value="{{$value->state_id}}">{{$value->state_name}}</option>  
                                                        @endforeach
                                                        @else
                                                            <option>no data found</option>
                                                        @endif
                                                    </select>
                                                </div>    
                                                <div class="form-group">
                                                    <select class="form-control select2" id="city" name="city" style="width: 100%;" >
                                                            <option selected="selected" value="{{$data->city_name}}" disabled>{{$data->city_name}}</option> 
                                                    </select>
                                                </div>                
                                            </div>
                                        </div> 
                                        <input type="hidden" name="_token" value="{{csrf_token() }}">   
                                        <div class="row">
                                            <div class="col-xs-8"></div>
                                            <!-- /.col -->
                                            <div class="col-xs-4">
                                                <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                    </form>
                                </div>
                            <!-- /.form-box -->
                            </div>
                        </div>
                    </div>
                </div>
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
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  });
  $(document).ready(function(){
	    $("[rel=tooltip]").tooltip({ placement: 'top'});
	});
</script>
<script type="text/javascript">
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