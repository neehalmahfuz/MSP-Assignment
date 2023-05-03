<?php
session_start();

if(isset($_GET['Id']) && $_GET['Id'] === 'GetLogOut') {
  session_destroy();
  header('Location: index.php');
  exit();
} else {
  echo '<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <a class="navbar-brand ps-4" href="index.php">
        <img src="res/logo.png" height="50" class="d-inline-block align-top" alt="logo">
    </a>
    <div class="collapse navbar-collapse p-2 pe-4" id="navbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="TrainingOption.php">Trainings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contactus.php">Contact Us</a>
        </li>
      </ul>';

  if($_SESSION['accType'] == 'Admin' && isset($_SESSION['firstname'])) {
    echo '<ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="AddTrainingOption.php">Add Training</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin.php">Admin Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?Id=GetLogOut">Log Out</a>
            </li>
          </ul>';
  } else {
    echo '<ul class="nav navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>
          </ul>';
  }
  
  echo '</div></nav>';
}
?>
