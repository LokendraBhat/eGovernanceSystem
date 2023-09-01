<?php
require 'connection.php';
$_cit_id = $_GET['cit_id'];

$sql = "SELECT * FROM REGISTER_INFO WHERE CIT_ID = '$_cit_id' ";
$result = mysqli_query($conn,$sql);
if($result){
	$row = mysqli_fetch_assoc($result);
	$id = $row['cit_id'];
	$full_name = $row['full_name'];
	$phone = $row['phone_no'];
	$email = $row['email'];
	$date_birth = $row['DOB'];
	$gender = $row['gender'];
	//calculating age
	$d_of_birth = new DateTime($date_birth);
	$now = new DateTime();
	$age = $now->diff($d_of_birth);
}

$sql = "SELECT * FROM IMAGE_INFO";
$result = mysqli_query($conn,$sql);
if($result){
	$row = mysqli_fetch_assoc($result);
	  if($row['id'] == $_cit_id){
		  $img_path = $row['img_name'];
	}
}
 
?>





