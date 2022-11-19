@include('pages.session')
<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" />
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
     <link rel="stylesheet" href="../assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../assets/bower_components/Ionicons/css/ionicons.min.css">
     <link rel="stylesheet" href="../assets/dist/css/new.css">
     <link rel="stylesheet" href="../assets/dist/css/skins/_all-skins.min.css">
     <link rel="stylesheet" href="../assets/bower_components/morris.js/morris.css">
     <link rel="stylesheet" href="../assets/bower_components/jvectormap/jquery-jvectormap.css">
     <link rel="stylesheet" href="../assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
     <link rel="stylesheet" href="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="../assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="../assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="../assets/bower_components/font-awesome/css/font-awesome.min.css">
    
    <style>
      .dt-button{
        cursor: pointer;
        border-radius: 3px;
        box-shadow: none;
        border: 1px solid transparent;
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857143;
        text-align: center;
        touch-action: manipulation;
        user-select: none;
        background-image: none;
        white-space: nowrap;
        vertical-align: middle;
      }
      .btns-html5 {
        background-color: #3c8dbc;
        border-color: #367fa9;
        color: #fff;
    }
    </style>
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
                    <div class="box-body">
                      <div class="row">
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">  
                          <label>Complain</label>
                          </div>
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <label>Complain type</label>
                          </div>
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <label>Campus</label>
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
                          <select name="campus" id="aerbfilter" class="form-control select2" style="overflow: scroll; width: 70%;"></select></div>
                          <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <select name="status" id="playcardfilter" class="form-control select2" style="overflow: scroll; width: 70%;"></select></div>
                          </div>
                  </div>
                </div>
              </div>
              {{-- export --}}
                <div class="col-xs-12">
                  <div class="box" >
                    <div class="box-body">
                      <div class="row" style="padding-left:30px;padding-right: 15px;">
                        <div class="col-sm-3 col-md-3 col-lg-3 date1" align="center">
                          <label>Start Date:</label>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <label>End Date:</label>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                        </div>
                      </div>
                      <form action="/filterdate" method="POST" onsubmit="return validate()">
                        <input type="hidden" name="_token" value="{{csrf_token() }}">
                      <div class="row" style="padding-left:15px;padding-right: 15px;">
                        <div class="col-sm-3 col-md-3 col-lg-3" align="center">
                          <div class="form-group">
                            <div class="form-group has-feedback">
                              <div class="input-group">
                                <div class="input-group-addon" style="">
                                  <i class="glyphicon glyphicon-calendar" style="margin: 0px;"></i>
                                </div>
                                <input type="text" name="date1" id="datepicker" style="height:34px;width: 100%;" >
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
                                <input type="text" name="date2" id="datepicker1" style="height:34px;width: 100%;" >
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3" style="float:left">
                            <input type="submit" class="btn btn-primary" id="btncheck" value="Submit Filter" style="float:left"></button>
                        </div>
                      </div>
                    </form>
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
            <div class="box-body" style="overflow-x:auto; ">
                
              <table id="example1" class="table table-striped table-bordered" style="width:100%">
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
                    @php
                      $id1=1
                    @endphp
                        @foreach ($data as $value)
                        <tr>
                            <td>{{$id1}}</td> 
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
                                    <input type="button" name="view" class="btn btn-info btn-xs view_data" value="view" id="{{$value->cid}}" />              
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
                    
                  }
                }  
           });  
      });  
  });
  function validate(){
    var d1=document.getElementById("datepicker");
    var d2=document.getElementById("datepicker1");
    if(d1.value==""&&d2.value==""){
      alert("Enter Start and End Date");
      return false;
    }else{ return true;}
  }
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
              this.api().columns([5]).every( function () {
                var column = this;
                console.log(column);
                var select = $("#aerbfilter"); 
                select.append('<option value="ALL">ALL</option>' )
                column.data().unique().sort().each( function ( d, j ) {

                  select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
              } );

              this.api().columns([6]).every( function () {
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
     $('#example1').dataTable().fnFilter(this.value,5)
      }
      else
      {
        $('#example1').dataTable().fnFilter("",5)
      }
    })
    $('#playcardfilter').on('change',function(){

     if(this.value!="ALL")
     {
     $('#example1').dataTable().fnFilter(this.value,6)
      }
      else
      {
        $('#example1').dataTable().fnFilter("",6)
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
</body>
</html>