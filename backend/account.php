<?php
// error_reporting(0);

require 'connection.php';

$id = $_POST['id'];
$current_date = new DateTime('now');



$query = "SELECT * FROM ACCOUNT_INFO WHERE CIT_ID = '$id'";
$result = mysqli_query($conn, $query);
if($result){
    $row = mysqli_fetch_assoc($result);
    $date = $row['arrival_date'];
    $amount = $row['Amount'];
    $date = new DateTime($date);

    $dif = $current_date->diff($date);
    $year = $dif->format('%y years');
    $months = $dif->format('%m months');
    $days = $dif->format('%d days');

    $diff = (int)$days + (int)$year * 365 + (int)$months * 30;
    
    while($diff / 30 >= 1 ){
        $amount = $amount + 4000;
        $diff = $diff - 30;
    }
}
$current_date = new DateTime();
$current_date = $current_date->format('Y-m-d');
$query = "UPDATE ACCOUNT_INFO SET Amount = '$amount',arrival_date = '$current_date' WHERE CIT_ID = '$id'";
$result = mysqli_query($conn, $query);
if(!$result){
header("Location: userinfo.php?cit_id=$id");
}
else{
   header("location:account_info.php?cit_id=$id");
}
mysqli_close($conn);

?>
