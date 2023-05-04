
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Training Request Page</title>
</head>
<body>
<?php
error_reporting(0);

include("include/navbar.php");
?>

    <div class="container-fluid pt-5 pb-5">
        <div class="row mx-5">
            <div class="col-sm-12 mb-3">
                <h2>Training Request</h2>
            </div>  
            <div class="col-sm-12">
                <table class="table w-100 table-hover text-center">
                    <thead>
                        <tr>
                            <th>Client ID</th>
                            <th>Image</th>
                            <th>Training title</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Payment method</th>
                            <th>Payment slip</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>123</td>
                            <td><img src="res/example.jpg" class="img-fluid" width="100"></td>
                            <td>Training title</td>
                            <td>120 RM</td>
                            <td>12-01-2023</td>
                            <td>Cash</td>
                            <td><a type="button" class="link" data-bs-toggle="modal" data-bs-target="#exampleModal">view payment slip</a></td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-danger">Reject</button>
                                <button class="btn btn-success">Confirm</button>
                            </td>
                        </tr>
                        <tr>
                            <td>345</td>
                            <td><img src="res/example.jpg" class="img-fluid" width="100"></td>
                            <td>Training title</td>
                            <td>120 RM</td>
                            <td>12-01-2023</td>
                            <td>Cash</td>
                            <td><a type="button" class="link" data-bs-toggle="modal" data-bs-target="#exampleModal">view payment slip</a></td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-danger">Reject</button>
                                <button class="btn btn-success">Confirm</button>
                            </td>
                        </tr>
                        <tr>
                            <td>345</td>
                            <td><img src="res/example.jpg" class="img-fluid" width="100"></td>
                            <td>Training title</td>
                            <td>120 RM</td>
                            <td>12-01-2023</td>
                            <td>Cash</td>
                            <td><a type="button" class="link" data-bs-toggle="modal" data-bs-target="#exampleModal">view payment slip</a></td>
                            <td>Pending</td>
                            <td>
                                <button class="btn btn-danger">Reject</button>
                                <button class="btn btn-success">Confirm</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div> 

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment slip</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="res/example.jpg" class="img-fluid">
                </div>
                </div>
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
