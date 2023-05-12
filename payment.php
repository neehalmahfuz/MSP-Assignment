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
    <script>
        window.onload = function() {

      var creditTab = document.querySelector('.nav-link[data-bs-toggle="tab"][href="#credit"]');
      var cashTab = document.querySelector('.nav-link[data-bs-toggle="tab"][href="#cash"]');

      // add click event listeners
      creditTab.addEventListener('click', function() {

        document.getElementById('creditcard').disabled = false;
        document.getElementById('cvv').disabled = false;
        document.getElementById('month').disabled = false;
        document.getElementById('year').disabled = false;
        document.getElementById('cash').disabled = true;
      });

      cashTab.addEventListener('click', function() {

        document.getElementById('creditcard').disabled = true;
        document.getElementById('cvv').disabled = true;
        document.getElementById('month').disabled = true;
        document.getElementById('year').disabled = true;
        document.getElementById('cash').disabled = false;


        document.getElementById('creditcard').value = '';
        document.getElementById('cvv').value = '';
      });
    }

    function clearFileInput() {
        document.getElementById('cash_receipt').value = '';
    }
    </script>
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
        $Selectrow = mysqli_fetch_array($SelectOptionRs);
        $selected_date = strtotime($_POST['date']);
        $current_date = strtotime(date('Y-m-d'));
        mkdir("receipts_images");
        move_uploaded_file($tempname, $folder);
        if(mysqli_num_rows($SelectOptionRs) > 0)
        {
          $error_message = '';

          if(empty($_POST['venue'])){
              $error_message .= 'Please enter a venue.\n';
          }
          if(empty($_POST['date'])){
              $error_message .= 'Please select a date.\n';
          }
          if ($selected_date < $current_date) {
            $error_message .= 'Please select a future date.\n';
          }
          if(empty($_POST['pax'])){
              $error_message .= 'Please enter the number of pax.\n';
          }
          if(empty($_POST['cvv']) && empty($filename)){
              $error_message .= 'Please enter the CVV number. It must be a 3 digit number\n';
          }
          if($_POST['creditcard'] == "" && $_POST['cvv'] == "" && empty($filename)){
              $error_message .= 'Please select a payment method.\n';
          }
          if(strlen($_POST['creditcard']) !== 16 && empty($filename)){
              $error_message .= 'Please enter a valid credit card number. It must be 16 digits with no dashes or spaces.\n';
          }
          if(!empty($filename) && (!empty($_POST['creditcard']) || !empty($_POST['cvv']))){
              $error_message .= 'Cannot make payment with both credit card and cash.\n';
          }

          if (!empty($error_message)) {
              echo "<script>alert('$error_message');</script>";
              echo "<script>window.history.back();</script>";
          } else {
            
              if($_POST['creditcard'] == ""){
                $getVALUE = " Cash";
              }
              else{
                  $getVALUE = " Credit Card";
              }
              $AddRequestInfo = "INSERT INTO tbltrainingrequest(email,CourseName,Venue,Date,Pax,CVV,Images,PaymentMethod,CreditCardNum,PaymentStatus,RequestTime,RequestStatus)
              VALUES(
              '".trim($_SESSION["email"])."',
              '".trim($Selectrow['CourseName'])."',
              '".trim($_POST["venue"])."',
              '".trim($_POST["date"])."',
              '".trim($_POST["pax"])."',
              '".trim($_POST["cvv"])."',
              '$filename',
              '".trim($getVALUE)."',
              '".trim($_POST['creditcard'])."',
              'Pending',
              '".$datetime_str."',
              'Pending')";
              $RequestInfoResult = mysqli_query($conn,$AddRequestInfo);
              if($RequestInfoResult)
              {
                  echo "<script>alert('New record created successfully');</script>";
                  echo "<script>location='TrainingOption.php';</script>";
              }
              else
                  echo "<script>alert('Something wrong');</script>";
              echo "<script>location='index.php';</script>";
          }
        }
    }
    else{
        echo "<script>alert('Please login first');</script>";
        echo "<script>location='login.php';</script>";
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
      


?>
    <div class="container-fluid px-5">
        <div class="row my-5">
            <h2>Checkout</h2>
            <div class="col-sm-6">

                <form name="form" id="form" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
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

                

                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#credit" onclick="clearFileInput()">Credit Card</a></li>
                    <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#cash">Cash</a></li>
                </ul>

                <div class="tab-content">
                    <div id="credit" class="tab-pane fade show active">
                    <div class="row mt-3">
                            <div class="col-8">
                                <label for="creditcard">Card number</label>
                                <input type="text" class="form-control mb-3" id="creditcard" name="creditcard" placeholder="***************" maxlength = "16">
                            </div>
                            <div class="col-4">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control mb-3" name="cvv" id="cvv" placeholder="***" maxlength = "3">
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
                                        <input type="file" class="form-control mb-3" id="cash_receipt" name="cash">
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
			}
		}
	}
?>
    <?php
    include("include/footer.php");
    ?>
</body>
</html>
