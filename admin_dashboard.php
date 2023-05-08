<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Dashboard</title>
</head>
<body>

<?php

include("include/navbar.php");

?>

<div class="container-fluid pt-5 pb-5">
    <div class="row">
        <div class="col-sm-4 mt-3">
            <div class="shadow p-3 bg-white rounded">
                <img src="res/banner1.png" class="w-100" height=250>
                    <div class="mt-2 text-center">
                        <h4 class="training-option-title"><a href="admin_acc.php" class="text-decoration-none">Manage Admin Account</a></h4>
                    </div>
            </div>
        </div>
        <div class="col-sm-4 mt-3">
            <div class="shadow p-3 bg-white rounded">
                <img src="res/banner2.png" class="w-100" height=250>
                    <div class="mt-2 text-center">
                        <h4 class="training-option-title"><a href="ManageTrainingRequest.php" class="text-decoration-none">Manage User Training</a></h4>
                    </div>
            </div>
        </div>
        <div class="col-sm-4 mt-3">
            <div class="shadow p-3 bg-white rounded">
                <img src="res/banner1.png" class="w-100" height=250>
                    <div class="mt-2 text-center">
                        <h4 class="training-option-title"><a href="ManageTraining.php" class="text-decoration-none">Manage Training Course</a></h4>
                    </div>
            </div>
        </div>
    </div>
</div>

<?php
    include("include/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
