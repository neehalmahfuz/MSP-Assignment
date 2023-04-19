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
    
    



/*$table = "CREATE TABLE user(
    id INT(15) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    birthDate DATE NOT NULL,
    phone INT(25) NOT NULL,
    state VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    confirmPassword VARCHAR(255) NOT NULL,
    gender VARCHAR(255) NOT NULL
	)";

if (mysqli_query($conn,$table)){
	echo"<p>Table created succesfully!</p>";
}*/


$firstname = "";
$lastname = "";
$birthdate = "";
$phone = "";
$state = "";
$email = "";
$password = "";
$confirmPassword = "";
$gender = "";


// Connect to database
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "userdb";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname, 3307);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle form submission
if (isset($_POST['submit'])) {
    // Get form data
    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $state = mysqli_real_escape_string($conn, $_POST['state']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

    // Validate form data
    $errors = array();
    if (empty($firstname)) {
        $errors[] = "First name is required";
    }
    if (empty($lastname)) {
        $errors[] = "Last name is required";
    }
    if (empty($birthdate)) {
        $errors[] = "Birth date is required";
    }
    if (empty($phone)) {
        $errors[] = "Phone number is required";
    }
    if (empty($state)) {
        $errors[] = "State is required";
    }
    if (empty($email)) {
        $errors[] = "Email address is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address";
    }
    if (empty($password)) {
        $errors[] = "Password is required";
    }
    if (empty($confirm_password)) {
        $errors[] = "Confirm password is required";
    } elseif ($password != $confirm_password) {
        $errors[] = "Passwords do not match";
    }
    if (empty($gender)) {
        $errors[] = "Gender is required";
    }

    // Insert user data into database if there are no errors
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (firstname, lastname, birthdate, phone, state, email, password, gender)
                VALUES ('$firstname', '$lastname', '$birthdate', '$phone', '$state', '$email', '$hashed_password', '$gender')";
        if (mysqli_query($conn, $sql)) {
            echo "Registration successful";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}

// Close database connection
mysqli_close($conn);


?>
    


    
    
    

    <div class="container d-flex align-items-center h-100">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <img src="res/register.jpg" class="img-fluid">
            </div>
            <div class="col-sm-6">
                <form name="form" id="register_form" method="post" action="login.php" enctype="text/plain" novalidate="novalidate"  class="p-5">
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
                            <input type="date" class="form-control mb-3" name="birthdate" id="birthdate">
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
                            <input type="password" class="form-control mb-3" name="password" id="password" placeholder="Your password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="confirm_password" class="col-sm-4 col-form-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control mb-3" name="confirm_password" id="confirm_password" placeholder="Confirm your password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="gender" class="col-sm-4 col-form-label">Gender</label>
                        <div class="col-sm-8">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="male">
                                <label class="form-check-label" for="male">Male</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="female">
                                <label class="form-check-label" for="female">Female</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="gender" id="other">
                                <label class="form-check-label" for="other">Other</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <input type="submit" class="btn btn-block mt-3" style="background-color: #FF6000; color: #ffffff;" value="Register" name="submit">
                        <label class="text-center mt-3">Already have an account? <a href="login.html" class="text-decoration-none">Log in</a></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
