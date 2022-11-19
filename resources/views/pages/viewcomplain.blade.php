@include('pages.session')
<!DOCTYPE html>
<html>
<head>
  @include('layouts.stylesheet');
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
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Complain</h3>
            </div>
            <div class="row">
              <div class="col-sm-2 col-md-2 col-lg-2" align="center">  
              <label>City</label>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2" align="center">
              <label>State</label>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2" align="center">
              <label>AERB Approved</label>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2" align="center">
              <label>Playcard</label>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2" align="center">
              <label>QA Report</label>
              </div>
              <div class="col-sm-2 col-md-2 col-lg-2" align="center">
              <label>Testing Agency</label>
              </div>
              </div> 
              <div class="row">
              <div class="col-sm-2 col-md-2 col-lg-2" align="center">  <!-- onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();'-->
              <select name="city" id="cityfilter" class="btn-primary" style="overflow: scroll;"></select></div>
              <div class="col-sm-2 col-md-2 col-lg-2" align="center">
              <select name="state" id="statefilter" class="btn-primary" style="overflow: scroll;"></select></div>
              <div class="col-sm-2 col-md-2" align="center">
              <select name="" id="aerbfilter" class="btn-primary" style="overflow: scroll;"></select></div>
              <div class="col-sm-2 col-md-2" align="center">
              <select name="" id="playcardfilter" class="btn-primary" style="overflow: scroll;"></select></div>
              <div class="col-sm-2 col-md-2" align="center">
              <select name="" id="qafilter" class="btn-primary" style="overflow: scroll;"></select></div>
              <div class="col-sm-2 col-md-2" align="center">
              <select name="" id="agencyfilter" class="btn-primary" style="overflow: scroll;"></select></div>
              </div> 
              <br><br>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-x:auto;">
                
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Comp No</th>
                  <th>User Id</th>
                  <th class="no-sort">Complain</th>
                  <th class="no-sort">Type</th>
                  <th>photo</th>
                  <th>Description</th>
                  <th>location</th>
                  <th>Status</th>
                  <th>Start-End Date</th>
                  <th>reason</th>
                  <th class="no-sort">Role</th>
                  <th>Is Approve</th>
                  <th>Is Emergency</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($data) > 0)
                        @foreach ($data as $value)
                        <tr>
                            <td class="nr">{{$value->cid}}</td> 
                            <td>{{$value->rid}}</td> 
                            <td>{{$value->comp_name}}</td>
                            <td>{{$value->type_name}}</td>
                            <td>{{$value->photo}}</td> 
                            <td>{{$value->description}}</td> 
                            <td>{{$value->location}}</td> 
                            <td>{{$value->status}}</td> 
                            <td>{{$value->start_date}}-{{$value->comp_date}}</td> 
                            <td>{{$value->reason}}</td> 
                            <td>{{$value->role_id }}</td> 
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
                                    <a href="/edit/{{$value->cid}}"><i class="fa fa-check"></i></a>&nbsp;&nbsp;&nbsp;                
                                      <!-- Modal content -->
                                    <a href="/viewcomplain/{{$value->cid}}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </td>
                        </tr>
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
  // $(function () {
  //   $('#example1').DataTable()
      
  //   // $('#example2').DataTable({
  //   //   'paging'      : true,
  //   //   'lengthChange': false,
  //   //   'searching'   : true,
  //   //   'ordering'    : true,
  //   //   'info'        : true,
  //   //   'autoWidth'   : true
  //   // })

  // })
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
            "lengthMenu": [[5,10, 25, 50], [5,10, 25, 50]],
            initComplete: function () {
              this.api().columns([4]).every( function () {
                var column = this;
                console.log(column);
                var select = $("#cityfilter"); 
                select.append('<option value="ALL">ALL</option>' )
                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns([5]).every( function () {
                var column = this;
                console.log(column);
                var select = $("#statefilter"); 
                select.append('<option value="ALL">ALL</option>' )
                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );
              this.api().columns([6]).every( function () {
                var column = this;
                console.log(column);
                var select = $("#aerbfilter"); 
                select.append('<option value="ALL">ALL</option>' )
                column.data().unique().sort().each( function ( d, j ) {

                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns([7]).every( function () {
                var column = this;
                console.log(column);
                var select = $("#playcardfilter"); 
                select.append('<option value="ALL">ALL</option>' )
                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );
              this.api().columns([8]).every( function () {
                var column = this;
                console.log(column);
                var select = $("#qafilter"); 
                select.append('<option value="ALL">ALL</option>' )
                column.data().unique().sort().each( function ( d, j ) {

                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns([9]).every( function () {
                var column = this;
                console.log(column);
                var select = $("#agencyfilter"); 
                select.append('<option value="ALL">ALL</option>' )
                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

            //  $("#cityfilter,#statefilter");
           }
        } );
       //  $('#cityfilter,#statefilter').on('change', function(){
       //             //table.search(this.value).draw();   
       //             debugger;
       //             if(this.value!="ALL"){
       //     $('#employee_data').dataTable().fnFilter(this.value);

       // }
       // else {
       //      $('#employee_data').dataTable().fnFilter('');

       // }
       //  });

    $('#cityfilter').on('change',function(){
      //debugger;
       // this.value="ALL";
       //employee_data=currentdata;
     //  debugger;
     city=this.value;
     if(city!="ALL")
     {
     $('#employee_data').dataTable().fnFilter(city,4)
      }
      else
      {
        $('#employee_data').dataTable().fnFilter("",4)
      }
    })
    $('#statefilter').on('change',function(){
       // this.value="ALL";
       //employee_data=currentdata;
     //  debugger;
     state=this.value;
     if(state!="ALL")
     {
     $('#employee_data').dataTable().fnFilter(state,5)
      }
      else
      {
        $('#employee_data').dataTable().fnFilter("",5)
      }    
    })
    $('#aerbfilter').on('change',function(){
     if(this.value!="ALL")
     {
     $('#employee_data').dataTable().fnFilter(this.value,6)
      }
      else
      {
        $('#employee_data').dataTable().fnFilter("",6)
      }
    })
    $('#playcardfilter').on('change',function(){

     if(this.value!="ALL")
     {
     $('#employee_data').dataTable().fnFilter(this.value,7)
      }
      else
      {
        $('#employee_data').dataTable().fnFilter("",7)
      }    
    })
    $('#qafilter').on('change',function(){
     if(this.value!="ALL")
     {
     $('#employee_data').dataTable().fnFilter(this.value,8)
      }
      else
      {
        $('#employee_data').dataTable().fnFilter("",8)
      }
    })
    $('#agencyfilter').on('change',function(){

     if(this.value!="ALL")
     {
     $('#employee_data').dataTable().fnFilter(this.value,9)
      }
      else
      {
        $('#employee_data').dataTable().fnFilter("",9)
      }    
    })
        // $('#statefilter').on('change',function(){
    //     //this.value="ALL";
    //    // $('#employee_data')=currentdata;
    //  $('#employee_data').dataTable().fnFilter("col1":this.value,"col2":value2);        
    // })


        $('input.column_filter').on( 'keyup click', function () {
            //debugger;
            filterColumn( $(this).parents('tr').attr('data-column') );
        } );    
    } );
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
