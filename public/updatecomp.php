<?php

$con = mysqli_connect("localhost","root","","piunew") or die("not found");
if($_SERVER['REQUEST_METHOD']=='POST')
{

$comp_name=$_POST["comp_name"];
$type_name=$_POST["type_name"];
$cid=$_POST["cid"];


$d="SELECT comp_cat_id from complain_cat where comp_name='$comp_name'";
$e="SELECT type_id from complain_type where type_name='$type_name'";

$res=mysqli_query($con,$d);
while($row=mysqli_fetch_array($res))
{
	$comp_cat_id=$row['comp_cat_id'];
}
$res=mysqli_query($con,$e);
while($row=mysqli_fetch_array($res))
{
	$type_id=$row['type_id'];
}
$da=date("Y-m-d");


 $desc=filter_input(INPUT_POST,"description");
 $loc=filter_input(INPUT_POST,"location");

 $sql="update complains set comp_cat_id='$comp_cat_id',type_id='$type_id',description='$desc',location='$loc' where cid='$cid'";
 
 if(mysqli_query($con,$sql))
 {
 
 echo "Successfully Uploaded";
 $json = array("status" => 1, "msg" => "Done User Updated!","SQL" => $sql);

 }
 
 mysqli_close($con);
 }else{
 echo "Error";

 }
echo json_encode($json);



?>