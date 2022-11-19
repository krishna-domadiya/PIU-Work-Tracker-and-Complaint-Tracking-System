@extends('layouts.app2')
@section('content1')
<style>
input[type=text], textarea,
input[type=number],input[type=email],
input[type=password] {
  -webkit-transition: all 0.30s ease-in-out;
  -moz-transition: all 0.30s ease-in-out;
  -ms-transition: all 0.30s ease-in-out;
  -o-transition: all 0.30s ease-in-out;
  outline: none;
  padding: 3px 0px 3px 3px;
  border: 1px solid #DDDDDD;
}
input::placeholder {
  font:bold;
}
input[type=text]:focus,
input[type=number]:focus,
input[type=email]:focus,
input[type=password]:focus,
 textarea:focus {
  box-shadow: 0 0 5px rgba(0, 0, 128, 0.9);
  padding: 3px 0px 3px 3px;
  border: 1px solid rgba(0, 0, 128, 0.9);
}
</style>
<script type="text/javascript">
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") 
        {
           x.type = "text";
        }
        else 
        {
            x.type = "password";
        }
}
</script>

<div class="login-box" style="margin:8% auto;background-color: white">
        <span class="logo-lg" style="background-color:white; height:100px;" >
                <img src="../assets/logotrans.png" style="display:block; margin-left:auto; margin-right:auto; width:30%;padding-top:10px">
            </span>
  <div class="login-logo" style="margin-bottom: 0px;">
    <b>PIU W.T.C.T</b>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{'login'}}" method="post">
        <div class="form-group has-feedback">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="glyphicon glyphicon-envelope"></i>
                </div>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
        </div>       
        <div class="form-group has-feedback">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="glyphicon glyphicon-lock"></i>
                    </div>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif  
                </div>
            </div> 
            <div class="form-group has-feedback">
                    <div class="input-group">
                        <input type="checkbox" onclick="myFunction()">Show Password
                    </div>
                </div>               
      <div class="row">
        {{-- <div class="col-xs-7">
                <a href="#">I forgot my password</a><br>
                <a href="{{'/registration'}}" class="text-center">Register a new membership</a>
        </div> --}}
        <!-- /.col -->
        <div class="col-xs-5" style="float: right">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    <!-- /.social-auth-links -->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- iCheck -->
@endsection