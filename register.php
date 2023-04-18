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
    <?php include("include/navbar.php");?>
    

    <div class="container d-flex align-items-center h-100">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <img src="res/register.jpg" class="img-fluid">
            </div>
            <div class="col-sm-6">
                <form name="form" id="register_form" method="post"  enctype="text/plain" novalidate="novalidate"  class="p-5" onsubmit="return validateForm()">
                    <h1 class="mb-4" style="color: #454545;">Registration Form</h1>
                    <div class="row mb-3">
                        <label for="firstname" class="col-sm-4 col-form-label">First Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="firstname" placeholder="Your first name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="lastname" class="col-sm-4 col-form-label">Last Name</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="lastname" placeholder="Your last name">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="birthdate" class="col-sm-4 col-form-label">Birth Date</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control mb-3" id="birthdate">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="phone" class="col-sm-4 col-form-label">Phone Number</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="phone" placeholder="Your phone number">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="state" class="col-sm-4 col-form-label">State</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control mb-3" id="state" placeholder="Your state">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-4 col-form-label">Email Address</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control mb-3" id="email" placeholder="Your email address">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="password" class="col-sm-4 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control mb-3" id="password" placeholder="Your password">
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
                        <input type="submit" class="btn btn-block mt-3" style="background-color: #FF6000; color: #ffffff;" value="Register">
                        <label class="text-center mt-3">Already have an account? <a href="login.html" class="text-decoration-none">Log in</a></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
