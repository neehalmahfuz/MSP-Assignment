<?php  
        error_reporting(0);
        ini_set("date.timezone","Asia/Kuching");
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "database";
        $conn = mysqli_connect($servername, $username, $password, $dbname, 3307);
        // Check if connection was successful
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        $tb1 = array("CREATE TABLE training_options(
                                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                                    option_name VARCHAR(255) NOT NULL,
                                                    description TEXT)",
                                                "CREATE TABLE training_dates ( 
                                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                                    date_time DATETIME NOT NULL)",
                                                "CREATE TABLE venues (
                                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                                    venue_name VARCHAR(255) NOT NULL,
                                                    address TEXT)",
                                                "CREATE TABLE training_requests (
                                                    id INT AUTO_INCREMENT PRIMARY KEY,
                                                    customer_name VARCHAR(255) NOT NULL,
                                                    training_option_id INT NOT NULL,
                                                    training_date_id INT NOT NULL,
                                                    venue_id INT NOT NULL,
                                                    FOREIGN KEY (training_option_id) REFERENCES training_options(id),
                                                    FOREIGN KEY (training_date_id) REFERENCES training_dates(id),
                                                    FOREIGN KEY (venue_id) REFERENCES venues(id)
                                                )",);
                    if($conn)
                    {
                        if(!mysqli_select_db($conn,$Database))
                        {
                            $SQL = "CREATE DATABASE ".$Database;
                            $Result = mysqli_query($conn,$SQL);
                            mysqli_select_db($conn,$Database);
                        }
                        for($i = 0;$i < count($tbl);++$i)
                        {
                            $tblResult = mysqli_query($conn,$tbl[$i]);
                        }
                    }
?>