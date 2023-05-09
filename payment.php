<?php
error_reporting(0);
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css" integrity="sha512-Lr+LJdIOA6wOg6ZJGmug+UO4DxDgFkxmcJgzXc+H0j01OQJokh0e5Q5cNsvYllRmb5fBrEdJyJP9X3q/3yFnGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
  <script>
  function validateForm() {
    var venue = document.forms["form"]["venue"].value;
    var date = document.forms["form"]["date"].value;
    var pax = document.forms["form"]["pax"].value;
    var method = document.forms["form"]["method"].value;
    var creditcard = document.forms["form"]["creditcard"].value;
    var cvv = document.forms["form"]["cvv"].value;

    var errors = [];

    if (venue == "" || date == "" || pax == "" || method == "" || creditcard == "" || cvv == "") {
      errors.push("Please fill in all required fields.");
    }

    var regex = /^[0-9]{16}$/;
    if (!regex.test(creditcard)) {
      errors.push("Please enter a valid credit card number. It must be 16 digits with no dashes or spaces.");
    }

    var cvvRegex = /^[0-9]{3}$/;
    if (!cvvRegex.test(cvv)) {
      errors.push("Please enter a valid CVV. It must be a 3 digit number.");
    }

    var maxPax = 6;
    if (pax > maxPax) {
      errors.push("Maximum number of pax is " + maxPax);
    }

    var dateFormat = /^(19|20)\d{2}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/;
    if (!date.match(dateFormat)) {
      errors.push("Please enter a valid date in the format yyyy-mm-dd.");
    }

    var currentDate = new Date();
    var selectedDate = new Date(date);
    if (selectedDate < currentDate) {
      errors.push("Please select a future date.");
    }

    if (errors.length > 0) {
      alert(errors.join("\n"));
      return false;
    }

    return true;
  }
  </script>

<?php

include("include/navbar.php");

	// Connect to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "database";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check if connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    if($_POST['place_order']){
    $datetime = new DateTime();
    $datetime_str = $datetime->format('Y-m-d H:i:s');
    if($_SESSION['email'] == true){
        $SelectOption = "SELECT * FROM tblcourse WHERE CourseName = '".$_GET['OptionId']."' ";
        $SelectOptionRs = mysqli_query($conn,$SelectOption);
        $filename = $_FILES["cash"]["name"];
        $tempname = $_FILES["cash"]["tmp_name"];
        $folder = "receipts_images/".$filename;

        mkdir("receipts_images");
        move_uploaded_file($tempname, $folder);
        if(mysqli_num_rows($SelectOptionRs) > 0)
        {
            if($_POST['creditcard'] == ""){
                $getVALUE = " Cash";
            }
            else{
                $getVALUE = " Credit Card";
            }
            $Selectrow = mysqli_fetch_array($SelectOptionRs);
            $AddRequestInfo = "INSERT INTO tbltrainingrequest(email,CourseName,Venue,Date,Pax,CVV,Images,PaymentMethod,CreditCardNum,PaymentStatus,RequestTime,RequestStatus)
            VALUES(
            '".trim($_SESSION["email"])."',
            '".trim($Selectrow['CourseName'])."',
            '".trim($_POST["venue"])."',
            '".trim($_POST["date"])."',
            '".trim($_POST["pax"])."',
            '".trim($_POST["cvv"])."',
            '$folder',
            '".trim($getVALUE)."',
            '".trim($_POST['creditcard'])."',
            'Pending',
            '".$datetime_str."',
            'Pending')";
            $RequestInfoResult = mysqli_query($conn,$AddRequestInfo);
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
}

	else if($_GET['Id'] == "GetOption" && $_GET['OptionId'] != "")
	{
		$SelectOption = "SELECT * FROM tblcourse WHERE CourseName = '".$_GET['OptionId']."' ";
		$SelectOptionRs = mysqli_query($conn,$SelectOption);
		if(mysqli_num_rows($SelectOptionRs) > 0)
		{
			while($Selectrow = mysqli_fetch_array($SelectOptionRs))
			{
				$SelectImg = $Selectrow['ImageCourse'];
      }
		}
	}


?>
    <div class="container-fluid px-5">
        <div class="row my-5">
            <h2>Checkout</h2>
            <div class="col-sm-6">

                <form name="form" id="form" method="POST" enctype="multipart/form-data">
                    <label for="venue">Venue</label>
                    <select name = "venue" id = "venue" class="form-control mb-3">
                      <option value = "Sarawak Plaza">Sarawak Plaza</option>
                      <option value = "Balairong Seri Banquet Hall">Balairong Seri Banquet Hall</option>
                      <option value = "Tunku Abdul Rahman Putra Hall">Tunku Abdul Rahman Putra Hall</option>
                      <option value = "11Ridgeway Kuching">11Ridgeway Kuching</option>
                      <option value = "Cityone Megamall Event Hall">Cityone Megamall Event Hall</option>
                    </select>

                    <label for="date">Date</label>
                    <input type="date" class="form-control mb-3" id="date" name="date">

                    <label for="pax">Pax</label>
                    <input type="number" class="form-control mb-3" id="pax" name="pax" placeholder="Amount of people.." min="1" max="6" >

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
                            <p>RM <?php
                            $SelectOptionRs = mysqli_query($conn,$SelectOption);
                            $SelectOption = "SELECT * FROM tblcourse WHERE CourseName = '".$_GET['OptionId']."' ";
                            $Selectrow = mysqli_fetch_array($SelectOptionRs);
                             echo $Selectrow['PriceCourse']?></p>
                        </td>
                    </tr>
                    <tr>
                        <th>Total</th>
                        <td>RM <?php echo $Selectrow['PriceCourse']?></td>
                    </tr>
                </table>

                <h5 class="mt-4">Payment Method</h5>


                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#credit">Credit Card</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#cash">Cash</a></li>
                </ul>

                <div class="tab-content">
                    <div id="credit" class="tab-pane fade show active">
                    <div class="row mt-3">
                            <div class="col-8">
                                <label for="creditcard">Card number</label>
                                <input type="text" class="form-control mb-3" id="creditcard" name="creditcard" placeholder="***************">
                            </div>
                            <div class="col-4">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control mb-3" name="cvv" id="cvv" placeholder="***">
                            </div>
                            <label for="month">Valid until</label>
                            <div class="col-6">
                                <select name="month" id="month" class="form-control">
                                    <option value="january">January</option>
                                    <option value="february">February</option>
                                    <option value="march">March</option>
                                    <option value="april">April</option>
                                    <option value="may">May</option>
                                    <option value="june">June</option>
                                    <option value="july">July</option>
                                    <option value="august">August</option>
                                    <option value="september">September</option>
                                    <option value="october">October</option>
                                    <option value="november">November</option>
                                    <option value="december">December</option>
                                </select>
                            </div>
                            <div class="col-6">
                                <select name="year" id="year" class="form-control">
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div id="cash" class="tab-pane fade">
                                <div class="row mt-3">
                                    <div class="col-8">
                                        <label for="cash" class="form-label">Payment Receipt</label>
                                        <input type="file" class="form-control mb-3" id="cash" name="cash">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <input type="submit" name="place_order" id="place_order" class="btn btn-training btn-block w-100 mt-5 py-2" value="Request training">
                </form>
            </div>
        </div>
    </div>

    <?php
    include("include/footer.php");
    ?>
</body>
</html>
