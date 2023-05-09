<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Manage Request</title>
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
if($_GET['Id'] == "GetRequest"){

    $SelectTraining = "SELECT * FROM tbltrainingrequest WHERE RequestId  = '".$_GET['RequestId']."' ";
            $SelectTrainingresult = mysqli_query($conn, $SelectTraining);
            while ($row = mysqli_fetch_assoc($SelectTrainingresult)) {
                session_start();
                $_SESSION['email'] = $row["email"];
            }
    

    $UpdateRequest = "UPDATE tbltrainingrequest SET
        PaymentStatus = 'Approve',
        RequestStatus = 'confirmed'
		WHERE RequestId  = '".$_GET['RequestId']."' ";
		$UpdateResult = mysqli_query($conn,$UpdateRequest);
		if($UpdateResult)
		{
			echo "<script>alert('Save changes');</script>";
			echo "<script>location='admin_dashboard.php';</script>";
		}
        else{
            echo "<script>alert('something wrong');</script>";
			echo "<script>location='admin_dashboard.php';</script>";
        }
}
else{

?>
<div class="container-fluid pt-7 pb-7">
        <div class="row mx-7">
         
            <div class="col-sm-12">
                <table class="table w-100 table-hover text-center">
                    <thead>
                        <tr>
                            <th>Request Number</th>
                            <th>Email</th>
                            <th>Course Name</th>
                            <th>Payment method</th>
                            <th>Payment status</th>
                            <th>Request Time</th>
                            <th>Request status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
            
            $count = 1;
            $SelectRequest = "SELECT * FROM tbltrainingrequest WHERE RequestStatus = 'Pending'";
            $SelectRequestResult = mysqli_query($conn, $SelectRequest);
            while ($row = mysqli_fetch_assoc($SelectRequestResult)) { ?>
           
            <tr>
                <?php $row["RequestId"]?>
            <td><?php echo $count ?></td>
            <td><?php echo $row["email"];?></td>
            <td><?php echo $row["CourseName"];?></td>
            <td><?php echo $row["PaymentMethod"];?></td>
            <td><?php echo $row["PaymentStatus"];?></td>
            <td><?php echo $row["RequestTime"];?></td>
            <td><?php echo $row["RequestStatus"];?></td>
        
        <?php
        echo "<td><a href=\"ManageTrainingRequest.php?Id=GetRequest&RequestId=".$row['RequestId']."\" class='nav-link'>Approve</a></td>"
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
}
    include("include/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
