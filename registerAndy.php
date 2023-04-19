
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
<body class="h-100">
<?php
error_reporting(0);
$Username = "CAdmin";
	$Password = "admin";
	$Host = "localhost";
	$Database = "dbtraining";

	$Link = mysqli_connect($Host,$Username,$Password,$Database) or die(mysqli_error());
	
	if($_POST['btnRegister'])
	{
		echo $AddCourseInfo = "INSERT INTO tblclientacc(FirstName,LastName,UserIc,DOB,Phone,State,Email,UserPassword,Gender)
		VALUES(
		'".trim($_POST["firstname"])."',
		'".trim($_POST["lastname"])."',
		'".trim($_POST["userIc"])."',
		'".trim($_POST["birthdate"])."',
		'".(trim($_POST["phone"]))."',
		'".(trim($_POST["state"]))."',
		'".(trim($_POST["email"]))."',
		'".(trim($_POST["password"]))."',
		'".(trim($_POST["gender"]))."')";
		
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

    <div class="container d-flex align-items-center h-100">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <img src="res/register.jpg" class="img-fluid">
            </div>
            <div class="col-sm-6">
                <form name="form" id="form" method="post" enctype="multipart/form-data" novalidate="novalidate"  class="p-5">
                    <h1 class="mb-4" style="color: #454545;">Registration Form</h1>
                    <div class="row mb-3">
                        <label for="firstname" class="col-sm-4 col-form-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="firstname" name="firstname" placeholder="Your first name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lastname" class="col-sm-4 col-form-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="lastname" name="lastname" placeholder="Your last name">
                        </div>
                    </div>
					<div class="row mb-3">
                        <label for="lastname" class="col-sm-4 col-form-label">User IC</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="userIc" name="userIc" placeholder="Your ic">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="birthdate" class="col-sm-4 col-form-label">Birth Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control mb-3" id="birthdate" name="birthdate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-4 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="phone" name="phone" placeholder="Your phone number">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="state" class="col-sm-4 col-form-label">State</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="state" name="state" placeholder="Your state">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label">Email Address</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Your email address">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Your password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value = "male">
                                <label class="form-check-label" for="male">Male</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value = "female" >
                                <label class="form-check-label" for="female">Female</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="gender" value="other">
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <input type="submit" name = "btnRegister" id = "btnRegister" class="btn btn-block mt-3" style="background-color: #FF6000; color: #ffffff;" value="Register">
                        <label class="text-center mt-3">Already have an account? <a href="login.html" class="text-decoration-none">Log in</a></label>
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
