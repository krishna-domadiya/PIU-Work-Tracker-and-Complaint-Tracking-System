@include('pages.session')
<!DOCTYPE html>
<html>
<head>
  @include('layouts.stylesheet')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
  .glyphicon {  margin-bottom: 10px;margin-right: 10px;}

.c {
display: block;
line-height: 1.428571429;
color: #999;
}
.clsDatePicker{
  z-index: 100000;
}
@media screen and (min-width: 758px){
.modal-dialog {
    right: 0px;
    left: -100px;
    width: 0px;
    padding-top: 0px;
    padding-bottom: 0px;
  }
}
.set{
  width: 20px;
}
</style>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.asidepiuauth')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      {{-- second Row --}}
      @include('pages.countcomplain')
        <!------ Include the above in your HEAD tag ---------->
        
        <div class="container" style="overflow-x:auto; width: fit-content;">
            <div class="row">
                <div class="col-xs-10" align:"Left" style="margin-left:40px;margin-right: 40px;">
                    <div class="well well-sm">
                        <div class="row">
                            <div class="col-sm-4">
                              <img src="{{$data->photo}}" alt="" class="img-rounded img-responsive" style="width:400px;" />
                            </div>
                            <div class="col-sm-8">
                                <h3>
                                Category: {{$data->comp_name}}</h3>
                                {{-- <small><cite title="San Francisco, USA">San Francisco, USA <i class="glyphicon glyphicon-map-marker">
                                </i></cite></small> --}}
                                <h4>Problem Type: {{$data->type_name}}</h4 >
                                <h4 class="c"> Description: {{$data->description}}</h4>
                                <h4><i class="fa fa-building-o  " style="margin-bottom:9px;margin-right:10px;"></i>Campus: {{$data->camp_id}}</h4>
                                <h4><i class="glyphicon glyphicon-map-marker"></i>Location: {{$data->location}}</h4>
                                <h4 style="display: inline">Status: </h4>
                                  <h5 id="hello" style="display: inline">{{$data->status}}</h5>
                                <div class="row" style="position: relative;padding-left: 15px;padding-right: 15px;">
                                    <div class="col-sm-6" style="padding-left: 0px;padding-right: 0px;"><h4>Start Date: {{$data->start_date}}</h4></div>
                                    <div class="col-sm-6" style="padding-left: 0px;padding-right: 0px;"><h4>Complete Date: {{$data->comp_date}}</h4></div>
                                </div>
                                <h4></i>Emergency: &nbsp; @if (($data->is_emergency)==0)
                                    <i class="fa fa-check"></i>
                                @else
                                    <i class="fa fa-close"></i>
                                @endif</h4>
                                    <h4 style="display: inline">Approximate Date:</h4> &nbsp;
                                      <h4 style="display: inline">{{$data->app_comp_date}}</h4>
                                <div class="row" style="position: relative;padding-left: 15px;padding-right: 15px;padding-top: 9px;">
                                  <div class="col-sm-4" style="padding-left: 0px;padding-right: 0px;">
                                    <h4 style="display: inline">Workers Name:</h4>
                                  </div>
                                  <div class="col-sm-8" style="padding-left: 0px;padding-right: 0px;">
                                    <ul>
                                      @if (($worker->worker1)!="")
                                        <li><h4>{{$worker->worker1}}</h4></li>
                                      @endif
                                      @if (($worker->worker2)!="")
                                        <li><h4>{{$worker->worker2}}</h4></li>
                                      @endif
                                      @if (($worker->worker3)!="")
                                        <li><h4>{{$worker->worker3}}</h4></li>
                                      @endif
                                    </ul>
                                  </div>
                                </div>
                                <br>
                                @if($data->status!="Completed")
                                <div class="row" style="position: relative;padding-left: 15px;padding-right: 15px;">
                                <button type="button" class="btn btn-primary" id="btncheck" onclick="document.location.href='/setcomplete/?cid={{$data->cid}}';">Set Completed</button>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  {{-- modal --}}
    {{-- <div id="mymodal" class="modal fade" role="dialog" aria-labelledby="mymodallabel">
      <div class="modal-dialog">
        <div class="modal-content" style="width: 300px;">
          <form action="/approvedate/{{$data->cid}}" method="post">
            @csrf
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"> Set Approximate Date</h4>
              <div class="modal-body">
                  <div class="form-group">
                      <label>Date:</label>
                      <div class="form-group has-feedback">
                          <div class="input-group">
                              <div class="input-group-addon" style="">
                                  <i class="glyphicon glyphicon-calendar" style="margin: 0px;"></i>
                              </div>
                              <input type="text" name="date" id="datepicker" style="height:34px;width: 100%;" required>
                          </div>
                      </div>
                      <!-- /.input group -->
                    </div>
              </div>
              <div class="modal-footer">
                <input type="submit" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div> --}}
  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('layouts.footer2')
  <!-- bootstrap datepicker -->
  {{-- <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- bootstrap datepicker -->
<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> --}}
<!-- jQuery 3 -->
<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../assets/dist/js/new.js"></script>
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
<!-- date-range-picker -->

<script src="../assets/bower_components/moment/min/moment.min.js"></script>


 
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } );
  var id=0;
function data(name) {
  id++;
  var table = document.getElementById("dataTable");
  var row = table.insertRow(0);
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  cell2.classList.add('set');
  cell1.innerHTML = "<h4 name='data'>"+name+"</h4>";
  cell2.innerHTML = "<button type='button' class='btn btn-info' onclick='delRow(this)'><i class='fa fa-close'></i></button>";
};
function delRow(row) {
  //var i = row.parentNode.parentNode.rowIndex;
  document.getElementById('dataTable').deleteRow(row);
};

function btnrow(id,tableID)
        {
            var str123='/map';
            var table = document.getElementById(tableID);
            var date = document.getElementById("datepicker");
            var rowCount = table.rows.length;
            str123=str123+"?rowcount="+rowCount+"&&approxdate="+date.value+"&&";
            var tableRows = table.getElementsByTagName("tr");
            alert(id);
            alert(date.value);
            var j=0;
            while(j<=rowCount)
            {
                var tds = tableRows[j].getElementsByTagName("td");
                var strtAmntVal0 = tds[0].innerText;

                if(j==0)
                {
                  str123=str123+"id="+id+"&&chk"+j+"="+strtAmntVal0+"&&";
                }
                else
                {
                  str123=str123+"chk"+j+"="+strtAmntVal0+"&&";                
                }
                j++;
        
                if(j<=rowCount)
                {
                    thabhai(str123);
                }
            }
            //alert("hello");
        };

        function thabhai(str123)
        {

        alert(str123);
        window.location.href=str123;
        }
</script>   
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>      
</body>
</html>
