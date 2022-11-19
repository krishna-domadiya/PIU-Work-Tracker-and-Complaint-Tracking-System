@include('pages.session')
  <!DOCTYPE html>
<html>
<head>
  @include('layouts.stylesheet')
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>   
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

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
    <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                <h3>{{ $user }}</h3>
    
                  <p>Number of Users</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                <h3>{{ $admin }}</h3>
                  <p>Admins</p>
                </div>
                <div class="icon">
                  <i class="ion ion-clipboard"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <h3>{{$piu_auth}}</h3>
    
                  <p>PIU Authorities</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                <h3>{{$piu_staff}}</h3>
    
                  <p>PIU Staff</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
              </div>
            </div>
            <!-- ./col -->
          </div>
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
                    <th>Complain Name</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Campus</th>
                    <th>Status</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Approximate Date</th>
                    <th>reason</th>
                    <th>Approve</th>
                    <th>Emergency</th>
                    <th>View</th>
                  </tr>
                  </thead>
                  <tbody>
                      @if(count($data) > 0)
                      @php $id1=1 @endphp
                          @foreach ($data as $value)
                          <tr>
                              <td class="nr">{{$id1}}</td> 
                              <td>{{$value->firstname}} {{$value->lastname}}</td> 
                              <td>{{$value->comp_name}}</td>
                              <td>{{$value->type_name}}</td>
                              <td>{{$value->description}}</td> 
                              <td>{{$value->camp_name}}</td> 
                              <td>{{$value->status}}</td> 
                              <td>{{$value->start_date}}</td> 
                              <td>{{$value->comp_date}}</td>
                              <td>{{$value->app_comp_date}}</td>
                              <td>{{$value->reason}}</td>
                              <td>
                                  <?php
                                  if($value->is_approve==1)
                                    echo "Yes";
                                  else
                                    echo "No";
                                  ?>
                              </td> 
                              <td>
                                  <?php
                                  if($value->is_emergency==1)
                                    echo "Yes";
                                  else
                                    echo "No";
                                  ?>
                              </td> 
                              <td style="align=center;">
                                <div class="tools">
                                      <!-- Modal content --> 
                                      <input type="button" name="view" value="view" id="{{$value->cid}}" class="btn btn-info btn-xs view_data" />              
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
@include('layouts.js')
<div id="dataModal" class="modal fade">  
    <div class="modal-dialog">  
         <div class="modal-content">  
              <div class="modal-header">  
                    <h4 class="modal-title">Complain Details</h4>
                   <button type="button" class="close" data-dismiss="modal">&times;</button>    
              </div>  
              <div class="modal-body" id="employee_detail">  
              </div>  
              <div class="modal-footer">  
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
              </div>  
         </div>  
    </div>  
  </div>
<script>
    $(document).ready(function(){  
      $('.view_data').click(function(){  
           var cid = $(this).attr("id");
            
           $.ajax({
              type:"GET",
               url:"{{url('viewtabledata')}}?cid="+cid, 
                success:function(data){  
                  if(data){
                     $('#employee_detail').html(data);  
                      $('#dataModal').modal("show");  
                  }else{
                    $('#dataModal').modal("show");
                  }
                }  
           });  
      });  
  });
</script>
<script>
  // // Get the modal
  // var modal = document.getElementById('myModal');
  
  // // Get the button that opens the modal
  // var btn = document.getElementById("myBtn");
  
  // //var btns = document.querySelectorAll('.pack.myBtn');
  // // Get the <span> element that closes the modal
  // var span = document.getElementsByClassName("close")[0];
  
  // // When the user clicks the button, open the modal
  // //[].forEach.call(btns, function(el) {
  // //	el.onclick = function() {
  //     btn.onclick = function() {
  //       modal.style.display = "block";
  //   }
  // //})
  
  // // When the user clicks on <span> (x), close the modal
  // span.onclick = function() {
  //     modal.style.display = "none";
  // }
  
  // // When the user clicks anywhere outside of the modal, close it
  // window.onclick = function(event) {
  //     if (event.target == modal) {
  //         modal.style.display = "none";
  //     }
  // }
  </script>
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
<script>  
  $(document).ready(function() {
      $('#employee_data').DataTable( {
         // "ordering": false,
          "order": [],
      "columnDefs": [ {
        "targets"  : 'no-sort',
        "orderable": false,
      },
      {
        "targets"  : 'hidden',
        "visible": false,
      }],
          "info":     false,
          "lengthMenu": [[5,10, 25, 50], [5,10, 25, 50]],
          initComplete: function () {
              this.api().columns([5,6,7,8,9,12]).every( function () {
                  var column = this;
                  var select = $('<select><option value="">All</option></select>')
                      .appendTo( $(column.header()))
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );
   
                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } ); 
                  column.data().unique().sort().each( function ( d, j ) {
                      var val = $('<div/>').html(d).text();
                      select.append( '<option value="' + val + '">' + val + '</option>' );
                  } );
              } );
          }
      } );    
  } );  
  </script>
  
  
</body>
</html>
