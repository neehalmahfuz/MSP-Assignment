<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Notification</title>
</head>
<style>

    .card-body {
        overflow-y: scroll;
        max-height: 500px; 
    }

    .card {
        border-top: 2px solid #FF6000
    }
</style>
<body>

<?php

include("include/navbar.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
    
// default port is not working for mySQL, assign the new port manually, can discard this
$conn = mysqli_connect($servername, $username, $password, $dbname);

?>
<div class="container-fluid pt-5 pb-5 px-5">
<div class="row">
  <div class="col-sm-12">
    <h2 class="mb-3">Notifications</h2>
    <div class="card-body p-5" data-spy="scroll" data-target="#card-body">
      
        <?php
        $select = "SELECT * FROM user,tblcourse,tbltrainingrequest WHERE user.email = tbltrainingrequest.email AND tblcourse.CourseName = tbltrainingrequest.CourseName AND tbltrainingrequest.RequestStatus = 'confirmed' AND tbltrainingrequest.email = '".$_SESSION['email']."' ";
        $result = mysqli_query($conn, $select);
        while ($row = mysqli_fetch_assoc($result)) {
          $date = $row["Date"];
          $date_timestamp = strtotime($date);
          $remaining_days = ceil(($date_timestamp - time()) / (60 * 60 * 24));
        ?>
        
        <div class="card mb-4">
          <div class="card-body">
            <p class="small mb-0">Admin</p>
            <p>Your  <span class="fw-bold"><?php echo $row["CourseName"]; ?></span> training have been <span class="text-primary"><?php echo $row["RequestStatus"]; ?></p>
          </div>
        </div>


        <div class="card mb-4">
          <div class="card-body">
            <p class="small mb-0">Admin</p>
            <p>Your <span class="fw-bold"><?php echo $row["CourseName"]; ?></span> training at <?php echo $row["Venue"]; ?>  will start on <span class="text-primary"><?php echo $date; ?></span> (<?php echo $remaining_days; ?> days remaining)</p>
          </div>
        </div>
        <?php
        }
        ?>
        
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
