<?php




 $con = mysqli_connect("localhost","root","","piunew") or die("not found");




 //if($_SERVER['REQUEST_METHOD']=='POST'){
  $image=filter_input(INPUT_POST,"image");
  $cid=filter_input(INPUT_POST,"cid");
  echo "hello";

 $id=(int)$cid;
 $id=$id-1; 
 echo $id;
 //$p = "piu/public/uploads/$id.png";
 $p="uploads/$id.png";
 
 //$mainpath = "http://192.168.43.22:8888/myimage/$p";
 $mainpath = "http://192.168.43.22:8888/piu/public/assets/$p";
 
 $sql="update complains set photo='$mainpath' where cid='$cid'";
 
 
 if(mysqli_query($con,$sql))
 {
 file_put_contents($p,base64_decode($image));
 echo "Successfully Uploaded";
 $json = array("status" => 1, "msg" => "Done IMAGE Updated!","SQL" => $sql);
 }
 else {
   echo "ERROR ----------------";
 }
 echo json_encode($json);
 
 mysqli_close($con);
/*else{
 echo "Error";
 }/*

 if($_SERVER['REQUEST_METHOD']=='POST')
 {
  $email=filter_input(INPUT_POST,"loginid");
  $image=filter_input(INPUT_POST,"image");
  $comp_name=filter_input(INPUT_POST,"comp_name");
  $type_name=filter_input(INPUT_POST,"type_name");
  $description=filter_input(INPUT_POST,"description");
  $location=filter_input(INPUT_POST,"location");
  $is_emergency=filter_input(INPUT_POST,"isemergency");
  
$a="SELECT role_id from registration where email='".$email."'";
$b="SELECT camp_id from registration where email='".$email."'";
$c="SELECT rid from registration where email='".$email."'";
$d="SELECT comp_cat_id from complain_cat where comp_name='".$comp_name."'";
$e="SELECT type_id from complain_type where type_name=".$type_name."";

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
    $r=$row['rid'];
}
$r1="$rid";
echo $r1;
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
$da=date("Y-m-d").date("h:i:sa");

$sql ="SELECT cid FROM complain ORDER BY cid ASC"; 
$res = mysqli_query($con,$sql); 
$cid = 0; 
 while($row = mysqli_fetch_array($res)){
 $id = $row['cid'];
 }

 
 $p = "uploads/$id.png"; 
 $mainpath = "http://192.168.43.22:8888/myimage/$p";
 

 $sql="insert into complain(photo,rid,start_date,camp_id,comp_cat_id,description,location,start_date,is_emergency) values('".$mainpath."','$rid','$da','$camp_id','$comp_cat_id','".$description."','".$location."','$da','".$is_emergency."');";

 /*$sql="INSERT INTO `complain` (`rid`, `camp_id`, `comp_cat_id`, `type_id`, `photo`, `description`, `location`, `start_date`,
  `role_id`, `is_emergency`) VALUES ('".$rid."', '".$camp_id."', '".$comp_cat_id."', '".$type_id."', '".$mainpath"',
  '".$description."','".$location."','".$da."','".$role_id."','".$is_emergency."');";*/
  
 
/*$sql="INSERT INTO `complain` (`rid`, `camp_id`, `comp_cat_id`, `type_id`, `photo`, `description`, `location`, `start_date`,
  `role_id`, `is_emergency`) VALUES ('$rid', '$camp_id', '$comp_cat_id', '$type_id', '".$mainpath"',
   '".$description."', '".$location."', '".$da."','$role_id','".$is_emergency."')";
 
 
 if(mysqli_query($con,$sql))
 {
 file_put_contents($p,base64_decode($image));
 echo "Successfully Uploaded";
 }
 
 mysqli_close($con);
 }else{
 echo "Error";
 }*/


?>
	
