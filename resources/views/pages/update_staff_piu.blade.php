@include('pages.session')
@extends('layouts.app2')
<html>
        <head>
          @include('layouts.stylesheet')
        </head>
        
        <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            @include('layouts.header')            
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper"><!-- Left side column. contains the logo and sidebar -->
            @include('layouts.asideadmin')
        
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
@section('content')
<script type="text/javascript">
    function myFunction() 
    {
        var x = document.getElementById("password");
        var y = document.getElementById("rpassword");
        if (x.type === "password" && y.type === "password") 
        {
           x.type = "text";
           y.type = "text";

        }
        else 
        {
            x.type = "password";
            y.type = "password";
        }
    }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
<div class="register-box" style="width:600px;background-color: white;margin: 5% auto;">
        
    <div class="register-logo" style="margin-bottom: 0px">
      <a>Update Admin Details</a>
    </div>
  
    <div class="register-box-body">
  
    <form action="/update_staff_piu/{{$rid}}" method="post" id="form">
          <div style=" margin-bottom: 10px">
                <h4 style="width:fit-content;margin-top:-7px;margin-left:-10px;background:white;margin-bottom:10px;">Personal Details</h4>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </div>
                        <input type="text" id="fname" name="fname" value="{{$data->firstname}}" class="form-control" placeholder="First name" required>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                    <div class="form-group has-feedback">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </div>
                            <input type="text" id="lname" name="lname" value="{{$data->lastname}}" class="form-control" placeholder="Last name" required>
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
                        <input type="email" name="email" id="email" value="{{$data->email}}" class="form-control" placeholder="Email" required>
                    </div>
                </div>               
            </div>
            <div class="col-xs-6">
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon fa fa-phone"></i>
                        </div>
                        <input type="text" name="phno" id="phno" value="{{$data->phone_no}}" class="form-control" placeholder="Phone Number" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon fa fa-map-marker"></i>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="address" name="address"  rows="3" placeholder="Enter Address" style="height:84px;">{{$data->address}}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                    <div class="form-group">
                            <select class="form-control select2" id="state" name="state" style="width: 100%;">
                                <option selected="selected" disabled>Select State</option>
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

                            </select>
                    </div>                
            </div>
        </div> 
          </div>
        <div class="row" style="">
            <h4 style="width:fit-content;margin-top:-7px;margin-left:-10px;background:white;margin-bottom:10px;">Personal Details</h4>
            <div class="col-xs-6">  
                <div class="form-group">
                    <select class="form-control select2" name="role" style="width: 100%;" >
                        <option value="{{$data->role_id}}">{{$role_type->role_type}}</option>
                     </select>
                </div>         
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <select class="form-control select2" name="campuse" style="width: 100%;" >
                        <option selected="selected" disabled>Select Campuse</option>
                        @if(count($camp) > 0)
                            @foreach ($camp as $value)
                               <option value="{{$value->camp_id}}">{{$value->camp_name}}</option>  
                            @endforeach
                        @else
                            <option>no data found</option>
                        @endif
                    </select>
                </div>         
            </div>
        </div>
        <input type="hidden" name="_token" value="{{csrf_token() }}">   
        <div class="row">
          <div class="col-xs-8">
           
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Add</button>
          </div>
          <!-- /.col -->
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
})
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
<script>
    var allowsubmit = false;
    $(function(){
        //on keypress 
        $("#rpassword").keyup(function(e){
            //get values 
            var pass = $("#password").val();
            var confpass = $(this).val();
            
            //check the strings
            if(pass == confpass){
                //if both are same remove the error and allow to submit
                $("#msg").text('');
                allowsubmit = true;
            }else{
                //if not matching show error and not allow to submit
                $("#msg").text('Password not matching').css('color','red');
                allowsubmit = false;
            }
        });
        
        //jquery form submit
        $("#form").submit(function(){
        
            var pass = $("#password").val();
            var confpass = $("#confirm_password").val();

            //just to make sure once again during submit
            //if both are true then only allow submit
            if(pass == confpass){
                allowsubmit = true;
            }
            if(allowsubmit){
                return true;
            }else{
                alert('password and confirm password do not match');
                return false;
            }
        });
    });
</script> 
</body>
</html>

@endsection