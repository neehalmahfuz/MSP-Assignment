<?php
	session_start();
	error_reporting(0);
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
?>
<a href="index.php">Home</a>
<a href="trainingcatalog.php">Training catalog</a>
<a href="AddTrainingOption.php">Add Training Option</a>


	<?php
		echo $DisProfile = "SELECT * FROM tblcourse";
		$DisProfileRs = mysqli_query($Link,$DisProfile);
		if(mysqli_num_rows($DisProfileRs) > 0)
		{
			echo '<form id="form1" name="form1" method="post" action="">';
			echo '<table border="1">';
			echo "<tbody>";
			echo "<tr>";
			echo "<td>Course name</td>";
			echo "<td>Description</td>";
			echo "<td>Duration</td>";
			echo "</tr>";
			for($i = 0;$i < mysqli_num_rows($DisProfileRs);$i++)
			{
				$DisRow = mysqli_fetch_array($DisProfileRs);
				
				echo "<tr>";
	
				echo "<td align = 'left'>".$DisRow['CourseName']."</td>";
				echo "<td align = 'left'>".$DisRow['Description']."</td>";
				echo "<td align = 'left'>".$DisRow['Duration']."</td>";
				echo "<td><input type='submit' name = 'btnEnrolCourse' id = 'btnEnrolCourse'></td>";
				echo "</tr>";
			}
			echo '</tbody>';
			echo '</table>';
			echo '</form>';
		}
	?>
	
</body>
</html>