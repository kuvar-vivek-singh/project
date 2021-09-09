<?php
define("preventAccess",TRUE);
$title="contact Us";
require_once("connection.php");
require_once("header.php");
?>

<?php 
if(isset($_POST["submit"])){
 $name1 = trim($_POST["first"]);
 $name2 = trim($_POST["last"]);
 $mobile = trim($_POST["mobile"]);
 $email = trim($_POST["email"]);
 $address = trim($_POST["address"]);
 $city = trim($_POST["city"]);
 $comment= trim($_POST["comment"]);
$countError=$mobileErr = $emailErr = $addressErr = $cityErr= $commentErr = false;
 $first = $last = false;
if(!preg_match("/^([a-zA-Z' ]+)$/",$name1) || strlen($name1)<=3){
   $first=true;
    $countError=true;
}
if(!preg_match("/^([a-zA-Z' ]+)$/",$name2) || strlen($name2)<=3){
    $last=true;
    $countError=true;
}
if (strlen($mobile)<=9 || strlen($mobile)>11){  
    $mobileErr = true;
    $countError=true;  
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr=true;
    $countError=true;
  }
if(strlen($address)<9){
    $addressErr=true;
    $countError=true;
}
if(!preg_match("/^([a-zA-Z]+)$/",$city) || strlen($city)<3){
    $cityErr=true;
     $countError=true;
 }
 if(!preg_match("/^([a-zA-Z' ]+)$/",$comment) || strlen($comment)<=10){
    $commentErr=true;
     $countError=true;
 }
}
?>
<div class="bg-light">
    <div class="container-fluid">
        <div class="text-center">
            <h1 class="text-success">Contact us</h1>
            <hr>
        </div>
        <div class="d-flex justify-content-center mb-5">
            <div class="card text-center shadow" style="max-width:  100%;">
                <div class="card-header">
                    <h4>Contact form</h4>
                    <p class="text-muted">Hi, there We are always here to help you <br>
                    </p>
                </div>
                <div class="card-body">
                    <?php
                   if(isset($countError)){
                       if($countError==true){  
                    echo '<div class="alert alert-danger m-1"> <h6>Error has occured as below</h6>
                    <p class="text-center text-danger">';
                    ?>
                    <?php if($first==true) echo ' first Name : Either incorrect or less than 3 char. <br>'; ?>
                    <?php if($last==true) echo 'Last Name : Either incorrect or less than 3 char. <br>'; ?>
                    <?php if($mobileErr==true) echo 'Mobile no : Please enter 10 digit mobile number <br>'; ?>
                    <?php if($emailErr==true) echo 'Email : Provided email is incorrect<br>'; ?>
                    <?php if($addressErr==true) echo 'Address : Provided address is incorrect <br>'; ?>
                    <?php if($cityErr==true) echo 'City :Either incorrect city name or space provided'; ?>
                    <?php if($commentErr==true) echo 'Comment :Please write Few words'; ?>

                    <?php 
                    echo '</p></div> ';
                    
                    }
                    else{
                    ?>
                    <?php
                       $contact_query ="INSERT INTO `contactus`(`first_name`, `last_name`, `mobile_no`, `email_add`, `city`, `address`, `status`, `comment`) VALUES ('$name1','$name2','$mobile','$email','$city','$address',1,'$comment')";
                        $contact_exe = mysqli_query($conn,$contact_query) ;               
                        echo '<div class="alert alert-success">
                              <h3>Your request has been submitted</h3>
                              <p>Our team member will contact You shortly<br> <b>Thank You.</b></p>
                              <p><a class="btn  btn-secondary" href="">Go Back</a></p>
                             </div>';
        
                             $disable="disabled";
                    }
                     }
                    ?>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" autocomplete="off">
                        <div class="input-group m-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user-tie"
                                        style="font-size:20px; <?php if($first==true || $last==true) echo 'color:red;'?>"></i>
                                </span>
                            </div>
                            <input type="text" class="form-control " name="first" id="FN" placeholder="First Name"
                                required>
                            <input type="text" class="form-control" name="last" id="LN" placeholder="Last Name"
                                required> <br>

                        </div>

                        <div class="input-group m-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" title='Mobile No'><span
                                        style="font-size:15px;<?php if($mobileErr==true) echo 'color: red' ?>">+91</span></span>
                            </div>
                            <input type="number" class="form-control " name="mobile" id="mobile"
                                placeholder="Enter 10 digit mobile No" required>

                        </div>
                        <div class="input-group m-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope-square"
                                        style="font-size:20px;<?php if($emailErr==true) echo 'color:red'?>"></i></span>
                            </div>
                            <input type="email" class="form-control " name="email" id="email" placeholder=" Enter email"
                                required>

                        </div>
                        <div class="input-group m-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-city"
                                        style="<?php if($cityErr==true) echo 'color:red' ?>"></i></span>
                            </div>
                            <input type="text" class="form-control " name="city" id="city" placeholder="Your City"
                                required>

                        </div>
                        <div class="input-group m-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-map-marked-alt"
                                        style="<?php if($addressErr==true) echo 'color:red' ?>"> </i></span>
                            </div>
                            <input type="text" class="form-control " name="address" id="address"
                                placeholder="Your address" required>

                        </div>

                        <textarea class="form-control m-2" name="comment" id="comment" cols="20" rows="6"
                            placeholder="Comment (Your Query *)" required></textarea>
                           <div class="<?php if(isset($disable)) echo "card-footer" ;?> ?>">
                        <button type="submit" name="submit" class="btn btn-primary m-2 mb-1"
                            style="width:50%" <?php if(isset($disable)) echo $disable ;?>>Submit</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
        <hr class="mb-2">
    </div>
    <?php 
require_once("footer.php");
?>