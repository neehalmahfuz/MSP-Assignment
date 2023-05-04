
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>History Page</title>
</head>
<body>
<?php
error_reporting(0);

include("include/navbar.php");
?>

    <div class="container-fluid pt-5 pb-5">
        <div class="row mx-5">
            <div class="col-sm-12 d-flex justify-content-between mb-3">
                <h2>History</h2>
                    <select name="filter" id="filter" class="form-control w-25 mb-4">
                        <option value="all">All</option>
                        <option value="pending">Pending</option>
                        <option value="completed">Completed</option>
                        <option value="ongoing">Ongoing</option>
                        <option value="cancelled">Cancelled</option>
                        <option value="confirmed">Confirmed</option>
                    </select>
            </div>  
            <div class="col-sm-12">
                <table class="table w-100 table-hover text-center">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Training title</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Payment method</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="res/example.jpg" class="img-fluid" width="100"></td>
                            <td>Training title</td>
                            <td>120 RM</td>
                            <td>12-01-2023</td>
                            <td>Cash</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td><img src="res/example.jpg" class="img-fluid" width="100"></td>
                            <td>Training title</td>
                            <td>120 RM</td>
                            <td>12-01-2023</td>
                            <td>Cash</td>
                            <td>Pending</td>
                        </tr>
                        <tr>
                            <td><img src="res/example.jpg" class="img-fluid" width="100"></td>
                            <td>Training title</td>
                            <td>120 RM</td>
                            <td>12-01-2023</td>
                            <td>Cash</td>
                            <td>Pending</td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
