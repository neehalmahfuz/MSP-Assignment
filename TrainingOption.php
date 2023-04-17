
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Training Options</title>
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
	$Username = "CAdmin";
	$Password = "admin";
	$Host = "localhost";
	$Database = "dbtraining";

	$Link = mysqli_connect($Host,$Username,$Password,$Database) or die(mysqli_error());
?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
        <a class="navbar-brand ps-4" href="homepage.html">
            <img src="res/logo.png" height="50" class="d-inline-block align-top" alt="logo">
        </a>
        <div class="collapse navbar-collapse p-2 pe-4" id="navbar">
          <ul class="navbar-nav me-auto">
            <li class="nav-item active">
              <a class="nav-link" href="homepage.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AddTrainingOption.php">Trainings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contactus.html">Contact Us</a>
            </li>
          </ul>
          <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="login.html">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.html">Register</a>
            </li>
          </ul>
        </div>
      </nav>

    <div class="container-fluid px-4">
        <div class="row mb-3 mt-3">
            <div class="col-sm-12 mt-3 mb-2 d-flex justify-content-between">
                <h2>Training Options</h2>
                <div class="d-flex">
                    <input type="text" class="form-control" placeholder="Search training option ...">
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
            
           <?php
			$DisProfile = "SELECT * FROM tblcourse";
			$DisProfileRs = mysqli_query($Link,$DisProfile);

			if(mysqli_num_rows($DisProfileRs) > 0)
			{
				$counter = 0; 
				while($row = mysqli_fetch_array($DisProfileRs))
				{
					$counter++;
					// If it is the first col of each row, start a new row
					if ($counter == 1) {
						echo '<div class="row">';
					}
					?>
					<div class="col-sm-4 mt-3">
						<div class="shadow p-3 bg-white rounded">
							<?php
							$listImg = $row['ImageCourse'];
							echo $Img = '<img src="CourseImage/'.$listImg.'" height = 200 width = "435"/>';
							?>
							<div class="d-flex mt-2 justify-content-between">
								<h4><?php echo $row['CourseName']?></h4>
								<h4>RM<?php echo $row['PriceCourse']?></h4>
							</div>
							<p><?php echo $row['Description']?></p>
							<a href="training_view.html" class="btn btn-training mt-2">View Training</a>
						</div>
					</div>
					<?php
					//If 3 cols have already been output, end the current row
					if ($counter == 3) {
						echo '</div>'; // end current row
						$counter = 0; // reset counter
					}
				}
				// If the last row has less than 3 cols, add a placeholder col to fill
				if ($counter > 0 && $counter < 3) {
					for ($i = 0; $i < 3 - $counter; $i++) {
						echo '<div class="col-sm-4"></div>';
					}
					echo '</div>'; // end row
				}
			}
			?>

        </div>
    </div>

    <footer class="text-center text-lg-start bg-light text-muted mt-5 pt-3">
        <section>
            <div class="container text-center text-md-start mt-5">
                <div class="row">
                    <div class="col-sm-5">
                        <h6 class="text-uppercase fw-bold mb-3">ETM - Training Expert</h6>
                        <p> ETM is a Sarawak-based training company that offers in-house or on-site training to business and staff.</p>
                    </div>

                    <div class="col-sm-3">
                        <h6 class="text-uppercase fw-bold mb-3">Quick Link</h6>
                        <p><a href="homepage.html" class="text-reset">Home</a></p>
                        <p><a href="training_option.html" class="text-reset">Training Catalog</a></p>
                        <p><a href="contactus.html" class="text-reset">Contact Us</a></p>
                    </div>

                    <div class="col-sm-4">
                        <h6 class="text-uppercase fw-bold mb-3">Contact</h6>
                        <p> Sarawak, Malaysia</p>
                        <p> etm@example.com </p>
                        <p>+ 01 234 567 88</p>
                    </div>
                </div>
            </div>
        </section>
    
        <div class="text-center p-4">
            <hr class="mb-4">
        © 2023 Copyright: <a class="text-reset fw-bold" href="homepage.html">ETM - Expert Training</a>
        </div>
    </footer>
</body>
</html>
