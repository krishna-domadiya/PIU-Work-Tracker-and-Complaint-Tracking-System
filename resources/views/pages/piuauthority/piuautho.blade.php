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
  @include('layouts.asidepiuauth')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
      {{-- second Row --}}
      @include('pages.countcomplain')
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Complain</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
                
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Comp No</th>
                  <th>Name</th>
                  <th class="no-sort">Complain</th>
                  <th class="no-sort">Type</th>
                  <th>Description</th>
                  <th>location</th>
                  <th>Status</th>
                  <th>Start Date</th>
                  <th>Approximate Date</th>
                  <th>End Date</th>
                  <th>Campuse Name</th>
                  <th>Approve</th>
                  <th>Emergency</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($data) >= 0)
                    @php $id1=1 @endphp
                        @foreach ($data as $value)
                        <tr>
                            <td>{{$id1}}</td>
                             <td>{{$value->firstname}} {{$value->lastname}}</td>
                             <td>{{$value->comp_name}}</td>
                            <td>{{$value->type_name}}</td>
                            <td>{{$value->description}}</td> 
                            <td>{{$value->location}}</td> 
                            <td>{{$value->status}}</td> 
                            <td>{{$value->start_date}}</td>
                            <td>{{$value->app_comp_date}}</td> 
                            <td>{{$value->comp_date}}</td>
                            <td>{{$value->camp_name}}</td>
                            <td>
                                <?php
                                if($value->is_approve==1)
                                  echo "Yes";
                                else
                                  echo "No";
                                //{{ $row->isaerbapproval }}
                                ?>
                            </td> 
                            <td>
                                <?php
                                if($value->is_emergency==1)
                                  echo "Yes";
                                else
                                  echo "No";
                                //{{ $row->isaerbapproval }}
                                ?>
                            </td> 
                            <td style="align=center;">
                                <div class="tools">
                                      <!-- Modal content --> 
                                    <a href="/showcomplain/{{$value->cid}}" align="center"><i class="fa fa-eye" align="center"></i></a>               
                                      <!-- Modal content -->
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

 
<script>
$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var cid = button.data('cid') // Extract info from data-* attributes
  
  var modal = $(this)
  modal.find('.modal-body #cid').val('cid')
})
</script>           
</body>
</html>
