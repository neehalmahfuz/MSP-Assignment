
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Training View</title>
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
error_reporting(0);
include("include/navbar.php");
	$Username = "CAdmin";
	$Password = "admin";
	$Host = "localhost";
	$Database = "dbtraining";

	$Link = mysqli_connect($Host,$Username,$Password,$Database) or die(mysqli_error());
?>
   
<?php
	if($_GET['Id'] == "GetOption" && $_GET['OptionId'] != "")
	{
		$SelectOption = "SELECT * FROM tblcourse WHERE CourseName = '".$_GET['OptionId']."' ";
		$SelectOptionRs = mysqli_query($Link,$SelectOption);
		if(mysqli_num_rows($SelectOptionRs) > 0)
		{
			while($Selectrow = mysqli_fetch_array($SelectOptionRs))
			{
				$SelectImg = $Selectrow['ImageCourse'];
?>
    <div class="container-fluid px-4">
        <div class="row mb-5 mt-5">
            <div class="col-sm-5">
			<?php
				echo '<img src="CourseImage/'.$SelectImg.'"/ class="img-fluid">';
			?>
            </div>
            <div class="col-sm-7">
                <div class="d-flex justify-content-between">
                    <h3><?php echo $Selectrow['CourseName']?></h3>
                    <a class="btn btn-training" href="payment.html">Book Training</a>
                </div>
                <h3><?php echo "RM ".$Selectrow['PriceCourse']?></h3>
                <p class="mt-3 mb-4"><?php echo $Selectrow['Description']?></p>
                <div class="col-sm-12 d-flex justify-content-center">
                    <table class="table table-hover w-75 text-center">
                        <tr>
                            <th>Training Duration</th>
                            <td><?php echo $Selectrow['Duration']?></td>
                        </tr>
                        <tr>
                            <th>Venue</th>
                            <td><?php echo $Selectrow['LocationId']?></td>
                        </tr>
                        <tr>
                            <th>Number of Topic</th>
                            <td>20 topics</td>
                        </tr>
                        <tr>
                            <th>Certificate</th>
                            <td>Yes</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <div class="col-sm-12">
                <h5>Training Syllabus</h5>
                <div class="accordion mt-3">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="h1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true">
                            1. Itroduction to Programming
                        </button>
                      </h2>
                      <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="h1">
                        <div class="accordion-body">
                          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium distinctio at, amet quis voluptates aliquid impedit dolorum vitae, architecto, corporis quas id quaerat beatae doloremque nisi ea dignissimos. Fugiat, minus.</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="h2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false">
                            2. Itroduction to Programming
                        </button>
                      </h2>
                      <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="h2">
                        <div class="accordion-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium distinctio at, amet quis voluptates aliquid impedit dolorum vitae, architecto, corporis quas id quaerat beatae doloremque nisi ea dignissimos. Fugiat, minus.</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="h3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false">
                            3. Itroduction to Programming
                        </button>
                      </h2>
                      <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="h3">
                        <div class="accordion-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium distinctio at, amet quis voluptates aliquid impedit dolorum vitae, architecto, corporis quas id quaerat beatae doloremque nisi ea dignissimos. Fugiat, minus.</p>
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="h4">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false">
                            4. Itroduction to Programming
                        </button>
                      </h2>
                      <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="h4">
                        <div class="accordion-body">
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Praesentium distinctio at, amet quis voluptates aliquid impedit dolorum vitae, architecto, corporis quas id quaerat beatae doloremque nisi ea dignissimos. Fugiat, minus.</p>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>  

        <div class="row mt-5 mb-5">
            <div class="col-sm-12">
                <h5>Rating & Review</h5>
                <div class="d-flex mt-3">
                    <div class="col-sm-4 text-center">
                        <div>
                            <h1>4.5 / 5.0</h1>
                            <div>
                                <img src="res/star.png">
                                <img src="res/star.png">
                                <img src="res/star.png">
                                <img src="res/star.png">
                                <img src="res/star.png">
                            </div>
                            <p class="mt-2">20.000 ratings</p>
                        </div>
                    </div>
                    <div class="col-sm-8 overflow-auto h-50">
                        <div class="col-sm-12">
                            <p><strong>Johny John</strong> <br> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos maiores labore quisquam voluptates debitis eligendi odit fugiat ratione deleniti assumenda! Ea dolorem officia dolorum, rem dolor quae laudantium eum harum. </p>
                            <p><strong>Jane Jane</strong> <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti saepe enim dicta ex minus consequatur, quo expedita eum blanditiis mollitia impedit dolorem aliquam quos repellendus voluptatibus odit facilis? Mollitia, omnis.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5 mb-5">
            <h5>Other Trainings</h5>
            <?php
			$DisCourse = "SELECT * FROM tblcourse ORDER BY RAND() LIMIT 3";
			$DisCourseRs = mysqli_query($Link,$DisCourse);

			if(mysqli_num_rows($DisCourseRs) > 0)
			{
				$counter = 0; 
				while($row = mysqli_fetch_array($DisCourseRs))
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
							echo $Img = '<img src="CourseImage/'.$listImg.'" height = 200 width = "430"/>';
							?>
							<div class="d-flex mt-2 justify-content-between">
								<h4><?php echo $row['CourseName']?></h4>
								<h4>RM<?php echo $row['PriceCourse']?></h4>
							</div>
							<p><?php echo $row['Description']?></p>
							<a href="TrainingView.php" class="btn btn-training mt-2">View Training</a>
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
<?php
			}
		}
	}
?>
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
