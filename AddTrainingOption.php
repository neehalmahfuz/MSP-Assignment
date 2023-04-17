<?php
	session_start();
	//error_reporting(0);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
<?php

	$Username = "CAdmin";
	$Password = "admin";
	$Host = "localhost";
	$Database = "dbtraining";

	$Link = mysqli_connect($Host,$Username,$Password,$Database) or die(mysqli_error());

	if($_POST['btnAddAccInfo'])
	{
		$CourseImg = $_FILES["CourseImage"]["name"];
		$TempMovieImg = $_FILES["CourseImage"]["tmp_name"];
		mkdir("CourseImage");
		move_uploaded_file($TempMovieImg,"CourseImage/".$CourseImg);
		
		echo $AddCourseInfo = "INSERT INTO tblcourse(CourseName,Description,Duration,ImageCourse,PriceCourse,InstructorName,LocationId,ConpanyStatus)
		VALUES(
		'".trim($_POST["txtCourseName"])."',
		'".trim($_POST["DescriptionTxtArea"])."',
		'".trim($_POST["textDuration"])."',
		'$CourseImg',
		'".(trim($_POST["textPrice"]))."',
		'Jacky lim',
		'B001',
		'Open')";
		$CourseInfoResult = mysqli_query($Link,$AddCourseInfo);
		if($CourseInfoResult)
		{
			echo "<script>alert('New record created successfully');</script>";
			echo "<script>location='index.php';</script>";
		}
		else
			echo "<script>alert('Something wrong');</script>";
		echo "<script>location='index.php';</script>";
	}
	else
	{
?>
<a href="trainingcatalog.php">Training catalog</a>
<a href="AddTrainingOption.php">Add Training Option</a>

<form id = "form2" name = "form2" method = "post" enctype="multipart/form-data">
	<table>
	<tbody>
		<tr>
			<th>Add Training Option</th>
		</tr>
		<tr>
			<td>Course Name </td>
			<td><input type = "text" name = "txtCourseName" id = "CourseName" style="font-size:15pt;" size="35"></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><textarea name="DescriptionTxtArea" rows="4" cols="40">hahaha</textarea></td>
		</tr>
		<tr>
			<td>Price</td>
			<td><input type = 'text' name = 'textPrice' id = 'textPrice'style="font-size:15pt;" size="35"></td>
		</tr>
		<tr>
			<td>Duration</td>
			<td><input type = 'text' name = 'textDuration' id = 'textDuration'style="font-size:15pt;" size="35"></td>
		</tr>
		<tr>
			<td>Course Image</td>
			<td><input type = "file"  name ="CourseImage" id = "CourseImage"  style="font-size:16pt;" value = "<?php echo $EditRow['CourseImage'];?>"></td>
		</tr>
		<tr>
			<td colspan="2"><input type="submit" name = "btnAddAccInfo" id = "btnAddAccInfo">
		</tr>
	</tbody>
	</table>
	</form>
	<?php
	}

?>
</body>
</html>