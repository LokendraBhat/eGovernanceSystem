<?php

require 'connection.php';

$email = $_POST['username'];
$pw = $_POST['password'];
$flag = 0;


$sql = "SELECT * FROM login_info";
$result = mysqli_query($conn,$sql);
if($result){
while($row = mysqli_fetch_assoc($result)){
 
	if($row['email'] == $email && $row['password'] == $pw)
	{
		$cid = $row['cit_id'];
		$flag = 1;
		break;
	}
}
}

if($flag == 1){
	
	header("location:userinfo.php?cit_id=".urlencode($cid));
}
else{
	$error_message = "Invalid username or password.";;
	header("Location: login.html?error=" . urlencode($error_message));
        exit;
}

?>


