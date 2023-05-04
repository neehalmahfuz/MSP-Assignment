<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Account</title>
</head>
<body>
<?php
error_reporting(0);

include("include/navbar.php");
// Connect to database
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
    
// default port is not working for mySQL, assign the new port manually, can discard this
$conn = mysqli_connect($servername, $username, $password, $dbname, 3307);

if($_POST['btnAddAcc'])
{
    session_start();
    
    $_SESSION['firstname'] = trim($_POST["firstname"]);
    $_SESSION['lastname'] = trim($_POST["lastname"]);
    $_SESSION['birthdate'] = trim($_POST["birthdate"]);
    $_SESSION['phone'] = trim($_POST["phone"]);
    $_SESSION['state'] = trim($_POST["state"]);
    $_SESSION['email'] = trim($_POST["email"]);
    $_SESSION['gender'] = trim($_POST["gender"]);

    $email = $_POST["txtAccEmail"];
    $password = $_POST["txtPassword"];
    $confirmPassword = $_POST["txtConfirmPassword"];
    
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
        
            // Insert user data into database
            $query = "INSERT INTO user(firstName, lastName, birthDate, phone, state, email, accType, password, confirmPassword, gender)
                VALUES(
                '".$_POST["txtAccFirstName"]."',
                '".$_POST["txtAccLastName"]."',
                'NULL',
                'NULL',
                'NULL',
                '$email',
                'Admin',
                '$password',
                '$confirmPassword',
                'NULL')";
            
            $addAdmin = mysqli_query($conn,$query);
            if($addAdmin)
            {
                echo "<script>alert('New record created successfully');</script>";
                echo "<script>location='admin_acc.php';</script>";
            }
            else{
                echo "<script>alert('Something went wrong');</script>";
                echo "<script>location='insert_admin.php';</script>";
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
                <form name="form" id="form" method="post" enctype="multipart/form-data" novalidate="novalidate" class="p-5">
                    <h1 class="mb-4" style="color: #454545;">Add Admin Account</h1>
                    <div class="row mb-3">
                        <label for="txtAccFirstName" class="col-sm-4 col-form-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="txtAccFirstName" name = "txtAccFirstName" placeholder="Admin First Name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txtAccLastName" class="col-sm-4 col-form-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="txtAccLastName" name = "txtAccLastName" placeholder="Admin Last Name">
                        </div>
                    </div>
					<div class="row mb-3">
                        <label for="txtAccEmail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control mb-3" id="txtAccEmail" name="txtAccEmail" placeholder="Admin Email">
                        </div>
                    </div>
					<div class="row mb-3">
                        <label for="txtPassword" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control mb-3"  id="txtPassword" name="txtPassword" placeholder="Password">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txtConfirmPassword" class="col-sm-4 col-form-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control mb-3"  id="txtConfirmPassword" name="txtConfirmPassword" placeholder="Password">
                        </div>
                    </div>
					
                    
					<div class="row">
                        <input type="submit" name="btnAddAcc" id="btnAddAcc" class="btn btn-block mt-3" style="background-color: #FF6000; color: #ffffff;" value="Add Admin Account">
                        
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>