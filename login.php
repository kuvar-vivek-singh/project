<?php
define("preventAccess",TRUE);
?>

<?php $title="Login page"?>
<?php require("header.php"); 
?>
<?php require("connection.php"); ?>

<?php 
if(isset($_POST['login'])){
    
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $sql_email="SELECT `user_id`, `user_email`, `user_psd`FROM `user_reg` WHERE user_email='$email'";
    $execut=mysqli_query($conn,$sql_email);
    if(mysqli_num_rows($execut)>0){
        $db_emailPaswd=mysqli_fetch_assoc($execut);
        $user_email=$db_emailPaswd["user_email"];
        $user_password= $db_emailPaswd["user_psd"];
        $_SESSION["user_email"] = $user_email;
        if(password_verify($password,$user_password) && $email==$user_email){
            $_SESSION['user_id']=$db_emailPaswd['user_id'];
            $_SESSION["user_email"]=$user_email;
             ?>
             <script>
             location.replace("home.php");
             </script>
             <?php  
        }
        else{
            $wrong="Either email is incorrect or Password";
        }

    }
    else{
        $wrong="Your data does not exist please <br><a href='signup.php' target='_blank'>Singup</a>";
    }



 }
?>

<div class="container mt-5 ">
    <div class="row">
        <div class="col-md-6">
            <img src="gallery/banner/ventWala.png" alt="tex is">
        </div>
        <div class="col-md-6">
            <div class="card ml-2 mr-2">
                <div class=" text-center text-primary" style="font-size: 35px;">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </div>
                <?php 
                    if(isset($wrong)){
                        echo '<div class="alert alert-danger text-center">';
                        ?>

                        <?php 
                        echo $wrong;
                        echo '</div>'; 
                    }
                    ?>
                <div class="card-body">
                    
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                        <div class="form-group">
                        <input type="email" class="form-control " placeholder="Email Id" name="email" required></span>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        <button class="btn btn-primary btn-block" type="submit" name="login">Login Now</button>
                    </form>
                    <br>
                    <a href="forget_password.php">Forgot password?</a>
                    <br> <br>
                    <div class="card-text">
                        Don't have account <a href="signup.php">Register Now</a>
                    </div>
                </div><br>
                <div class="card-footer"> 
                    <small class="text-muted">terms of use Privacy Policy if you want to check <a href="#">here</a></small>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once("footer.php");
?>
<?php


        