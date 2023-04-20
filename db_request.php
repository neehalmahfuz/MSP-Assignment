<?php  
        error_reporting(0);
        ini_set("date.timezone","Asia/Kuching");
        $Username = "CAdmin";
        $Password = "admin";
        $Host = "localhost";
        $Database = "dbrequest";

        $Link = mysqli_connect($Host,$Username,$Password,$Database) or die(mysqli_error(mysqli));
        $tb1 = array("CREATE TABLE clients(
                                                id INT AUTO_INCREMENT PRIMARY KEY,
                                                last_name VARCHAR(30)",
                                                "CREATE TABLE training_options(
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
                    if($Link)
                    {
                        if(!mysqli_select_db($Link,$Database))
                        {
                            $SQL = "CREATE DATABASE ".$Database;
                            $Result = mysqli_query($Link,$SQL);
                            mysqli_select_db($Link,$Database);
                        }
                        for($i = 0;$i < count($tbl);++$i)
                        {
                            $tblResult = mysqli_query($Link,$tbl[$i]);
                        }
                    }
?>