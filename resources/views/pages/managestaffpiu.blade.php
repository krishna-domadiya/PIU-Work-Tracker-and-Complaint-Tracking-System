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
  @include('layouts.asideadmin')
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
            <form action="/filter" method="POST">
              {{-- @csrf --}}
              <div class="box-header">
                <div class="col-sm-3">
                  <h5 style="display: inline;"><b>Select Role:</b></h5>
                  <select name="role" class="form-control" style="overflow: scroll;width: fit-content;display: inline;">
                    <option>ALL</option>
                    @foreach ($role as $item)
                      <option>{{$item->role_type}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-sm-3" style="float: left">
                  <input type="submit" class="btn btn-primary btn-block btn-flat" style="width: 80px;"  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="col-sm-6">
                <h3 class="box-title">Manage</h3>
              </div>
              </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
                
                <table id="example1" class="table table-bordered table-striped" style="width: 100%">
                <thead>
                <tr>
                  <th>User Id</th>
                  <th class="no-sort">First Name</th>
                  <th class="no-sort">Last Name</th>
                  <th>Email</th>
                  <th>Phone_no</th>
                  <th>Role</th>
                  @isset($no)
                  @if ($no==5)   
                  <th>Complain</th>
                  <th>Complain Type</th>
                @endif
                  @endisset
                  
                  <th>Address</th>
                  <th>City</th>
                  <th>State</th>
                  <th>Campuse Name</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($data) > 0)
                    @php $id1=1 @endphp
                        @foreach ($data as $value)
                        
                        <tr>
                            <td class="nr">{{$id1}}</td> 
                            <td>{{$value->firstname}}</td> 
                            <td>{{$value->lastname}}</td>
                            <td>{{$value->email}}</td> 
                            <td>{{$value->phone_no}}</td>
                            <td>@if ($value->role_id==3)
                                PIU Authority
                              @elseif ($value->role_id==4)
                                Hospital Staff
                              @else
                                PIU Staff
                              @endif</td>
                              @isset($no)
                              @if ($no==5)
                              <td>{{$value->comp_name}}</td>
                              <td>{{$value->type_name}}</td>
                            @endif
                              @endisset
                            
                            <td>{{$value->address}}</td> 
                            <td>{{$value->city_name}}</td> 
                            <td>{{$value->state_name}}</td> 
                            <td>{{$value->camp_name}}</td> 
                            <td style="align=center;">
                                <div class="tools">
                                      <!-- Modal content --> 
                                    <a href="/edit_staff_piu/{{$value->rid}}" rel="tooltip" title="Update"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;&nbsp;                
                                      <!-- Modal content -->
                                    <a href="/manage_staff_piu/{{$value->rid}}" onclick="return confirm('Are you sure you want to delete this item?');" rel="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>
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
$(document).ready(function() {
        $('#example1').DataTable( {
            //responsive: true,
            "scrollX": true,
            dom: 'lBfrtip',
            buttons : [ {
                extend : 'excel',
                text : 'Export to Excel',
                exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12 ]
                    }
            } ],
           // "ordering": false,
            "order": [],
        "columnDefs": [ {
          "targets"  : 'no-sort',
          "orderable": false,
        },
        {
          "targets"  : 'hidden',
          "visible": false,
          "searchable": false,
        }],
            "info":     false,
            "lengthMenu": [[10, 25, 50], [10, 25, 50]],
            initComplete: function () {
              this.api().columns([6]).every( function () {
                var column = this;
                console.log(column);
                var select = $("#rolefilter"); 
                select.append('<option value="ALL">ALL</option>' )
                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );
           }
        } );
    $('#rolefilter').on('change',function(){

     city=this.value;
     if(city!="ALL")
     {
     $('#employee_data').dataTable().fnFilter(city,6)
      }
      else
      {
        $('#employee_data').dataTable().fnFilter("",6)
      }
    })
   
        $('input.column_filter').on( 'keyup click', function () {
            //debugger;
            filterColumn( $(this).parents('tr').attr('data-column') );
        } );    
    } );
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
