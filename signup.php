<?php $title="Singup page"?>

<?php require_once('connection.php');?>
<?php
if(isset($_POST['submit'])){
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile_no']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $address = mysqli_real_escape_string($conn,$_POST['address']);
    $city =   mysqli_real_escape_string($conn,$_POST['city']);
    $first_name_err=$last_name_err= $password_error = $cpassword_error=$email_error= $city_error=$mobile_no_error =$address_error=$error=false;
    if(!preg_match("/^([a-zA-Z' ]+)$/",$first_name) || strlen($first_name)<=3){
        $first_name_err=true;
         $error=true;
     }
     if(!preg_match("/^([a-zA-Z' ]+)$/",$last_name) || strlen($last_name)<=3){
        $last_name_err=true;
         $error=true;
     }
     if(!preg_match("/^([a-zA-Z]+)$/",$city) || strlen($city)<=3){
        $city_error=true;
         $error=true;
     }
     if(strlen($address)<=3){
        $address_error=true;
         $error=true;
     }
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error =true;
        $error=true;

        }
        if(!preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) 
        {
        $password_error = true;
        $error=true;
        }       
        
        if($password != $cpassword) {
        $cpassword_error = true;
        $error=true;
        }  
        if(strlen($mobile)<=9 || strlen($mobile)>11)  {
          $mobile_no_error = true;
          $error=true;
        }  

 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    <div class="container mt-3 d-flex justify-content-center">
        <div class="card shadow mb-2" style="width: 40rem;">
            <div>
                <div id="demo" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                      <li data-target="#demo" data-slide-to="0" class="active"></li>
                      <li data-target="#demo" data-slide-to="1"></li>
                    </ul>
                  
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="banner/registration.png" alt="Los Angeles" style="height: 240px; width: 100%;">
                        
                      </div>
                      <div class="carousel-item">
                        <img src="banner/registration1.png" alt="Chicago" style="height: 240px; width: 100%;">
                        
                      </div>
                    </div>
                  
                    <!-- Left and right controls -->
                    <a class="carousel-control-prev " href="#demo" data-slide="prev" >
                      <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                      <span class="carousel-control-next-icon"></span>
                    </a>
                  
                  </div>
            </div>
            <div class="card-body">
                <div>
                    <?php
                   if(isset($error)){
                       if($error==true){  
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> <h6 class="text-center">Error has occured as below</h6>
                    <p class="text-center text-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                       <ol>     ';
                    ?>
                    <?php if($first_name_err==true) echo '<li><b>first Name</b> : Either incorrect or less than 3 char </li>'; ?>
                    <?php if($last_name_err==true) echo '<li><b>Last Name</b> : Either incorrect or less than 3 char </li>'; ?>
                    <?php if($email_error==true) echo '<li> <b>Email</b> : Either Incorrect email OR Wrong input  </li>'; ?>
                    <?php if($mobile_no_error==true) echo '<li> <b>Mobile no</b> : Please enter 10 digit mobile number </li>'; ?>
                    <?php if($password_error==true) echo '<li> <b>Password</b> : Wrong Password, Not matching with Our Criteria </li>'; ?>
                    <?php if($cpassword_error==true) echo '<li> <b>Confirm Password</b> : Confirm password is not matching </li>'; ?>
                    <?php if($city_error==true) echo '<li> <b>City</b> : Either Space OR  incorrect City name is Provided </li>'; ?>
                    <?php if($address_error==true) echo '<li><b>Address</b> : Provided address is incorrect </li>'; ?>
                    <?php 
                    echo '</ol></p></div>';
                    
                    }
                    else{
                    ?>
                    <?php
                        $email_query="SELECT * FROM user_reg WHERE user_email='$email'";
                        $execute=mysqli_query($conn,$email_query);
                        $email_count=mysqli_num_rows($execute);
                        if($email_count>0){
                            echo'<div class="alert alert-danger">
                            This email is already exist , try new one OR go for
                            <a href="login.php" class="btn btn-outline-success">Login</a>
                            </div>';
                        }
                        
                        else{
                            $hass_password=password_hash($password,PASSWORD_BCRYPT);
                            $sqlInsert="INSERT INTO `user_reg` (`user_id`, `first_name`, `last_name`, `user_email`, `mobile_num`, `user_psd`, `user_city`, `address`) VALUES (NULL, '$first_name','$last_name', '$email', '$mobile', '$hass_password', '$city', '$address')";
                            $execute=mysqli_query($conn,$sqlInsert);
                            ?>
                            <?php
                           echo'
                           <div class="alert alert-success" role="alert">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                           </button>
                           <h2 class="text-center">CONGRATUALATION </h2>
                           <hr>
                           <p class="text-center">
                           Well done! Now You are Our part of family.
                           </p>
                           </div>
                           ';
                           $dismiss_submit="disabled";
                        }
                     }
                      }
                    ?>
                </div>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text <?php if($first_name_err==true || $last_name_err==true) echo 'text-danger' ?> " >First and last name</span>
                            </div>
                            <input type="text" name="first_name" id="fisrt_name" class="form-control" placeholder="First name" required>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last name" required>
                          </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend <?php if($email_error==true) echo 'text-danger' ?>">
                              <span class="input-group-text <?php if($email_error==true) echo 'text-danger' ?>" >Email</span>
                            </div>
                            <input type="text" name="email" id="email" class="form-control" placeholder="e.g. example@gmail.com" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text <?php if($mobile_no_error==true) echo 'text-danger' ?>" >Mobile</span>
                            </div>
                            <input type="number" name="mobile_no" id="mobile_no" class="form-control" placeholder=" 10 digit mobile No." required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text <?php if($password_error==true) echo 'text-danger' ?>">password</span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter strong password" required>
                            </div>
                            <small class="text-danger"><b>Note : </b> Password must have at least Uppercase, Lowercase, Number, and special char [8-20]</small>
                    </div>
                    <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text <?php if($cpassword_error==true) echo 'text-danger'?>" >Confirm password</span>
                            </div>
                            <input type="password" name="cpassword" id="cpassword" class="form-control" placeholder="Enter confirm strong password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text <?php if($city_error==true) echo 'text-danger' ?>" >city</span>
                            </div>
                            <input type="text" name="city"  id="city" class="form-control" placeholder="e.g. Prayagraj" required>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text <?php if($address_error==true) echo 'text-danger' ?>" >Address</span>
                            </div>
                            <input type="text" name="address" id="address" class="form-control" placeholder="e.g.civil line,prayagraj" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                    <button type="submit" name="submit" class="btn btn-outline-success btn-lg w-50 " <?php if(isset($dismiss_submit)) echo $dismiss_submit; ?>>Submit</button>
                    </div>
                  </form>
            </div>
            <div class="card-footer text-center text-danger" style="background-color: #171718;">
                <small >You should read our privacy & policy</small>
            </div>
        </div>
    </div>
</body>

</html>