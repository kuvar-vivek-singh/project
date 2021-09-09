<?php
define("preventAccess",TRUE);
?>
<?php
$title="E-invitation card";
require_once("connection.php");
require_once("header.php");
?>
<img src="banner/Eventwala.png" alt="">
<div class="jumbotron bg-light text-center">
    <h1>Welcome to Eventwala <b class="text-success">E-invitation</b> card</h1>
    <p>You are free to choose any Template</p>
</div>
<div class="container-fluid">

    <div class="row">
        <?php  for($i=1;$i<5;$i++){
        ?>
        <div class="col-md-6">


            <div class="card mt-2 mb-2" style="max-width: 40rem;">
                <div class="row ">
                    <div class="col">
                        <img class="mt-1 pl-2" src="banner/<?php echo 'invi-'.$i?>.jpg" alt="image"
                            style="width: 250px; height: 280px;">
                    </div>
                    <div class="col">
                        <h2 class="card-heading">Wedding <b class="text-success"> Invitation Card</b></h2>
                        <p class="card-text">You can send at any social media platform to recipients like gmail,whatsapp
                            etc.</p>
                    </div>
                </div>
                <hr style="border-top: 1px solid green;">
                <div class="row">
                    <div class="col">
                        <div class="container-fluid mt-1 mb-2">
                            <form>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Bride Full Name</label>
                                        <input type="text" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Groom Full Name</label>
                                        <input type="text" class="form-control" id="inputPassword4">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Some Family Name (bride side)</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="Darshan, Brijendra,manzar,etc. ">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Some Family Name (Groom side)</label>
                                    <input type="text" class="form-control" id="inputAddress2"
                                        placeholder="Nobita, rashmi, arijit,etc.">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">Wedding Venue</label>
                                        <input type="text" class="form-control" id="inputCity">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">City</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>Prayagraj</option>
                                            <option>Delhi</option>
                                            <option>Mumbai</option>
                                            <option>Mirzapur</option>
                                            <option>Other</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">Zip</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Check me out
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-outline-success">Go For Template</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
       
   } ?>
    </div>

</div>
<div class="jumbotron bg-light text-center">
    <h1>Covid-19 info</h1>
    <h2>Vaccination has been started <b class="text-success">(Covid-19)</b>, Take Your first Dose</h2>
    <p>Register on coWin website and then visit Your nearest vaccination center on mentioned date <br>
        <a href="https://selfregistration.cowin.gov.in/" target="_blank" class="btn btn-outline-success">Register on
            coWin</a>
    </p>

</div>
<div class="jumbotron bg-white">
    <div class="row">
        <div class="col">
            <h1>Any Question for Us?</h1>
           <h4>You Can Request Us Here</h4>
           <p>Please write us politely and we will be notified by your email</p>
           <small class="text-muted">Note:This form only for Template problem</small>
        </div>
        <div class="col">
            <?php
            if(isset($_POST['submit']))
            {
                $subject=trim($_POST['subject']);
                $email=trim($_POST['email']);
                $compose= htmlspecialchars(trim($_POST['compose']));
                $composeErr='';
                $countErr=0;
                $match='/^[a-zA-Z ]*$/';
                if(!preg_match($match,$compose))
                {
                    $countErr=1;
                    $composeErr='
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p> characters and space are allowed in compose </p>
                 <button type="button" class="close" data-dismiss="alert" area-label="close">
                    <span area-hidden="true">&times;</span>
                </button>
                 </div>';
                }

            }
            ?>
            
            <?php
            if(isset($composeErr)){
                echo $composeErr;
            }
            
                if(isset($countErr))
                {
                    if($countErr==0){
                        $checkemail="SELECT `email` FROM `query` WHERE email='$email'";
                        $emailhaving=mysqli_query($conn,$checkemail);
                        $num_of_query=mysqli_num_rows($emailhaving);
                        if($num_of_query<2){
                            $insertQ="INSERT INTO `query` (`query_id`, `subject`, `email`, `compose`, `date`) VALUES (NULL, '$subject', '$email', '$compose', current_timestamp())";
                            $query = mysqli_query($conn,$insertQ);
                        
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p> You query has been submitted thanks </p>
                         <button type="button" class="close" data-dismiss="alert" area-label="close">
                            <span area-hidden="true">&times;</span>
                        </button>
                         </div>
                        ';
                        }
                    else{
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <p> You have already submitted TWO query we cannot accept at this moment </p>
                         <button type="button" class="close" data-dismiss="alert" area-label="close">
                            <span area-hidden="true">&times;</span>
                        </button>
                         </div>
                        ';
                    }
                        

                    }
                }
               
               

            ?>
            <form method="POST" action="">
                
                <div class="form-group">
                    <label for="inputAddress">Subject</label>
                    <input type="text" class="form-control" id="inputAddress"
                        placeholder="Regarding Template" name="subject" value="Regarding Template" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email </label>
                    <input class="form-control" type="email" name="email" id="email" required>
                </div>

                <div class="form-group">
                    <label for="compose">Compose</label>
                    <textarea type="text" class="form-control" id="compose" name="compose"
                        placeholder="write Your problem" required></textarea>
                </div>
                
                    
                <button type="submit" name="submit" class="btn btn-outline-success">Send Request</button>
            </form>
        </div>
    </div>
</div>
<?php
require_once("footer.php")
?>