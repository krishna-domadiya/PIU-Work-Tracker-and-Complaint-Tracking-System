@include('pages.session')
@extends('layout') 
@section('content')
<?php
$id=Session::get('id');
$role=Session::get('role');
//$data=$_SESSION['id'];
//$role=DB::select('select role from tblstaffmaster where staff_id=?', [$data]);
//echo "welcome";
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	


<div class="container">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
  	$("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
<!--<div class="container">
  <h3>Popover Example</h3>
  <a href="#" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">Toggle popover</a>
</div>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>
-->

		<h3 align="center">Centre Details</h3>
		<div class="" align="right">
			<input type="text" name="search" id="myInput" placeholder="Search Data"><br>
			<br>
		</div>
		<div id="table_data">
			<div class="table-responsive">
				<table id="myTable" class="table table-striped table-bordered">
					<tr>
						<th>Centre id</th>
						<th>Centre Name</th>
						<th>Mobile Number</th>
						<th>Email</th>
						<th>Address</th>
						<th>City</th>
						<th>State</th>
						<th>Is Aerb Approved</th>
						<th>Is Playcard Posted</th>
						<th>Has QA Report</th>
						<th>Aerb Report</th>
						<th>Playcard</th>
						<th>Testing Agency</th>
						<th>QA Report</th>
						<th>Staff Details</th>
						<th>Machine Details</th>
					</tr>
					<?php
					//$data=DB::table('tblusermaster')->paginate(3);{{ $data->links() }}
				/*	$notices = DB::table('notices')
        ->join('users', 'notices.user_id', '=', 'users.id')
        ->join('departments', 'users.dpt_id', '=', 'departments.id')
        ->select('notices.id', 'notices.title', 'notices.body', 'notices.created_at', 'notices.updated_at', 'users.name', 'departments.department_name')
        ->paginate(20);*/
					$data = DB::table('tblusermaster')
				    ->join('tblstatusmaster', 'tblstatusmaster.centre_id', '=', 'tblusermaster.centre_id')
      				//->join('tblmachinedetails', 'tblmachinedetails.centre_id', '=', 'tblusermaster.centre_id')
      				->select('tblusermaster.centre_id','tblusermaster.centrename','tblusermaster.mobileno','tblusermaster.email_id','tblusermaster.address','tblusermaster.city','tblusermaster.state','tblstatusmaster.isaerbapproval','tblstatusmaster.isplaycardposted','tblstatusmaster.has_qa_report','tblstatusmaster.aerbreport','tblstatusmaster.testing_agency','tblstatusmaster.playcard','tblstatusmaster.qa_report')->paginate(3);
				//	$data=DB::select('select * from tblusermaster LEFT JOIN tblstatusmaster ON tblstatusmaster.centre_id=tblusermaster.centre_id');
					foreach($data as $row)
					{
					?>
						<tr>
						<td>{{ $row->centre_id }}</td>
						<td>{{ $row->centrename }}</td>
						<td>{{ $row->mobileno }}</td>
						<td>{{ $row->email_id }}</td>
						<td>{{ $row->address }}</td>
						<td>{{ $row->city }}</td>
						<td>{{ $row->state }}</td>
						<td>
							<?php
							if($row->isaerbapproval==1)
								echo "Yes";
							else
								echo "No";
							//{{ $row->isaerbapproval }}
							?>
						</td>
						<td>
							<?php
							if($row->isplaycardposted==1)
								echo "Yes";
							else
								echo "No";
							//{{ $row->isplaycardposted }}
							?>
						</td>
						<td>
							<?php
							if($row->has_qa_report==1)
								echo "Yes";
							else
								echo "No";
							//{{ $row->has_qa_report }}
							?>
						</td>
						<td>{{ $row->aerbreport }}</td>
						<td>{{ $row->playcard }}</td>
						<td>{{ $row->testing_agency }}</td>
						<td>{{ $row->qa_report }}</td>
						<td>
						<?php 
							$staff=DB::select('select * from tblcentrestaffmaster where centre_id= ?',[ $row->centre_id ]);
							foreach($staff as $s)
							{
						?>
								
								<!-- The Modal -->
								<a id="myBtn">
									<?php
								//	onClick=window.open('staff.php','','width=550,height=170,left=550,top=200,status=0,')
									echo $s->name;
									//$cstaff=DB::select('select * from tblcentrestaffmaster where centre_id= ?',[ $row->centre_id ]);
									?>
								</a>
								<div id="myModal" class="modal">

								  <!-- Modal content -->
 									<div class="modal-content">
							    		<span class="close">&times;</span>
							    		<label class="col-md-4 control-label">Name</label><label><?php echo $s->name; ?></label><br>
			    						<label class="col-md-4 control-label">Role</label><label><?php echo $s->role; ?></label><br>
			    						<label class="col-md-4 control-label">Mobile Number</label><label><?php echo $s->mobileno; ?></label><br>
			    						<label class="col-md-4 control-label">Email ID</label><label><?php echo $s->email_id; ?></label><br>
			    						<label class="col-md-4 control-label">Qualification</label><label><?php echo $s->qualification; ?></label><br>
			    						<label class="col-md-4 control-label">PRMD Number</label><label><?php echo $s->prmdno; ?></label><br>
			    						<label class="col-md-4 control-label">PRMD Report</label><label><?php echo $s->prmdreport; ?></label><br>
			    						<label class="col-md-4 control-label">Certificate</label><label><?php echo $s->certificate; ?></label><br>
			    					</div>
								</div>
								</br>
						<?php
							}
						?>
						</td>
						<td>
							<?php 
							$machine=DB::select('select machinetype from tblmachinedetails where centre_id= ?',[ $row->centre_id ]);
							foreach($machine as $m)
							{
								echo "<a href='machinedetails'>";
								echo $m->machinetype;
								echo "</a>";
								echo "</br>";
							}
						?>
						</td>
						</tr>
					<?php
					}
					?>
				</table>

				{{ $data->links() }}	
			</div>
		</div>
		<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 80%;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>
<!-- Trigger/Open The Modal -->


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

//var btns = document.querySelectorAll('.pack.myBtn');
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
//[].forEach.call(btns, function(el) {
//	el.onclick = function() {
	  btn.onclick = function() {
	    modal.style.display = "block";
	}
//})

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
	</div>
@endsection