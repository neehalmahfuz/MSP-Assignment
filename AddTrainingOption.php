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
		
		echo $AddCourseInfo = "INSERT INTO tblcourse(CourseName,Description,Duration,InstructorName,LocationId,ConpanyStatus)
		VALUES(
		'".(trim($_POST["txtCourseName"]))."',
		'".(trim($_POST["DescriptionTxtArea"]))."',
		'".trim($_POST["textDuration"])."',
		'Jacky lim',
		'B001',
		'Open')";
		$CourseInfoResult = mysqli_query($Link,$AddCourseInfo);
		if($CourseInfoResult)
		{
			echo "<script>alert('New record created successfully');</script>";
		}
		else
			echo "<script>alert('Something wrong');</script>";
	}
	else
	{
?>
<a href="trainingcatalog.php">Training catalog</a>
<a href="AddTrainingOption.php">Add Training Option</a>

<form id = "form2" name = "form2" method = "post" action="AddTrainingOption.php"/>
	<table>
	<tbody>
		<tr>
			<th colspan="2">Add Training Option</th>
		</tr>
		<tr>
		<td>Course Name </td>
			<td><input type = "text" name = "txtCourseName" id = "CourseName" style="font-size:15pt;" size="35"></td>
		</tr>
		<tr>
		<td>Description</td>
		</tr>
		<tr>
			<td><textarea name="DescriptionTxtArea" rows="4" cols="40">hahaha</textarea></td>
		</tr>
		<tr>
			<td>Duration</td>
			<td><input type = 'text' name = 'textDuration' id = 'textDuration'style="font-size:15pt;" size="35"></td>
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