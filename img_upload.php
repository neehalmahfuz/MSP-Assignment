<?php
  error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
    <title> User Receipts </title>
</head>
<body>
  <form action = "#" method = "POST" enctype="multipart/form-data">
    <input type="file" name = "uploadfile"></br></br>
    <input type="submit" name ="submit" value = "Upload File"><br>
  <form>

</body>
</html>

<?php
//print_r($_FILES["uploadfile"]);
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "receipts_images/".$filename;

//echo $folder;
move_uploaded_file($tempname, $folder);

echo "<img src='$folder' height= '250px' width='250px' >";

?>
