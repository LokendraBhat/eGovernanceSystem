<?php

require 'connection.php';

$full_name = $_POST['fname'];
$phone = $_POST['phone'];
$email = $_POST['Email'];
$dob = $_POST['DoB'];
$pw = $_POST['password'];
$gender = $_POST['gender'];
$cit_no = $_POST['CNo'];

$flag = 0;


$sql = "SELECT * FROM login_info";
$result = mysqli_query($conn, $sql);
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {

		if ($row['cit_id'] == $cit_no) {
			$flag = 1;
			break;
		}
	}
}
if ($flag == 1) {
	$error_message = "Please enter valid Citzenship Number";;
	header("Location: register.html?error=" . urlencode($error_message));
	exit;
}
if ($flag == 0) {

	$sql = "INSERT INTO REGISTER_INFO(CIT_ID,FULL_NAME,PHONE_NO,EMAIL,DOB,GENDER) VALUES('$cit_no','$full_name','$phone','$email','$dob','$gender')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		$sql = "INSERT INTO LOGIN_INFO(CIT_ID,EMAIL,PASSWORD) VALUES('$cit_no','$email','$pw')";
		$result2 = mysqli_query($conn, $sql);
		if ($result2) {
			header("location:upload_photos.php?id=" . urlencode($cit_no));
		}
	}
}
mysqli_close($conn);
