

<?php

error_reporting(0);


// for profile photo
if(isset($_POST['submit'])){
    $cit_id = $_POST["id"];    
    $flag1 = 0;
    $flag2 = 0;


    $Pfilename = $_FILES["personal_photo"]["name"];
    $PtmpName = $_FILES['personal_photo']["tmp_name"];
    $Pfolder = "uploads/".$Pfilename;

    if(move_uploaded_file($PtmpName, $Pfolder)){
        $flag1 = 1;
    }


// for citizenship
    $Cfilename = $_FILES["cit_photo"]["name"];
    $CtmpName = $_FILES['cit_photo']["tmp_name"];
    $Cfolder = "uploads/".$Cfilename;

    if(move_uploaded_file($CtmpName, $Cfolder)){
        $flag2 = 1;
    }


if($flag1 == 1 && $flag2 == 1){


$server_name = 'localhost';
$user_name = 'root';
$password = "";
$dbname = "e_governance";
$conn = mysqli_connect($server_name,$user_name,$password,$dbname);


if(!$conn){
die("Connection failed: ".mysqli_connect_error());
}
 



$query = "INSERT INTO IMAGE_INFO VALUES('$cit_id','$Pfolder','$Cfolder')";

$result2 = mysqli_query($conn,$query);
  if($result2){
    $amount = 0;
    $current_date = new DateTime();
    $current_date = $current_date->format('Y-m-d');
    // fetch 
    
    $sql = "INSERT INTO account_info VALUES('$cit_id','$amount','$current_date','..')";
    $result3 = mysqli_query($conn,$sql);
    if($result3){
            header("location:login.html");
        
    }
    else{
        echo "<script>alert('Error in creating account')</script> ";
    }
        
    }
    else{
        header("location:upload_photos.php?id=".urlencode($cit_id));
        
    }
}
else{
    header("location:upload_photos.php?id=".urlencode($cit_id));
}

}
?>