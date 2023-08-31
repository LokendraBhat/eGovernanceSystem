
<?php 

$server_name = 'localhost';
$user_name = 'root';
$password = "";
$dbname = "e_governance";
$conn = mysqli_connect($server_name,$user_name,$password,$dbname);


if(!$conn){
die("Connection failed: ".mysqli_connect_error());
}

?>