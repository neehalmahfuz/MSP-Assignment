<?php
session_start();
ini_set("date.timezone","Asia/Kuching");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Payment Portal</title>
</head>
<style>
    .btn-training {
        background-color: #FF6000;
        border: #FF6000;
        color: white;
    }

    .btn-training:hover {
        background-color: #FFFFFF;
        color: #FF6000;
    }
</style>
<body>
<?php

include("include/navbar.php");

error_reporting(0);
	$Username = "CAdmin";
	$Password = "admin";
	$Host = "localhost";
	$Database = "dbtraining";

	$Link = mysqli_connect($Host,$Username,$Password,$Database) or die(mysqli_error());
	include("include/navbar.php");
	
	if($_POST['place_order']){
		$datetime = new DateTime();
		$datetime_str = $datetime->format('Y-m-d H:i:s');
		
		$SelectOption = "SELECT * FROM tblcourse WHERE CourseName = '".$_GET['OptionId']."' ";
		$SelectOptionRs = mysqli_query($Link,$SelectOption);
		if(mysqli_num_rows($SelectOptionRs) > 0)
		{
			$Selectrow = mysqli_fetch_array($SelectOptionRs);
			$AddRequestInfo = "INSERT INTO tbltrainingrequest(email,CourseName,PaymentMethod,RequestTime,RequestStatus)
			VALUES(
			'".trim($_POST["email"])."',
			'".trim($Selectrow['CourseName'])."',
			'".trim($_POST["method"])."',
			'".$datetime_str."',
			'Pending')";
			$RequestInfoResult = mysqli_query($Link,$AddRequestInfo);
			if($RequestInfoResult)
			{
				echo "<script>alert('New record created successfully');</script>";
				echo "<script>location='index.php';</script>";
			}
			else
				echo "<script>alert('Something wrong');</script>";
			echo "<script>location='index.php';</script>";
		}
	}
	else if($_GET['Id'] == "GetOption" && $_GET['OptionId'] != "")
	{
		$SelectOption = "SELECT * FROM tblcourse WHERE CourseName = '".$_GET['OptionId']."' ";
		$SelectOptionRs = mysqli_query($Link,$SelectOption);
		if(mysqli_num_rows($SelectOptionRs) > 0)
		{
			while($Selectrow = mysqli_fetch_array($SelectOptionRs))
			{
				$SelectImg = $Selectrow['ImageCourse'];
?>
    <div class="container-fluid px-4">
        <div class="row my-5">
            <h2>Checkout</h2>
            <div class="col-sm-6">
			
                <form name="form" id="form" method="POST" >
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control mb-3" id="fname" name="fname" placeholder="Your first name" value = "<?php echo $_SESSION['firstname'] ?>">

                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control mb-3" id="lname" name="lname" placeholder="Your last name" value = "<?php echo $_SESSION['lastname'] ?>">

                    <label for="country">Country</label>
                    <select name="country" id="country" class="form-control mb-3" name = "country">
                        <option value="Malaysia">Malaysia</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Japan">Japan</option>
                    </select>

                    <label for="email">Email Address</label>
                    <input type="email" class="form-control mb-3" id="email" name = "email" placeholder="Your email address" value = "<?php echo $_SESSION['email'] ?>">

                    <label for="phone">Phone</label>
                    <input type="text" class="form-control mb-3" id="phone" name="phone" placeholder="Your phone" value = "<?php echo $_SESSION['phone'] ?>">

            </div>
            <div class="col-sm-6">
                <h5>Your Order</h5>
                <table class="table w-100">
                    <tr>
                        <th>Product</th>
                        <th>Subtotal</th>
                    </tr>
                    <tr>
                        <td>
						<?php
							echo '<img src="CourseImage/'.$SelectImg.'"/ class="img-fluid" width="100">';
							echo '<label>'.$Selectrow["CourseName"].'</label>'
						?>
                        </td>
                        <td>
                            <p>RM <?php echo $Selectrow['PriceCourse']?></p>
                        </td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>RM <?php echo $Selectrow['PriceCourse']?></td>
                    </tr>
                </table>

                <h5 class="mt-4">Payment Method</h5>
                <label for="fname">Credit Card Number</label>
                <input type="text" class="form-control mb-3" id="creditcard" name = "creditcard" placeholder="Your credit card number">

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="method" id="method1" value = "Credit Card">
                    <label class="form-check-label" for="method1">
                      Credit Card
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="method" id="method2" value = "Cash" checked>
                    <label class="form-check-label" for="method2">
                      Cash
                    </label>
                </div>
				
                <input type="submit" name="place_order" id="place_order" class="btn btn-training btn-block w-100 mt-3" value="Request training">
                </form>
            </div>
        </div>
    </div>
<?php
			}
		}
	}
?>
    <footer class="text-center text-lg-start bg-light text-muted mt-5 pt-3">
        <section>
            <div class="container text-center text-md-start mt-5">
                <div class="row">
                    <div class="col-sm-5">
                        <h6 class="text-uppercase fw-bold mb-3">ETM - Training Expert</h6>
                        <p> ETM is a Sarawak-based training company that offers in-house or on-site training to business and staff.</p>
                    </div>

                    <div class="col-sm-3">
                        <h6 class="text-uppercase fw-bold mb-3">Quick Link</h6>
                        <p><a href="homepage.html" class="text-reset">Home</a></p>
                        <p><a href="training_option.html" class="text-reset">Training Catalog</a></p>
                        <p><a href="contactus.html" class="text-reset">Contact Us</a></p>
                    </div>

                    <div class="col-sm-4">
                        <h6 class="text-uppercase fw-bold mb-3">Contact</h6>
                        <p> Sarawak, Malaysia</p>
                        <p> etm@example.com </p>
                        <p>+ 01 234 567 88</p>
                    </div>
                </div>
            </div>
        </section>

        <div class="text-center p-4">
            <hr class="mb-4">
        © 2023 Copyright: <a class="text-reset fw-bold" href="homepage.html">ETM - Expert Training</a>
        </div>
    </footer>
</body>
</html>
