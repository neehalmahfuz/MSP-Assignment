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

<body class="h-100">
<?php include("include/navbar.php");?>
    <div class="container d-flex align-items-center h-100">
        <div class="row">
            <div class="col-sm-6 d-flex align-items-center">
                <img src="res/login.jpg" class="img-fluid">
            </div>
            <div class="col-sm-6 align-self-center">
                <form action="" class="p-5">
                    <h1 class="mb-4" style="color: #454545;">Login Form</h1>
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
                    
                    <div class="row">
                        <button type="button" class="btn btn-block mt-3" style="background-color: #FF6000; color: #ffffff;">Log In</button>
                        <label class="text-center mt-3">Don't have an account yet? <a href="register.html" class="text-decoration-none">Register</a></label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
