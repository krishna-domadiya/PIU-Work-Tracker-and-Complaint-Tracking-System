@include('pages.session')
<!DOCTYPE html>
<html>
<head>
  @include('layouts.stylesheet')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    @include('layouts.header')

  <!-- Left side column. contains the logo and sidebar -->
  @include('layouts.asidesuperadmin')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        @if (session('alert'))
        <div class="alert alert-success">
            {{ session('alert')}}
        </div> 
        @endif
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Manage Admin</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
                
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th class="no-sort">UserName</th>
                  <th>Email</th>
                  {{-- <th>Password</th> --}}
                  <th>Phone_no</th>
                  <th>Address</th>
                  <th>City</th>
                  <th class="no-sort">State</th>
                  <th>Campuse Name</th>
                  {{-- <th>Is Block</th> --}}
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($data) > 0)
                    @php $id1=1 @endphp
                        @foreach ($data as $value)
                        <tr>
                            <td class="nr">{{$id1}}</td> 
                            <td>{{$value->firstname}} {{$value->lastname}}</td>
                            <td>{{$value->email}}</td>
                            {{-- <td>{{$value->password}}</td>  --}}
                            <td>{{$value->phone_no}}</td> 
                            <td>{{$value->address}}</td> 
                            <td>{{$value->city_name}}</td> 
                            <td>{{$value->state_name}}</td> 
                            <td>{{$value->camp_name}}</td> 
                            {{-- <td>{{$value->is_block}}</td> --}}
                            <td style="align=center;">
                                <div class="tools">
                                      <!-- Modal content --> 
                                    <a href="/edit_admin/{{$value->rid}}" rel="tooltip" title="Update"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;                
                                      <!-- Modal content -->
                                    <a href="/manageadmin/{{$value->rid}}" onclick="return confirm('Are you sure you want to delete this item?');" rel="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </td>
                        </tr>
                        @php $id1++ @endphp
                        @endforeach
                    @else
                        <option>no data found</option>
                    @endif
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
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
<!-- date-range-picker -->
<script src="../assets/bower_components/moment/min/moment.min.js"></script>
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
	$(document).ready(function(){
	    $("[rel=tooltip]").tooltip({ placement: 'top'});
	});
</script>
<script>
$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var rid = button.data('rid') // Extract info from data-* attributes
  
  var modal = $(this)
  modal.find('.modal-body #rid').val('rid')
})
</script>           
</body>
</html>
