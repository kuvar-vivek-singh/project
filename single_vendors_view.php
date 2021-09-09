<?php
define("preventAccess",TRUE);
?>
<?php $title="View your event details";?>
<?php
require_once("connection.php");
?>
<?php require_once("header.php")?>
<?php
$vendor_id= $_GET["vendor_details"];
$vendors_details="SELECT `vendor_id`, `vendor_name`, `photos`, `vendor_type`, `city`, `area`, `about_vendors`, `vendor_rating`, `price`, `created_date` FROM `vendors` WHERE vendor_id='$vendor_id'";
$queryexe=mysqli_query($conn,$vendors_details);
$vendors=mysqli_fetch_assoc($queryexe);
?>
<div class="container-fluid">

    <!--First row-->
    <div class="row jumbotron">
        <!-- First column that is image of events-->
        <div class="col-md-6">
            <h5 class="text-muted">Area : <?php echo $vendors['area'] ?></h5>
            <img class="img-fluid" src="<?php echo $vendors["photos"]?>" alt="<?php echo $vendors['vendor_name'] ?>" l>
        </div>
        <!-- End of first column that is image of events-->
        <!--Description of events and rating details-->
        <div class="col-md-6 ">
            <div class="">
                <h4 class="text-capitalize text-success"><?php echo $vendors["vendor_name"] ?></h4>
                <br>

                <?php    
         $empty_rat="<span class='fa fa-star'></span>";
        $filled_rat="<span class='fa fa-star rating'></span>";
        $half_rat="<span class='fa fa-star-half-o rating'></span>";
                $x=$vendors['vendor_rating'];
            switch($x){
                case ($x>0 && $x<1.5):
                    echo $filled_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    break;
                case ($x>=1.5 && $x<2):
                    echo $filled_rat;
                    echo $half_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    break;
                case ($x>=2 && $x<2.5):
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    break;
                case ($x>=2.5 && $x<3):
  
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $half_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    break;
                case ($x>=3 && $x<3.5):
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    break;

                case ($x>=3.5 && $x<4):
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $half_rat;
                    echo $empty_rat;
                    break;
                case ($x>=4 && $x<4.5):
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $empty_rat;
                    break;
                case ($x>=4.5 && $x<5):
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $half_rat;
                    break;
                case (5):
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $filled_rat;
                    echo $filled_rat;
                    break;
                default:
                    echo $empty_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    echo $empty_rat;
                    echo $empty_rat;
               }
               ?>
                (<?php echo $x; ?>)
            </div>
            <p><?php echo substr($vendors["about_vendors"],0,230)?> ...</p>
            <i class="fa fa-map-marker" aria-hidden="true" style="color:red"></i> &nbsp<?php echo $vendors["city"]?>
            <h4>Price: &#x20B9;<i></i> <?php echo $vendors["price"]?></h4>
            <h5><?php echo $vendors['vendor_type'] ?></h5>
            <button class="btn btn-success">Request for Booking</button>
        </div>
        <!--End of description of events and rating details-->
    </div>
    <!--End of first row-->
    <!--Second row-->
    <div class="row m-1 mt-2 mb-2  bg-light">
        <div class="col">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="overviews-tab" data-toggle="tab" href="#overviews" role="tab"
                        aria-controls="overviews" aria-selected="true">Overviews</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="rating-tab" data-toggle="tab" href="#rating" role="tab"
                        aria-controls="rating" aria-selected="false">Rating</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="reviews-tab" data-toggle="tab" href="#reviews" role="tab"
                        aria-controls="reviews" aria-selected="false">Reviews</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent" style="height: inherit;">
                <div class="tab-pane fade show active" id="overviews" role="tabpanel" aria-labelledby="overviews-tab">
                    <div class="container">
                    <?php echo $vendors["about_vendors"] ?>
                    </div></div>
                <div class="tab-pane fade" id="rating" role="tabpanel" aria-labelledby="rating-tab">
                    <div class="row">
                        <div class="col">
                            <br>
                            <h3>4.4/5</h3>
                        </div>
                        <div class="col">
                            <br>
                            <!-- Blue -->
                            <div class="progress">
                                <div class="progress-bar" style="width:10%"></div>
                            </div>
                            <br>
                            <!-- Green -->
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width:20%"></div>
                            </div>
                            <br>
                            <!-- Turquoise -->
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width:30%"></div>
                            </div>
                            <br>
                            <!-- Orange -->
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width:40%"></div>
                            </div>
                            <br>
                            <!-- Red -->
                            <div class="progress">
                                <div class="progress-bar bg-danger" style="width:50%"></div>
                            </div>


                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab"> Reviews Not
                    available</div>
            </div>

        </div>
    </div>
    <!--End of second row-->
</div>
<hr>
<?php
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $error=0;
        if (!preg_match("/^([a-zA-Z' ]+)$/",$name) && strlen($name)>3 ) {
        $name_error = "Name must contain only alphabets and space <br> OR
                 <br>Name must greater than three characters";
                 $error=1;
        }
        
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $email_error = "Please Enter Valid Email";
        $error=1;

        }
        if($error==0){
            $email_query="SELECT * FROM user_reg WHERE user_email='$email'";
            $execute=mysqli_query($conn,$email_query);
            $email_count=mysqli_num_rows($execute);
            if($email_count>0){
                $sqlInsert="INSERT ";
                $execute=mysqli_query($conn,$sqlInsert);
                $comment_query="<div class='alert alert-success'>Your comment has been submitted to our record and thank for your feedback.</div>";
            }
            else{
                $email_DNE="<div class='alert alert-danger'>This email is not exist ,Register Now for Comment <br>
                Click to Connect <a href='signup.php'>Registration</a>.</div>";
                
            }
        }
        else{
            $above_field="<div class='alert alert-danger'>Please fill the data correctly!</div>";;
        }
        
       
        

 }
?>
<div class="container">
    <h3 style="text-align: center;">What You thing about this event just comment here</h3>
    <div class="card">
        <div class="card-header">
            Your comment is matter
        </div>
        <div class="card-body">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                <div>
                    <input type="text" name="name" id="name" class="form-control text-muted" placeholder="Name *"
                        required>
                    <small class="form-text text-danger">
                        <?php if(isset($name_error)) echo $name_error; ?>
                    </small>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email *" required>
                    <small class="form-text text-danger">
                        <?php if(isset($email_error)) echo $email_error;  ?>
                    </small>
                </div>
                <div class="form-group">
                    <textarea style="border-color: silver;" name="text-aria" id="text-aria" cols="149" rows="10" placeholder="Write Your Comment *"
                        required></textarea>
                    <small class="form-text text-danger">
                        <?php if(isset($email_error)) echo $email_error;  ?>
                    </small>
                </div>
                <button type="submit" name="submit" class="btn btn-success btn-lg">Submit Your Comment</button>
            </form>
            <small style="font-size: 12px;color:red">Note : * means this field is required so You can't leave empty</small>
        </div>
        <div class="card-footer">
            <small>Read Our Privacy policy then go forword</small>
        </div>
    </div>
</div>
<br>
<?php
require_once("footer.php");
?>