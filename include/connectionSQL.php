<?php 
// Create connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

$conn = mysqli_connect($servername, $username, $password, $dbname, 3307);

// Check connection
if (!$conn){
    die("Connection failed:" . mysqli_connect_error());
}

?>