
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

    .training-option-title {
        height: 60px; 
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .training-option-price {
        white-space: nowrap; 
    }

    .training-option-desc {
        height: 50px;
        overflow: hidden;
    }
</style>
<body>
<?php
error_reporting(0);
include("include/navbar.php");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>

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
			$DisProfileRs = mysqli_query($conn,$DisProfile);

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
							echo $Img = '<img src="CourseImage/'.$listImg.'" class="w-100" height=250/>';
							?>
							<div class="d-flex mt-2 justify-content-between">
								<h4 class="training-option-title"><?php echo $row['CourseName']?></h4>
								<h4 class="training-option-price ps-4">RM<?php echo $row['PriceCourse']?></h4>
							</div>
							<p class="training-option-desc"><?php echo $row['Description']?></p>
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
</body>

<script>
    document.getElementById('search-button').addEventListener('click', function() {
        const searchInput = document.getElementById('search-input').value.trim().toLowerCase();

        const trainingOptions = document.querySelectorAll('.col-sm-4');
        trainingOptions.forEach(function(option) {
            const title = option.querySelector('.training-option-title').textContent.toLowerCase();
            if (title.includes(searchInput)) {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });
    });
</script>
</html>
