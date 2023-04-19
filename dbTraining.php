<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	error_reporting(0);
	ini_set("date.timezone","Asia/Kuching");
	$Username = "CAdmin";
	$Password = "admin";
	$Host = "localhost";
	$Database = "dbtraining";

	$Link = mysqli_connect($Host,$Username,$Password,$Database) or die(mysqli_error());
	$tbl = array("CREATE TABLE tblcourse(
					CourseId INT(10) PRIMARY KEY AUTO_INCREMENT,
				 	CourseName VARCHAR(40),
					Description VARCHAR(255),
					Duration VARCHAR(30),
					ImageCourse VARCHAR(255),
					PriceCourse INT(10),
					InstructorName VARCHAR(30),
					LocationId INT(10),
					ConpanyStatus VARCHAR(15))",
				 "CREATE TABLE tblclientacc(
				 	AccId INT(10) PRIMARY KEY AUTO_INCREMENT,
					FirstName VARCHAR(30),
					LastName VARCHAR(30),
					UserIc VARCHAR(25),
					DOB DATE,
					Phone VARCHAR(20),
					State VARCHAR(20),
					Email VARCHAR(40),
					UserPassword VARCHAR(20),
					Gender VARCHAR(20))",
				 "CREATE TABLE tblenrollment(
				 	EnrollId INT(10) PRIMARY KEY AUTO_INCREMENT,
					CName VARCHAR(30),
					CourseName VARCHAR(40),
					EnrollDate DATETIME,
					ScheduleId INT(10))",
				"CREATE TABLE tblinstructors(
				 	InstructorId INT(10) PRIMARY KEY AUTO_INCREMENT,
					UserIc VARCHAR(25),
					InstructorName VARCHAR(30),
					InstructorPhone VARCHAR(20),
					InstructorEmail VARCHAR(40),
					InstructorAddresses VARCHAR(40))",
				"CREATE TABLE tbllocation(
				 	LocationId INT(10) PRIMARY KEY AUTO_INCREMENT,
					RoomNumber VARCHAR(10))",
				"CREATE TABLE tblschedule(
				 	ScheduleId INT(10) PRIMARY KEY AUTO_INCREMENT,
					EnrollId INT(10),
					StartTime DATETIME,
					EndTime DATETIME,
					ScheduleStatus VARCHAR(15))");
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
				// example
				$CheckStaffSQL = "SELECT * FROM tblclientacc WHERE UserIc = '0123456789'";
				$StaffResult = mysqli_query($Link,$CheckStaffSQL);
				
				if(mysqli_num_rows($StaffResult) == 0)
				{
					//example
					$AdminSQL = "INSERT INTO tblclientacc(FirstName,LastName,UserIc,DOB,Phone,State,Email,UserPassword,Gender)
					VALUES ('Andy','soo','0123456789','2000-10-11','0168586118','Sarawak','sookwangzheng@gmail.com','andysoo1011','Male')";
					$AdminResult = mysqli_query($Link,$AdminSQL);
				}
			}
			else
			{
				echo "Connection to MySQL Database Server Failed,Please check your user account";	
			}
?>