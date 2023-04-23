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



<?php include("include/navbar.php");
    
// Connect to database
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";
    
// default port is not working for mySQL, assign the new port manually, can discard this
$conn = mysqli_connect($servername, $username, $password, $dbname, 3307);



/*$table = "CREATE TABLE user(
	firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    birthDate DATE NOT NULL,
    phone INT(25) NOT NULL,
    state VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    confirmPassword VARCHAR(255) NOT NULL,
    gender VARCHAR(255) NOT NULL
	)";

if (mysqli_query($conn,$table)){
	echo"<p>Table created succesfully!</p>";
}*/


        
if($_POST['btnRegister'])
{
    //session storage
    session_start();
    
    $_SESSION['firstname'] = trim($_POST["firstname"]);
    $_SESSION['lastname'] = trim($_POST["lastname"]);
    $_SESSION['birthdate'] = trim($_POST["birthdate"]);
    $_SESSION['phone'] = trim($_POST["phone"]);
    $_SESSION['state'] = trim($_POST["state"]);
    $_SESSION['email'] = trim($_POST["email"]);
    $_SESSION['gender'] = trim($_POST["gender"]);

    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    
    // Check if email already exists
    $select = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('User already exists!');</script>";
        echo "<script>location='register.php';</script>";
    }
    else{
        // Check if passwords match
        if($password != $confirmPassword){
            echo "<script>alert('Passwords do not match!');</script>";
            echo "<script>location='register.php';</script>";
        }
        else{
            // password hashing
            $password = password_hash($password, PASSWORD_BCRYPT);
            $confirmPassword = password_hash($confirmPassword, PASSWORD_BCRYPT);
            // Insert user data into database
            $query = "INSERT INTO user(firstName, lastName, birthDate, phone, state, email, password, confirmPassword, gender)
                VALUES(
                '".$_POST["firstname"]."',
                '".$_POST["lastname"]."',
                '".$_POST["birthdate"]."',
                '".($_POST["phone"])."',
                '".($_POST["state"])."',
                '$email',
                '$password',
                '$confirmPassword',
                '".($_POST["gender"])."')";
            
            $register = mysqli_query($conn,$query);
            if($register)
            {
                echo "<script>alert('New record created successfully');</script>";
                echo "<script>location='login.php';</script>";
            }
            else{
                echo "<script>alert('Something went wrong');</script>";
                echo "<script>location='register.php';</script>";
            }
        }
    }
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
                <form name="form" id="register_form" method="post" enctype="multipart/form-data" novalidate="novalidate"  class="p-5">
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
                        <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control mb-3" id="confirm_password" name="confirm_password" placeholder="Confirm your password">
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
    include("include/footer.php");
    ?>
    <?php
        }
        ?>
</body>
</html>
