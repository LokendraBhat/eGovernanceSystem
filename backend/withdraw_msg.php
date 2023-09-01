<?php

require 'connection.php';
$id = $_GET['cit_id'];

$withdrawl_amount = $_POST['w_amount'];

$sql = "SELECT * FROM account_info WHERE cit_id = '$id' ";
$result = mysqli_query($conn, $sql);
if ($result) {
    $row = mysqli_fetch_assoc($result);
    $Amount = $row['Amount'];
}

$amount = $Amount - $withdrawl_amount;
$current_date = new DateTime();
$wit_date = $current_date->format('Y-m-d');
$query = "UPDATE ACCOUNT_INFO SET Amount = '$amount', withdraw_date = '$wit_date' WHERE CIT_ID = '$id'";

$result = mysqli_query($conn, $query);

// popup script alert for withdrawl and after read any key switch to header location
if (!$result) {
    echo "<script>alert('Withdrawl Failed')</script>";
    echo "<script>window.location.href='account_info.php?cit_id=$id'</script>";
}
else{
    echo "<script>alert('Withdrawl Successful')</script>";
    echo "<script>window.location.href='account_info.php?cit_id=$id'</script>";
}

mysqli_close($conn);
?>

