
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Home</title>
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
 
      
      <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner" style="background-color: #FFE6C7;">
          <div class="carousel-item active">
            <div class="row my-5">
                <div class="col-sm-6 align-self-center">
                    <img src="res/banner1.png" class="img-fluid">
                </div>
                <div class="col-sm-6 align-self-center p-5">
                    <h2>Unlock Your Employees' Potential with Our Expert Training Management Platform</h2>
                    <p class="my-4">Maximize the potential of your employees with expert training management services from our website, streamline your training process and achieve optimal results with our comprehensive training management platform. Say goodbye to tedious training management tasks and hello to efficiency with our user-friendly website.</p>
                    <a href="TrainingOption.php" class="btn btn-training">View Trainings</a>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row my-5">
                <div class="col-sm-6 align-self-center">
                    <img src="res/banner2.png" class="img-fluid">
                </div>
                <div class="col-sm-6 align-self-center p-5">
                    <h2>Elevate Your Workforce Performance</h2>
                    <p class="my-4">Transform your workforce and improve productivity with customized training programs from our expert trainers, also from onboarding to career development, our training management website offers end-to-end solutions for all your training needs. Get access to top-tier training resources and professional support from our website's team of experienced trainers.</p>
                </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="row my-5">
                <div class="col-sm-6 align-self-center">
                    <img src="res/banner3.png" class="img-fluid">
                </div>
                <div class="col-sm-6 align-self-center p-5">
                    <h2>Empower Your Team and Outperform Your Competition with Our Advanced Training Management Services</h2>
                    <p class="my-4">Invest in your company's success by providing your employees with the best training resources available through our website. Stay ahead of the competition by utilizing our cutting-edge training management tools and techniques. Join the many satisfied clients who have improved their training processes and boosted employee performance with our website's services.</p>
                </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <div class="container-fluid mt-5 pt-5 pb-5">
        <div class="row mt-5 d-flex justify-content-center text-center">
            <div class="col-sm-3">
                <h4>For Entrepreneurs</h4>
                <p>Acquire a comprehensive understanding of management principles to successfully manage your freelance business and turn your aspirations into a profitable reality.</p>
            </div>
            <div class="col-sm-3">
                <h4>For Students</h4>
                <p>Attain a comprehensive understanding of management principles to effectively manage your future career and pursue your aspirations with confidence.</p>
            </div>
            <div class="col-sm-3">
                <h4>For aspiring entrepreneurs</h4>
                <p>Acquire a comprehensive understanding of management principles to successfully launch and manage your business, transforming your entrepreneurial dreams into reality.</p>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-sm-6 align-self-center">
                <img src="res/learn.png" class="img-fluid">
            </div>
            <div class="col-sm-6 align-self-center p-5">
                <h2>Learn whenever and wherever you want!</h2>
                <p>You may now learn in the convenience of your own home or anyplace! Adapt to a new era learning experience in which you have complete control. All virtual management training are 100% adaptable, allowing you to access them on any digital device, including laptops, tablets, and smartphones.</p>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-sm-6 align-self-center p-5">
                <h2>Certification of Specialisation</h2>
                <p>For a better job portfolio, obtain a professional certification. Having more certificates gives you an advantage over the competition. With the help of specialised certificates, you may demonstrate your knowledge to companies, improving your chances of getting hired, selected, or promoted.</p>
            </div>
            <div class="col-sm-6 align-self-center">
                <img src="res/certificate.png" class="img-fluid">
            </div>
        </div>

        <div class="row my-5">
            <div class="col-sm-6 align-self-center">
                <img src="res/experts.png" class="img-fluid">
            </div>
            <div class="col-sm-6 align-self-center p-5">
                <h2>Take Advice from the Pros!</h2>
                <p>To ensure that we only deliver the finest to you, each course is created by an expert instructor who is an authority in that particular field. The greatest training materials are being created for our clients.</p>
                <p> We urge entrepreneurs, professionals, managers, and students to enrol in our online business management course. We also provide you with a selection of quick, adaptable, useful, and simple-to-learn online training that may improve your profession. </p>
            </div>
        </div>

        <div class="row my-5 mx-5 pt-5">
            <div class="col-sm-12 d-flex justify-content-between px-4">
                <h3>Training Options</h3>
                <a href="TrainingOption.php" class="text-decoration-none">View all</a>
            </div>
            
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
							echo $Img = '<img src="CourseImage/'.$listImg.'" height = 200 width = "400"/>';
							?>
							<div class="d-flex mt-2 justify-content-between">
								<h4><?php echo $row['CourseName']?></h4>
								<h4>RM<?php echo $row['PriceCourse']?></h4>
							</div>
							<p><?php echo $row['Description']?></p>
							<?php
							echo "<a href=\"TrainingView.php?Id=GetOption&OptionId=".$row['CourseName']."\" class = 'btn btn-training mt-2'>View Training</a>"
							?>
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
    include("include/footer.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>