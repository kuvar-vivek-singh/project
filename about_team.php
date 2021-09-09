<?php
define("preventAccess",TRUE);
?>
<?php
$title="developers";
require_once("connection.php");
require_once("header.php");
?>

<?php
// fetching data from db;
$team_sql="SELECT `id`, `name`, `about`, `facebooklink`, `twitterlink`, `instagramlink`, `image_dir` FROM `team_developers` WHERE 1";
$team_query=mysqli_query($conn,$team_sql);
$num_rows= mysqli_num_rows($team_query);

?>


<div class="bg-light mt-3 mb-3">
    <div class="container-fluid">
        <div class="jumbotron text-center bg-light">
            <h2 class="">Meet Our Team Member</h2>
            <p>It is Possible due to Our Team Member.</p>
        </div>
        
        <div class="row">
            <div class="col-sm-6">
                <div class="container-fluid text-center">
                    <div class="jumbotron ">
                        <h3>Our Team Leader</h3>
                        <hr>
                        <p>Our team leader is best known for his positive towards to work because of
                            him we all are worked in organize manner that's why we achieved <br>
                            this we all thanks to our Leader.</p>
                        <hr>
                        <h5> Great Quote about Leaderships</h5>
                        <hr style="width: 50%;">
                        <div class="shadow-lg  bg-white">
                            <div class="alert alert-dark text-capitelize">
                                Great Leaders don't set out to be a leader they set out to make
                                a difference it's never about the role it's always about goal.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" id="Team-leader">
                <div class="d-flex justify-content-center">
                    <img class="img-fluid rounded shadow-lg bg-white" src="gallery/developers/brijender.jpeg"
                        alt="New one" style="height: 440px;">
                    <div style="position: absolute;background-color: rgba(0, 0, 0, 0.637);left: 70px;">
                        <div class="p-1 pl-4 pr-4 text-white text-center">
                            <h5 class="">Mr.Brijender</h5>
                            <small class="bg-danger p-1 mb-1">FOLLOW Me</small>
                            <div class="row ">
                                <div class="col">
                                    <a href="http://" target="_blank" rel="noopener noreferrer"><i
                                            style="font-size: 18px;" class="fab fa-facebook"></i></a>
                                </div>
                                <div class="col">
                                    <a href="http://" target="_blank" rel="noopener noreferrer"><i
                                            style="font-size: 18px;" class="fab fa-twitter"></i></a>
                                </div>
                                <div class="col">
                                    <a href="http://" target="_blank" rel="noopener noreferrer"><i
                                            style="font-size: 18px;" class="fab fa-instagram"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            


        </div>
        
        <h3 class="text-center">Our Team Developers</h3>
        <hr>
        <?php if($num_rows>0){?>
        <div class="row">
         <?php while($team_data=mysqli_fetch_array($team_query)) { ?>
            <!-- First 1-->
            <div class="col-sm-6 col-md-4">
                <div class="developers">
                    <div class="image-container">
                        <img src="<?php echo $team_data['image_dir']?>" >
                    </div>
                    <div class="kvs-sliding-updown " style="background-color: rgba(0, 0, 0, .7);">
                        <div class="container p-1 text-center">
                            <h5 class="text-white"><?php echo $team_data["name"] ?></h5>
                            <div class="bg-danger text-white p-1">FOLLOW US ON </div>
                            <hr class="text-danger bg-danger">
                            <div class="row ">
                                <div class="col">
                                    <a href="<?php echo $team_data['facebooklink'] ?>" target="_blank" rel="noopener noreferrer"><i
                                            style="font-size: 30px;" class="fab fa-facebook"></i></a>
                                </div>
                                <div class="col">
                                    <a href="<?php echo $team_data['twitterlink'] ?>" target="_blank" rel="noopener noreferrer"><i
                                            style=" font-size: 30px;" class="fab fa-twitter"></i></a>
                                </div>
                                <div class="col">
                                    <a href="<?php echo $team_data['instagramlink'] ?>" target="_blank" rel="noopener noreferrer"><i
                                            style="font-size: 30px;" class="fab fa-instagram"></i></a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-1 mb-3" style="width: 380px;">
                    <div class="jumbotron">
                        <h5>About developer</h5>
                        <hr>
                        <?php echo $team_data["about"];?>
                    </div>
                </div>
            </div>
            <!-- First 1 end -->
            <?php  } ?>
        </div>
        <?php } ?>
    </div>
    <hr>
</div>

<?php
require_once("footer.php");
?>