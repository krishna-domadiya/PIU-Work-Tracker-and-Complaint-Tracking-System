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
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
          {{-- second Row --}}
            @include('pages.countcomplain')
            <div class="row">
              <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                      <div class="row">
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">  
                          <label>Complain</label>
                          </div>
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <label>Complain type</label>
                          </div>
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <label>Location</label>
                          </div>
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <label>Status</label>
                          </div>
                          </div> 
                          <div class="row">
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">  <!-- onfocus='this.size=3;' onblur='this.size=1;' onchange='this.size=1; this.blur();'-->
                          <select name="city" id="cityfilter" class="form-control select2" style="overflow: scroll; width: 70%;"></select></div>
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <select name="state" id="statefilter" class="form-control select2" style="overflow: scroll; width: 70%;"></select></div>
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <select name="" id="aerbfilter" class="form-control select2" style="overflow: scroll; width: 70%;"></select></div>
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <select name="" id="playcardfilter" class="form-control select2" style="overflow: scroll; width: 70%;"></select></div>
                          </div>
                  </div>
                </div>
              </div>
              {{-- export --}}
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-body">
                      <div class="row" style="padding-left:15px;padding-right: 15px;">
                        <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <label>Start Date:</label>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <label>End Date:</label>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                        </div>
                      </div>
                      <div class="row" style="padding-left:15px;padding-right: 15px;">
                        <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <div class="form-group">
                            <div class="form-group has-feedback">
                              <div class="input-group">
                                <div class="input-group-addon" style="">
                                  <i class="glyphicon glyphicon-calendar" style="margin: 0px;"></i>
                                </div>
                                <input type="text" name="date" id="datepicker" style="height:34px;width: 100%;" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <div class="form-group">
                            <div class="form-group has-feedback">
                              <div class="input-group">
                                <div class="input-group-addon" style="">
                                  <i class="glyphicon glyphicon-calendar" style="margin: 0px;"></i>
                                </div>
                                <input type="text" name="date" id="datepicker1" style="height:34px;width: 100%;" required>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                            <button type="button" class="btn btn-primary" id="btncheck">Approve</button>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
            <!-- ./col -->
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
                  <th>User Id</th>
                  <th class="no-sort">Complain Name</th>
                  <th class="no-sort">Type</th>
                  <th>Photo</th>
                  <th>Description</th>
                  <th>Campus</th>
                  <th>Status</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th>Approximate Date</th>
                  <th>reason</th>
                  <th>Is Approve</th>
                  <th>Is Emergency</th>
                </tr>
                </thead>
                <tbody>
                    @if(count($data) > 0)
                        @foreach ($data as $value)
                        <tr>
                            <td class="nr">{{$value->cid}}</td> 
                            <td>{{$value->firstname}}</td> 
                            <td>{{$value->comp_name}}</td>
                            <td>{{$value->type_name}}</td>
                            <td>{{$value->photo}}</td> 
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
  $( function() {
    $( "#datepicker" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } ); 

  $( function() {
    $( "#datepicker1" ).datepicker({
      changeMonth: true,
      changeYear: true
    });
  } ); 
  $(document).ready(function() {
        $('#example1').DataTable( {
            //responsive: true,
            "scrollX": true,
            dom: 'Bfrtip',
            buttons : [ {
                extend : 'excel',
                text : 'Export to Excel',
                exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12 ]
                    }
            } ],
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
              this.api().columns([2]).every( function () {
                var column = this;
                console.log(column);
                var select = $("#cityfilter"); 
                select.append('<option value="ALL">ALL</option>' )
                column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns([3]).every( function () {
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
           }
        } );

    $('#cityfilter').on('change',function(){

     city=this.value;
     if(city!="ALL")
     {
     $('#example1').dataTable().fnFilter(city,2)
      }
      else
      {
        $('#example1').dataTable().fnFilter("",2)
      }
    })
    $('#statefilter').on('change',function(){
       // this.value="ALL";
       //employee_data=currentdata;
     //  debugger;
     state=this.value;
     if(state!="ALL")
     {
     $('#example1').dataTable().fnFilter(state,3)
      }
      else
      {
        $('#example1').dataTable().fnFilter("",3)
      }    
    })
    $('#aerbfilter').on('change',function(){
     if(this.value!="ALL")
     {
     $('#example1').dataTable().fnFilter(this.value,6)
      }
      else
      {
        $('#example1').dataTable().fnFilter("",6)
      }
    })
    $('#playcardfilter').on('change',function(){

     if(this.value!="ALL")
     {
     $('#example1').dataTable().fnFilter(this.value,7)
      }
      else
      {
        $('#example1').dataTable().fnFilter("",7)
      }    
    })
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
$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var cid = button.data('cid') // Extract info from data-* attributes
  
  var modal = $(this)
  modal.find('.modal-body #cid').val('cid')
})
</script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">          
</body>
</html>