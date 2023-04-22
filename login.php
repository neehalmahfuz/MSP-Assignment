<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
<?php
include("include/navbar.php");
error_reporting(0);
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3307);
// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if(isset($_POST['btnLogin']))
{
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Check if email and password match database
    $query = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        // Login successful
        $row = mysqli_fetch_assoc($result);
        $_SESSION['firstname'] = $row['firstName'];
        $_SESSION['lastname'] = $row['lastName'];
        $_SESSION['birthdate'] = $row['birthDate'];
        $_SESSION['phone'] = $row['phone'];
        $_SESSION['state'] = $row['state'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['gender'] = $row['gender'];
        
        header("Location: homepage.php"); // Redirect to homepage
        exit();
    }
    else{
        // Login failed
        echo "<script>alert('Invalid email or password');</script>";
        echo "<script>location='login.php';</script>";
    }
}


?>
    <div class="container d-flex align-items-center h-100">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <img src="res/login.jpg" class="img-fluid">
            </div>
            <div class="col-sm-6 align-self-center">
                <form name="form" id="login_form" method="post" enctype="multipart/form-data" novalidate="novalidate"  class="p-5">
                    <h1 class="mb-4" style="color: #454545;">Login Form</h1>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label">Email Address</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Your email address" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control mb-3" id="password" name="password" placeholder="Your password" required>
                        </div>
                    </div>
                    
                    <div class="row">
                        <input type="submit" name="btnLogin" id="btnLogin" class="btn btn-block mt-3" style="background-color: #FF6000; color: #ffffff;" value="Log In">
                        <label class="text-center mt-3">Don't have an account yet? <a href="register.html" class="text-decoration-none">Register</a></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
