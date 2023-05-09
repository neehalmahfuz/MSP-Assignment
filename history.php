<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>History Page</title>
</head>
<body>
<?php
error_reporting(0);

include("include/navbar.php");
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
$conn = mysqli_connect($servername, $username, $password, $dbname, 3307);
// Check if connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$conn = mysqli_connect($servername, $username, $password, $dbname, 3307);
if($_GET['Id'] == "GetRequest"){

    
    $UpdateRequest = "UPDATE tbltrainingrequest SET
        RequestStatus = 'Cancelled'
		WHERE RequestId  = '".$_GET['RequestId']."' ";
		$UpdateResult = mysqli_query($conn,$UpdateRequest);
		if($UpdateResult)
		{
			echo "<script>alert('Save changes');</script>";
			echo "<script>location='history.php';</script>";
		}
        else{
            echo "<script>alert('something wrong');</script>";
			echo "<script>location='history.php';</script>";
        }
}
else{
?>



    <div class="container-fluid pt-5 pb-5">
        <div class="row mx-5">
            <div class="col-sm-12 d-flex justify-content-between mb-3">
                <h2>History</h2>
                
                <form method="POST" action="">
    <select name="filter" id="filter" onchange="this.form.submit()">
        <option value="all" <?php if(isset($_POST['filter']) && $_POST['filter'] == 'all') { echo 'selected'; } ?>>All</option>
        <option value="pending" <?php if(isset($_POST['filter']) && $_POST['filter'] == 'pending') { echo 'selected'; } ?>>Pending</option>
        <option value="completed" <?php if(isset($_POST['filter']) && $_POST['filter'] == 'completed') { echo 'selected'; } ?>>Completed</option>
        <option value="ongoing" <?php if(isset($_POST['filter']) && $_POST['filter'] == 'ongoing') { echo 'selected'; } ?>>Ongoing</option>
        <option value="cancelled" <?php if(isset($_POST['filter']) && $_POST['filter'] == 'cancelled') { echo 'selected'; } ?>>Cancelled</option>
        <option value="confirmed" <?php if(isset($_POST['filter']) && $_POST['filter'] == 'confirmed') { echo 'selected'; } ?>>Confirmed</option>
    </select>
</form>
            </div>  
            <div class="col-sm-12">
                <table class="table w-100 table-hover text-center">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Training title</th>
                            <th>Pax</th>
                            <th>Price</th>
                            <th>Payment method</th>
                            <th>Venue</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                   $filter = isset($_POST['filter']) ? $_POST['filter'] : 'all';
                   if($filter == "all") {
                     $sel_query = "SELECT * FROM tblcourse, tbltrainingrequest, user WHERE tblcourse.CourseName = tbltrainingrequest.CourseName AND user.email = tbltrainingrequest.email AND tbltrainingrequest.email = '{$_SESSION['email']}'";
                   } else {
                     $sel_query = "SELECT * FROM tblcourse, tbltrainingrequest, user WHERE tblcourse.CourseName = tbltrainingrequest.CourseName AND user.email = tbltrainingrequest.email AND tbltrainingrequest.email = '{$_SESSION['email']}' AND tbltrainingrequest.RequestStatus = '$filter'";
                   }
                    $result = mysqli_query($conn, $sel_query);
                        while ($row = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                
                            <td><?php $listImg = $row['ImageCourse'];
                            echo $Img = '<img src="CourseImage/'.$listImg.'" class="w-100" height=100/>';?></td>
                                <td><?php echo $row["CourseName"];?></td>
                                <td><?php echo $row["Pax"];?></td>
                                <td><?php echo $row["PriceCourse"];?></td>
                                <td><?php echo $row["PaymentMethod"];?></td>
                                <td><?php echo $row["Venue"];?></td>
                                <td><?php echo $row["Date"];?></td>
                                <td><?php echo $row["RequestStatus"];?></td>
                                <!--Delete User-->
                                <td><a href="history.php?Id=GetRequest&RequestId=<?php echo $row['RequestId']; ?>" class="nav-link" onclick='return confirm("Are you sure you want to cancel the training request? Please note that there will be no refund after cancellation.")'>Delete</a></td>

                            </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>   
    </div>
    <?php
}
?>

    <?php
    include("include/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
