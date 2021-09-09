<?php
require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>deleting</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center" style="margin-top: 15%;">
      <div class="card text-center shadow-lg" style="width: 540px;z-index: 999999;border: none;">
        <div class="card-header bg-white " style="border:none">
          <h3 class="text-success">Eventwala</h3>
          
        </div>
        <div class="card-body">
          <p class="card-text text-danger">Please wait until Proccess...</p>
          <div class="spinner-grow text-muted"></div>
          <div class="spinner-grow text-primary"></div>
          <div class="spinner-grow text-success"></div>
          <div class="spinner-grow text-info"></div>
          <div class="spinner-grow text-warning"></div>
          <div class="spinner-grow text-danger"></div>
          <div class="spinner-grow text-secondary"></div>
          <div class="spinner-grow text-dark"></div>
          <div class="spinner-grow text-light"></div>
        </div>
      </div>
    </div>
    <?php
    $uid=$_GET['Uid']-999;
    $sql="DELETE FROM `user_reg` WHERE user_id=$uid";
    mysqli_query($conn,$sql);
    ?>
    <script type="text/javascript">
        window.location = "user_modify.php";
    </script>
</body>

</html>