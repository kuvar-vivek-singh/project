
<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:admin_login.php");
    exit();
}
define("preventAccess",TRUE);
 require("connection.php");
require_once("sideheader_comm.php");
?>
<?php
if(isset($_POST['submit'])){
    $name= mysqli_real_escape_string($conn, $_POST['name']);
    $email= mysqli_real_escape_string($conn, $_POST['email']);
    $password=mysqli_real_escape_string($conn, $_POST['pswd']);
    $cpassword= mysqli_real_escape_string($conn, $_POST['cpswd']);
    $error=0;
    if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
        $name_error = "Name must contain only alphabets and space";
        $error+=1;
        }
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email";
        $error+=1;
        }
        if(!preg_match('/^(?=.*[!@#$%^&*-])(?=.*[0-9])(?=.*[A-Z]).{8,20}$/', $password)) 
        {
        $password_error = true;
        $error=true;
        } 

    if($password!=$cpassword){
        $msg="please check your password";
        $error+=1;
    }
  
    if($error==0){
    $check_email="SELECT email FROM admin_regi WHERE email='$email'";
    $qeury=mysqli_query($conn,$check_email);
    $count_email=mysqli_num_rows($qeury);
  
    if($count_email==0){
        $hass_password=password_hash($password,PASSWORD_BCRYPT);
        $sqlInsert="INSERT INTO `admin_regi` (`admin_id`, `name`, `email`, `password`) VALUES (NULL, '$name', '$email', '$hass_password')";
        $execute=mysqli_query($conn,$sqlInsert);
        $success='<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Success!</strong> Your registration has been done go to login page
            </div>';
    }
    else{
      $wrong_submition='<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Wrong submition!</strong> You are Already Member of eventwala Admin panel
          <small class="text-muted text-center">please, do not refresh and go to login page</small>
            </div>';
    }
  
  }else{
    $error_en='<div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Wrong submition!</strong> Kindly check Your Input and try again
            </div>'; 
  }
}

?>



<div class="container-fluid  d-flex  justify-content-center">
  <div class="card shadow  mb-1"  style="width: 600px;">
    <div class="jumbotron text-center">
      <h3 class="text-success">Welcome to admin Plus</h3>
      <p>Add more admin by admin</p>
    </div>
    <?php 
    if(isset($wrong_submition)){
      echo $wrong_submition;
    }
    if(isset($success)){
      echo $success;
    }
    if(isset($error_en)){
      echo $error_en;
    }
    ?>
    <div class="card-body">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group">
            <label for="name">Name: <small <?php if(isset($name_error)) echo 'style="color:red"' ?> ><?php if(isset($name_error)) echo $name_error  ?></small> </label>
            <input  type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email: <small <?php if(isset($name_error)) echo 'style="color:red"' ?> ><?php if(isset($email_error)) echo $email_error  ?></small> </label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
          </div>
          <div class="form-group">
            <label for="pwd">Password:  </label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd" required>
          </div>
          <small <?php if(isset($password_error)) echo 'style="color:red"' ?> > 
          <?php if(isset($password_error)) 
           echo 'password must be :<ul>
            <li>password lenght 8 to 20</li>
            <li>At least one upper case </li>
            <li>At least one lower case</li>
            <li>At least one special symbol</li>
            <li> At least one digit </li>
            </ul>' ?></small>
          <div class="form-group">
            <label for="cpwd">Confirm Password:</label>
            <input type="password" class="form-control" id="cpwd" placeholder="Enter Confirm password" name="cpswd" required>
            <small style="color:red"><?php if(isset($msg))echo $msg?></small>
          </div>
          <button type="submit" class="btn btn-success" name="submit" style="width: 100px;">Submit</button>
        </form>
    </div>
  </div> 
 
</div>

<?php
require_once('sideheader_end_comm.php');
?>