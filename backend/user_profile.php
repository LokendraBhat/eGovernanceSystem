

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
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



<h1> Citizen Information </h1><br><br>
<div class="user_info">
	<h3>
<img src="<?php echo $img_path ?>" alt = "Profile Picture" width="200" height = "200" >
<hr><hr>
<p><b>Name:  &nbsp&nbsp&nbsp     <?php echo $full_name ?> </b></p>
<p><b>Citizenship ID: &nbsp&nbsp&nbsp  <?php echo $id ?> </b></p>
<p><b>Phone Number:  &nbsp&nbsp&nbsp   <?php echo $phone ?> </b></p>
<p><b>Email:    &nbsp&nbsp&nbsp       <?php echo $email ?> </b></p>
<p><b>Date of Birth: &nbsp&nbsp&nbsp  <?php echo $date_birth ?> </b></p>
<p><b>Age: &nbsp&nbsp&nbsp  <?php echo $age->y." Years ".$age->m." Months ".$age->d." Days" ?> </b></p>
<p><b>Gender:  &nbsp&nbsp&nbsp <?php echo $gender ?> </b></p>

<button > Widthdraw Money </button>
</h3>
</body>
</html>







