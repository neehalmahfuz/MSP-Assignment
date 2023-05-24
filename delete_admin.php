<?php
// Connect to database
error_reporting(0);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
    

$conn = mysqli_connect($servername, $username, $password, $dbname);
// check if the email parameter is set
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    // construct the SQL query to delete the user
    $query = "DELETE FROM user WHERE email = '$email'";

    // execute the query
    $result = mysqli_query($conn, $query);

    if ($result) {
        // if the deletion was successful, redirect back to the admin page
        header("Location: admin_acc.php");
        exit();
    } else {
        // if there was an error, display an error message
        echo "Error deleting user: " . mysqli_error($conn);
    }
}
?>
