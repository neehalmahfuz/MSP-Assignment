<?php
error_reporting(0);
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

        $CheckEmail = "SELECT * FROM user WHERE email = '".$_POST['email']."' AND password = '".$_POST['password']."' ";
        $CheckEmailRs = mysqli_query($conn,$CheckEmail);
		if(mysqli_num_rows($CheckEmailRs) > 0){
            $SelectOption = "SELECT * FROM tblcourse WHERE CourseName = '".$_GET['OptionId']."' ";
            $SelectOptionRs = mysqli_query($conn,$SelectOption);
            if(mysqli_num_rows($SelectOptionRs) > 0)
            {
                $Selectrow = mysqli_fetch_array($SelectOptionRs);
                $AddRequestInfo = "INSERT INTO tbltrainingrequest(email,CourseName,PaymentMethod,CreditCardNum,RequestTime,RequestStatus)
                VALUES(
                '".trim($_POST["email"])."',
                '".trim($Selectrow['CourseName'])."',
                '".trim($_POST["method"])."',
                '".trim($_POST['creditcard'])."',
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
        else{
            echo "<script>alert('Email or Password is incorrect');</script>";
                echo "<script>location='index.php';</script>";
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

                <form name="form" id="form" method="POST" >
                    <label for="venue">Venue</label>
                    <input type="text" class="form-control mb-3" id="venue" name = "venue" placeholder="Your prefered venue..">

                    <label for="date">Date</label>
                    <input type="date" class="form-control mb-3" id="date" name="date">

                    <label for="pax">Pax</label>
                    <input type="number" class="form-control mb-3" id="pax" name="pax" placeholder="Amount of people..">

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
                

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="method" id="method1" value = "Credit Card">
                    <label class="form-check-label" for="method1">
                      Credit Card
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="method" id="method2" value = "Cash">
                    <label class="form-check-label" for="method2">
                      Cash
                    </label>
                </div>
                <br>
                <div id="payment-details">
                    <!-- input field will be added dynamically here -->
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
    <?php
    include("include/footer.php");
    ?>

<script>
  const paymentDetailsDiv = document.getElementById('payment-details');
  const creditCardInput = `
                <div class="row">
                    <div class="col-8">
                        <label for="creditcard">Card number</label>
                        <input type="text" class="form-control mb-3" id="creditcard" name= "creditcard" placeholder="***************">
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
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
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
  `;
  const cashInput = '<label for="cash">Payment Receipt</label><input type="file" class="form-control mb-3" id="cash" name= "cash">';

  const methodRadioButtons = document.getElementsByName('method');
  for (let i = 0; i < methodRadioButtons.length; i++) {
    methodRadioButtons[i].addEventListener('change', function() {
      if (this.value === 'Credit Card') {
        paymentDetailsDiv.innerHTML = creditCardInput;
      } else if (this.value === 'Cash') {
        paymentDetailsDiv.innerHTML = cashInput;
      }
    });
  }
</script>
</body>
</html>
