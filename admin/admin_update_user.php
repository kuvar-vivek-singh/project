<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:admin_login.php");
    exit();
}
define("preventAccess",TRUE);
require_once("connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <div class="container d-flex justify-content-center" >
        <?php
        $uid = $_GET['Uid']-999;
        $name=$_GET['name']
        ?>
        <div class="card text-center mt-2 shadow-lg bg-light" style="width: 540px;border: none;">
           <div class="jumbotron">
               <h1 class="text-success" style="font-weight: 700;font-size:50px;">Eventwala</h1>
               <p>Email and mobile Number can be Update</p>
               <b class="text-danger text-capitalize">UID : <?php echo $uid ?> and first Name : <?php echo $name ?> </b>
           </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" >
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true" >Email</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Mobile Number</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="mb-2 mt-2">
                            <div class="text-center">
                                <h3 class="text-success">Change Email</h3>
                                <p>Enter New email in the Input box</p>
                            </div>
                        <form class="form-inline mt-3 mb-2">
                            <div class="form-group mx-sm-3 mb-2">
                              <label for="inputPassword2" class="sr-only">email</label>
                              <input type="email" class="form-control" id="inputPassword2" placeholder="New email">
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Confirm email</button>
                          </form>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="mb-2 mt-2">
                            <div class="text-center">
                                <h3 class="text-success">Change Mobile NO.</h3>
                                <p>Enter New mobile Number in the Input box</p>
                            </div>
                        <form class="form-inline mt-3 mb-2">
                            <div class="form-group mx-sm-3 mb-2">
                              <label for="inputPassword2" class="sr-only">number</label>
                              <input type="number" class="form-control" id="inputPassword2" placeholder="10 digit mobile No.">
                            </div>
                            <button type="submit" class="btn btn-success mb-2">Confirm Mobile No.</button>
                          </form>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <a class="btn btn-danger" href="user_modify.php">Back To Page</a>
        </div>
    </div>

</body>
</html>