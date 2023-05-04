<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="js/register.js"></script>
    <title>Register</title>
</head>
<style>
    .btn-training {
        background-color: #FF6000;
        border: #FF6000;
        color: white;
    }

    .btn-training:hover {
        background-color: #FFFFFF;
        color: #FF6000;
    }
</style>
<body class="h-100">
<?php
include("include/navbar.php");
error_reporting(0);
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check if connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
	

<?php
if($_POST['btnAddAccInfo']) {
    //session storage
    session_start();
    
    $courseName = trim($_POST["txtCourseName"]);
    
    $lowerCaseCourseName = strtolower($courseName);

    // Check if the course name already exists
    $select = "SELECT * FROM tblcourse WHERE LOWER(CourseName) = '$lowerCaseCourseName'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0) {
        echo "<script>alert('Training option already exists!');</script>";
        echo "<script>location='AddTrainingOption.php';</script>";
    }
    else {
        $CourseImg = $_FILES["CourseImage"]["name"];
        $TempMovieImg = $_FILES["CourseImage"]["tmp_name"];
        mkdir("CourseImage");
        move_uploaded_file($TempMovieImg,"CourseImage/".$CourseImg);
        
        $AddCourseInfo = "INSERT INTO tblcourse(CourseName,Description,Duration,ImageCourse,PriceCourse,InstructorName,LocationId,ConpanyStatus)
        VALUES(
        '".$courseName."',
        '".trim($_POST["DescriptionTxtArea"])."',
        '".trim($_POST["textDuration"])."',
        '$CourseImg',
        '".(trim($_POST["textPrice"]))."',
        'Jacky lim',
        'B001',
        'Open')";
        
        $CourseInfoResult = mysqli_query($conn,$AddCourseInfo);
        if($CourseInfoResult) {
            echo "<script>alert('New record created successfully');</script>";
            echo "<script>location='index.php';</script>";
        }
        else {
            echo "<script>alert('Something wrong');</script>";
            echo "<script>location='index.php';</script>";
        }
    }
}
else {

?>
    <div class="container d-flex align-items-center h-100">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <img src="res/register.jpg" class="img-fluid">
            </div>
            <div class="col-sm-6">
                <form name="form" id="form" method="post" enctype="multipart/form-data" novalidate="novalidate"  class="p-5">
                    <h1 class="mb-4" style="color: #454545;">Add Training Option Form</h1>
                    <div class="row mb-3">
                        <label for="txtCourseName" class="col-sm-4 col-form-label">Course Name </label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="txtCourseName" name = "txtCourseName" placeholder="Course Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="textPrice" class="col-sm-4 col-form-label">Price</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="textPrice" name = "textPrice" placeholder="Price">
                        </div>
                    </div>
					<div class="row mb-3">
                        <label for="textDuration" class="col-sm-4 col-form-label">Duration</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="textDuration" name="textDuration"placeholder="Duration">
                        </div>
                    </div>
					<div class="row mb-3">
                        <label for="DescriptionTxtArea" class="col-sm-4 col-form-label">Description</label>
                        <div class="col-sm-8">
                            <input type="textarea" class="form-control mb-3" rows="4" cols="40" id="DescriptionTxtArea" name="DescriptionTxtArea" placeholder="Description">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="CourseImage" class="col-sm-4 col-form-label">Course Image</label>
                        <div class="col-sm-8">
							<input type = "file" id = "CourseImage" name = "CourseImage" class="form-control mb-3" value = "<?php echo $EditRow['CourseImage'];?>">
                        </div>
                    </div>
											
					<div class="row mb-3">
						  <div class="col-sm-8">
							<input type="submit" name = "btnAddAccInfo" id = "btnAddAccInfo" class="btn btn-block mt-3" style="background-color: #FF6000; color: #ffffff;" value="Add Training Option">
						 </div>
					</div>
                </form>
            </div>
        </div>
    </div>
	
<?php
	}
?>
</body>
</html>
