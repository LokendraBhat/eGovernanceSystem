
         
      <!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>
<?php
$ids= $_GET["id"];
?>
    <form method="POST" action="save_photo.php" enctype="multipart/form-data">

        <h2>Upload Photos Here</h2>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            
            <label for="cc" class="lab">Upload Photo:</label>
            <input type="file" name="personal_photo" >
            
            <br><br>
            <label for="cc" class="lab">Upload Citizenship:</label>
            <input type="file" name="cit_photo" >

<br><br><hr>
        
        <input type="submit" name="submit" value="upload File">

    </form>

</body>
</html>
