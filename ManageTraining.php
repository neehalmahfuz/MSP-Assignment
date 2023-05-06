<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Admin Account</title>
</head>
<style>
    .btn-add {
        background-color: #FF6000; 
        color: #ffffff;
    }

    .btn-add:hover {
        background-color: #808080;
        color: #ffffff;
    }
    
</style>
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
$conn = mysqli_connect($servername, $username, $password, $dbname);

?>
<div class="container-fluid pt-7 pb-7">
        <div class="row mx-7">
            <div class="col-sm-12 d-flex justify-content-between mb-3">
                <h2>Training</h2>
                <a href="AddTrainingOption.php?Id=AddTraining" class="btn btn-block mt-3 btn-add" >Add Training Option</a>
            </div> 
            
            <div class="col-sm-12">
                <table class="table w-100 table-hover text-center">
                    <thead>
                        <tr>
                            <th>Course Number</th>
                            <th>Course Image</th>
                            <th>Course Name</th>
                            <th>Duration</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
            // Retrieve data and show the data into table sorting by email
            $count = 1;
            $SelectTraining = "SELECT * FROM tblcourse";
            $SelectTrainingresult = mysqli_query($conn, $SelectTraining);
            while ($row = mysqli_fetch_assoc($SelectTrainingresult)) { ?>
            <tr>
            <td><?php echo $count ?></td>
        <td><?php $listImg = $row['ImageCourse'];
		echo $Img = '<img src="CourseImage/'.$listImg.'" class="w-100" height=100/>';?></td>
        <td><?php echo $row["CourseName"];?></td>
        <td><?php echo $row["Duration"];?></td>
        <td><?php echo $row["PriceCourse"];?></td>
        <td><?php echo $row["ConpanyStatus"];?></td>
        <!--Delete User-->
        <?php
        echo "<td><a href=\"AddTrainingOption.php?Id=EditTraining&EditId=".$row['CourseName']."\" class='nav-link'>Edit</a></td>"
        ?>
    </tr>
    <?php $count++;
} ?>



                        
                    </tbody>
                </table>

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
