<?php

$con = mysqli_connect("localhost","root","","piunew") or die("not found");
if($_SERVER['REQUEST_METHOD']=='POST')
{
$email=$_POST["email"];
$comp_name=$_POST["comp_name"];
$type_name=$_POST["type_name"];




$a="SELECT role_id from registrations where email='$email'";
$b="SELECT camp_id from registrations where email='$email'";
$c="SELECT rid from registrations where email='$email'";
$d="SELECT comp_cat_id from complain_cat where comp_name='$comp_name'";
$e="SELECT type_id from complain_type where type_name='$type_name'";

$res=mysqli_query($con,$a);
while($row=mysqli_fetch_array($res))
{
	$role_id=$row['role_id'];
}

$res=mysqli_query($con,$b);
while($row=mysqli_fetch_array($res))
{
	$camp_id=$row['camp_id'];
}

$res=mysqli_query($con,$c);
while($row=mysqli_fetch_array($res))
{
	$rid=$row['rid'];
}
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

//echo $role_id."   ".$camp_id."  ".$rid."  ".$da."   ".$comp_cat_id."   ".$type_id;



 $image=filter_input(INPUT_POST,"image");
 $desc=filter_input(INPUT_POST,"description");
 $loc=filter_input(INPUT_POST,"location");
// $iseme=filter_input(INPUT_POST,"eme");

$sql ="SELECT cid FROM complains ORDER BY cid ASC";
 
$res = mysqli_query($con,$sql);
 
$cid = 0; 
 while($row = mysqli_fetch_array($res))
 {
 $id = $row['cid'];
 }
 
 $p = "uploads/$id.png";
 
 $mainpath = "http://192.168.43.22:8888/piu/public/assets/$p";
 //$mainpath = "http://192.168.43.22:8888/myimage/$p";
 

 $sql="insert into complains(photo,role_id,camp_id,rid,comp_cat_id,type_id,description,location,start_date,status) values('".$mainpath."','".$role_id."','".$camp_id."','".$rid."','".$comp_cat_id."','".$type_id."','".$desc."','".$loc."','".$da."','Pending');";
 
 
 if(mysqli_query($con,$sql))
 {
 file_put_contents($p,base64_decode($image));
 echo "Successfully Uploaded";
 }
 
 mysqli_close($con);
 }else{
 echo "Error";
 }




?>