@extends('layouts.app2')

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
<script>
        var allowsubmit = false;
        $(function(){
            //on keypress 
            $('#rpassword').keyup(function(e){
                //get values 
                var pass = $('#password').val();
                var confpass = $(this).val();
                
                //check the strings
                if(pass == confpass){
                    //if both are same remove the error and allow to submit
                    $('.error').text('');
                    allowsubmit = true;
                }else{
                    //if not matching show error and not allow to submit
                    $('.error').text('Password not matching');
                    allowsubmit = false;
                }
            });
            
            //jquery form submit
            $('#form').submit(function(){
            
                var pass = $('#password').val();
                var confpass = $('#rpassword').val();
 
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
    @if (session('success'))
    alert session('success')
    @endif
<div class="register-box" style="width:600px;background-color: white">
    <div class="register-logo" style="margin-bottom: 0px; padding-top: 25px">
      <a href="../../index2.html"><b>Admin</b>LTE</a>
    </div>
  
    <div class="register-box-body">
      <p class="login-box-msg">Register a new membership</p>
  
      <form action="store1" method="post" id="form">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </div>
                        <input type="text" id="fname" name="fname" class="form-control" placeholder="First name" required>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                    <div class="form-group has-feedback">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-user"></i>
                            </div>
                            <input type="text" id="lname" name="lname" class="form-control" placeholder="Last name" required>
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
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                    </div>
                </div>               
            </div>
            <div class="col-xs-6">
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon fa fa-phone"></i>
                        </div>
                        <input type="text" name="phno" id="phno" class="form-control" placeholder="Phone Number" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6">
                    <div class="form-group has-feedback">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="glyphicon glyphicon-lock"></i>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>                         
            </div>
            <div class="col-xs-6">
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon glyphicon-log-in"></i>
                        </div>
                        <input type="password" id="rpassword" name="rpassword" class="form-control" placeholder="Retype password" required>
                    </div>
                </div>
            </div>
        </div>    
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group">
                    <select class="form-control select2" name="role" style="width: 100%;" >
                        <option selected="selected" disabled>Select Role</option>
                        {{-- <option>1</option>
                        <option>2</option>
                        <option>3</option> --}}
                         @if(count($data) > 0)
                            @foreach ($data as $value)
                                <option value="{{$value->role_id}}">{{$value->role_type}}</option>  
                            @endforeach
                        @else
                            <option>no data found</option>
                        @endif
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
        <div class="row">
            <div class="col-xs-6">
                <div class="form-group has-feedback">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="glyphicon fa fa-map-marker"></i>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter Address" style="height:84px;"></textarea>
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
    <input type="hidden" name="_token" value="{{csrf_token() }}">   
        <div class="row">
          <div class="col-xs-8">
            <div class="checkbox icheck">
            <a href="{{'/login'}}" class="text-center">Log in</a>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-xs-4">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
  
      
    </div>
    <!-- /.form-box -->
  </div>
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
@endsection