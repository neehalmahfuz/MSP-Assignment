<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Enquiry</title>
</head>
<style>
    .btn-send {
        background-color: #FF6000;
        border: #FF6000;
        color: white;
    }

    .btn-send:hover {
        background-color: #FFFFFF;
        color: #FF6000;
    }

    .card-body {
        overflow-y: scroll;
        max-height: 500px; 
        }
</style>
<body>

<?php

include("include/navbar.php");

?>
<div class="container-fluid pt-5 pb-5 px-5">
<div class="row d-flex justify-content-center">
  <div class="col-sm-8">
    <h2 class="mb-3">Enquiry</h2>
    <div class="card shadow-0 bg-light">
    <div class=" pt-4 px-4 d-flex justify-content-between">
        <input type="text" class="form-control" placeholder="Type your enquiry..." />
        <button class="btn btn-send px-4 ms-2">send</button>
    </div>  
    <div class="card-body p-5" data-spy="scroll" data-target="#card-body">
        <div class="card mb-4">
          <div class="card-body">
            <p class="small mb-0">Username</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora sequi, iusto, ab iure sapiente maxime laudantium vero, nostrum architecto eum iste soluta distinctio! Ipsam suscipit ipsa cum aperiam harum voluptas.</p>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <p class="small mb-0">Username</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora sequi, iusto, ab iure sapiente maxime laudantium vero, nostrum architecto eum iste soluta distinctio! Ipsam suscipit ipsa cum aperiam harum voluptas.</p>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <p class="small mb-0">Username</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora sequi, iusto, ab iure sapiente maxime laudantium vero, nostrum architecto eum iste soluta distinctio! Ipsam suscipit ipsa cum aperiam harum voluptas.</p>
          </div>
        </div>

        <div class="card mb-4">
          <div class="card-body">
            <p class="small mb-0">Username</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora sequi, iusto, ab iure sapiente maxime laudantium vero, nostrum architecto eum iste soluta distinctio! Ipsam suscipit ipsa cum aperiam harum voluptas.</p>
          </div>
        </div>
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