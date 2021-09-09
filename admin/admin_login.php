<?php 
session_start();
require_once("connection.php")?>
<?php
if(isset($_POST['login'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $sql_email="SELECT `admin_id`, `email`, `password` FROM `admin_regi` WHERE email='$email'";
    $execut=mysqli_query($conn,$sql_email);
    if(mysqli_num_rows($execut)>0){
        $db_pswd=mysqli_fetch_assoc($execut);
        if(password_verify($password,$db_pswd['password'])){
            $_SESSION['email']=$email;
            ?>
            <script>
                window.location="index.php";
            </script>
            <?php
        }
        else{
            $error_pswd="Wrong Password";
        }

    }
    else{
        
        $error_authendiaction="Provided Details are not matching with Our database";
    }


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body{
            overflow-x: hidden;
        }
    </style>
</head>

<body class="bg-light" >
   <div class="d-flex justify-content-center" >
    <div class="card mt-5 shadow  bg-light" style="width: 30rem;">
        <div class="jumbotron  text-center alert-success ">
            <h1>Eventwala</h1>
            <p>Only Admin can login to this page</p>
            <p class="text-danger">
                <?php if(isset($error_pswd)) echo $error_pswd ?>
                <?php if(isset($error_authendiaction)) echo $error_authendiaction ?>
            </p>
        </div>
           <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required autofocus>
                <br>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <button type="submit" class="btn btn-success btn-lg btn-block mt-3" name="login">Login as Admin</button>
            </form>
           </div>
       </div>
   </div>
    
</body>

</html>
