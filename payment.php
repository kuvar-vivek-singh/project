<?php
require_once("connection.php");
if(isset($_POST['verify'])){
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile_no']);
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
    <title>Payment gateway</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>


<body>
    <div class="bg-light mb-2">
        <div class="container-fluid">
            <div class="text-center text-muted ">
                <h1 class="text-success">Eventwala</h1>
                <h3>Welcome to Payment Method</h3>
                <p>In this payment method you can make your payment easy and Simple.
                    <br> We are Committed to provide Secure Method.
                </p>
            </div>
            <div class="row">
                <div class="col">
                    <div>
                        <div class="card" style="height: auto;">
                            <div class="card-header">
                                <h5>Provide details for event booking.</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title text-muted">Please Provide some Details</h6>
                                <p class="card-text text-muted">About you, your Address and mobile no as well email <br>
                                   <br> Important Note : Your adhar Card is mandatory. </p>
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
                    <?php if($city_error==true) echo '<li> <b>City</b> : Either Space OR  incorrect City name is Provided </li>'; ?>
                    <?php if($address_error==true) echo '<li><b>Address</b> : Provided address is incorrect </li>'; ?>
                    
                    <?php 
                    echo '</ol></p></div>';
                       
                      }
                    }
                       ?> 
                                <form action="" method="POST">
                                    <h5> Your Details</h5>

                                <hr>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Person</span>
                                        </div>
                                        <input type="text" class="form-control" name="first_name" id="FN"
                                            placeholder="First Name" required>
                                        <input type="text" class="form-control" name="middle" id="MN"
                                            placeholder="Middle Name">
                                        <input type="text" class="form-control" name="last_name" id="LN"
                                            placeholder="Last Name" required>
                                    </div>
                                    <input type="number" class="form-control mb-2 " name="adhar" id=""
                                        placeholder="Your adhar Card Number" required>
                                    <input type="text" class="form-control mb-1  p-1 " name="address" id="address"
                                        placeholder="Address" required>
                                    <input type="text" class="form-control mb-2 p-1" name="city" id="city"
                                        placeholder="City name e.g. Prayagraj" required>
                                    <h5>Verify Mobile Number and Email</h5>
                                    <hr>
                                    <input type="number" class="form-control mb-1 p-1" name="mobile_no" id="mobile_no"
                                        placeholder="10 digit Mobile No " required>
                                    <input type="email" class="form-control mb-2 p-1" name="email" id="email"
                                        placeholder="example@gmail.com" required> <br>
                                    <button type="submit" name="verify" class="btn btn-success btn-block" >Next towords to
                                        Payment</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h4>Payment Method</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Currently we are not accepting Paytm.</p>
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link btn btn-primary active m-1" id="debit-tab" data-toggle="tab"
                                        href="#debit" role="tab" aria-controls="debit" aria-selected="true">Credit/Debit
                                        </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-primary m-1" id="netbanking-tab" data-toggle="tab"
                                        href="#netbanking" role="tab" aria-controls="netbanking" aria-selected="false">Netbanking
                                        </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-primary  m-1" id="phonepay-tab" data-toggle="tab"
                                        href="#phonepay" role="tab" aria-controls="phonepay" aria-selected="false">Phone
                                        pay</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-outline-secondary disabled m-1 " href="#">paytem</a>
                                </li>
                            </ul>
                            <div class="container">
                                <div class="tab-content mt-2">
                                    <div class="tab-pane fade show active" id="debit" role="tabpanel"
                                        aria-labelledby="debit-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                Debit card / Credit Card
                                            </div>
                                            <div class="card-body">
                                                
                                                <form action="" method="POST">
                                                    <h6> Card holder Name</h6>
                                                    <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="name" id=""
                                                        placeholder="Enter Name on card" required>
                                                    </div>
                                                    <h6>Card Number</h6>
                                                    <div class="input-group mb-3">
                                                        <input type="text" class="form-control"
                                                            placeholder="Valid card Number" required>
                                                        <div class="input-group-append">
                                                            <span class="input-group-text"><i class="far fa-credit-card"></i> &nbsp; <i class="fab fa-cc-mastercard"></i></span>
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <h6>Expiry date</h6>
                                                            <div class="input-group mb-3">
                                                                <input type="number" class="form-control"
                                                                    placeholder="Month" required>
                                                                <input type="number" class="form-control"
                                                                    placeholder="Year" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <h6>CVV</h6>
                                                            <input type="number" class="form-control" name="" id=""
                                                                placeholder="XXX" required>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="submit" class="btn btn-primary btn-block" disabled>Make
                                                            Payment</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="netbanking" role="tabpanel" aria-labelledby="netbanking-tab">
                                        <div class="card">
                                            <div class="card-header">
                                                Netbanking
                                            </div>
                                            <div class="card-body" style="height: 300px;">
                                                <h6>Please select Your Bank</h6>
                                                <div class="dropdown">
                                                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                                                      Select Bank
                                                    </button>
                                                    <div class="dropdown-menu">
                                                      <h5 class="dropdown-header">Here Some famous List of bank</h5>
                                                      <a class="dropdown-item" href="#">State Bank of India</a>
                                                      <a class="dropdown-item" href="#">Indian Bank</a>
                                                      <a class="dropdown-item" href="#">Punjab national Bank</a>
                                                      <a class="dropdown-item" href="#">Bank of india</a>
                                                      <a class="dropdown-item" href="#">Union Bank</a>
                                                      <a class="dropdown-item" href="#">Bank of Baroda</a>
                                                      <a class="dropdown-item" href="#">Arya vart Bank</a>
                                                    </div>
                                                  </div>
                                                
                                            </div>
                                            <p> Note : Your selected Bank will be Redirect you on Bank Page</p>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="phonepay" role="tabpanel"
                                        aria-labelledby="phonepay-tab">


                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                </div>
            </div>
        </div>
        <hr>
        <div class="text-center">
            <p>Thanks for Visiting Us, Come again Next Time.</p>
            <div>
                <p class="text-muted">In case You don't Want to make payment, go back</p>
                <a href="#" target="_blank" class="btn btn-secondary ">Back to page</a>
            </div>
        </div>
    </div>

</body>

</html>