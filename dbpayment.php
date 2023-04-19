<?php
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $country = $_POST['country'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $creditcard = $_POST['creditcard'];

  //Database connection
  $conn = new mysqli('localhost','root','','dbpayment');
  if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
  }else{
    $stmt = $conn->prepare("INSERT INTO paymentdetails(fname, lname, country, email, password, creditcard)
    VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssi",$fname,$lname,$country,$email,$password,$creditcard);
    $stmt->execute();
    echo "Payment Made";
    $stmt->close();
    $conn->close();

  }
?>
