<?php
define("preventAccess",TRUE);
?>
<?php
$title="Welcome to home page";
require_once("connection.php");
require_once("header.php");
?>
<?php
require_once("carousel_banner.php");
?>



<div class="bg-light pb-1 " id="kvs72">
    <div class="jumbotron text-center">
        <h1>Are You Looking For </h1>
        <p>Wedding halls, Banquets Halls, Birthday party, etc. <br>
        Explore Now</p>
    </div>
</div>
</div>


<div class="container-fluid bg-light" style="margin-top: -18px;">


    <h1 class="text-center  pt-2"> Top 3 Vendors in different <b class="text-success"> places</b>
    </h1>
    <hr class="text-success" style="border-top: 2px solid;width: 50%;">


    <div class="row">
        <?php 
        $topsql="SELECT DISTINCT city,vendor_name, vendor_id FROM `vendors` GROUP by city LIMIT 3";
        $queryD=mysqli_query($conn,$topsql);
        while($top3=mysqli_fetch_assoc($queryD)) {
            ?>
        <div class="col-sm-4 mb-5 ">

            <div class="card shadow mb-2" style="max-width: 25rem;">

                <img  src="banner/prayagraj.jpg" alt="" style="width: 100%;">
                <!-- -->
                <a href="vendors.php?city=<?php echo $top3['city'] ?>" style="text-decoration: none; cursor: pointer;">

                    <div class="card-body text-center text-muted">
                        <h3><?php echo $top3['city'] ?> <i style="font-size: 20px;" class="fa fa-check-circle text-success"
                                aria-hidden="true"></i></h3>
                        <small><?php echo $top3['vendor_name'] ?></small>

                    </div>

                </a>
                <div class="card-footer bg-light text-center" style="cursor: pointer;">
                    <div id="PrevNext" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner ">
                            <div class="carousel-item active text-success">
                                <div>[Covid-19] check on who website </div>
                            </div>
                            <div class="carousel-item text-success">
                                <div>Please Keep Distance, Wear Mask</div>
                            </div>
                            <div class="carousel-item text-warning">
                                <div>Sataution : Weekend Lockdown </div>
                            </div>
                            <div class="carousel-item text-success">
                                <div> Latest Info About Covid-19 </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php
          }
        ?>
    </div>

</div>

<div class="jumbotron bg-light text-center">
    <h1>Are You a <b class="text-success"> Vendor?</b></h1>
    <p>Do You provide services to Brides and Groom? eventwala.com can give
        <br> you planty of Oppartunities.</p>
    <a class="btn btn-outline-success" href="#">Sign Up <i class="fas fa-arrow-right"></i> </a>

</div>
<div class="container-fluid bg-light">
    <h1 class="text-center"> <b>Vendors</b> by Category</h1>
    <div class="card mb-5 bg-light shadow" style="max-width: 1200px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="gallery/wedding2.jpg" alt="PhotoGraphers" style="width: 100%;height: 100%;">
            </div>
            <div class="col-md-8 ">
                <div class="card-body">
                    <h4 class="card-title"><b> PhotoGraphers</b></h4>
                    <p class="card-text">If you are looking for a wedding photography team that captures 
                        the very essence of the myriad of emotions that 
                        unravel at the time of your wedding, then You come at right place 
                        they believe that “Meaningful is beautiful. Subtle is powerful.”</p>
                    <span class="btn btn-success m-1" style="cursor: default;">Price : 50,000 /per day </span > 
                    <span class="btn btn-success m-1" style="cursor: default;">Price:70,000+videography/per day</span>
                    <br><a class="btn btn-outline-success mt-3" href="vendors.php?vendortype=<?php echo 'Photographer' ?>" > Check Now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5 bg-light shadow" style="max-width: 1200px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="gallery/mehndi.jpg" alt="PhotoGraphers" style="width: 100%;height: 100%;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><b> Mehndi Design</b></h4>
                    <p class="card-text">A gorgeous Arabic bel-art mehndi design just never goes out 
                        of style. We love how neatly it’s drawn with petite strokes for the boundary and filling
                        . Incorporating traditional elements, this indeed is a simple mehndi design! </p>
                        <span class="btn btn-success m-1" style="cursor: default;">Price : 20,000 /per Hands(front+back) </span > 
                            <span class="btn btn-success -1" style="cursor: default;">Price <b class="text-light">+</b> 5,000 per per design </span>
                            <br><a class="btn btn-outline-success mt-3" href="vendors.php?vendortype=<?php echo 'Mehandi' ?>" > Check Now</a>
                        
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-5 bg-light shadow" style="max-width: 1200px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="gallery/catering.jpg" alt="PhotoGraphers" style="width: 100%;height: 100%;">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><b>Caterers</b></h4>
                    <p class="card-text">There are too catering services Vendor from different location.
                        You can get as integreted services with and without venues as your per Your mood  </p>
                        <span class="btn btn-success m-1" style="cursor: default;">starting price :599+ for veg </span > 
                            <span class="btn btn-success m-1" style="cursor: default;">starting price <b class="text-light">+</b> 399+ for non-veg </span>
                            <br><a class="btn btn-outline-success mt-3" href="vendors.php?vendortype=<?php echo 'Caterers' ?>" > Check Now</a>
                        
                </div>
            </div>
        </div>
    </div>
    <div class="" style="max-width: 1200px;">
        <div class="alert  alert-dismissible fade show" role="alert" style="background-color: #EFE7BC">
            <h2 class="text-center">Covid-19 Fighter during this pendemic</h2>
            <p class="text-center">Lets Solute them they have played vital role</p>
            <div class="d-flex justify-content-center">
                <div class="">
                    <div class="card shadow-sm m-1 p-2" style="max-width: 18rem;">
                        <img class="card-img-top" src="gallery/wed10.jpg" alt="" style="width: 100%;">
                    </div>
                </div>
                <div class="">
                    <div class="card shadow-lg p-1" style="max-width: 25rem;">
                        <img class="card-img-top" src="gallery/w5.jpg" alt="" style="width: 100%;">
                    </div>
                </div>
                <div class="">
                    <div class="card shadow-sm m-1 p-2" style="max-width: 18rem;">
                        <img class="card-img-top" src="gallery/we.jpg" alt="">
                    </div>
                </div>
            </div>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
    </div>
</div>



<div class="jumbotron alert alert-success shadow pb-5" >
    <h1 class="text-center"><b>Venues</b> by Category</h1>
    <hr>
    <div class="d-flex mb-2 justify-content-center">
        <h3 class="p-1">Wedding Halls |</h3>
        <h3 class="p-1">
            Party Halls |
        </h3>
        <h3 class="p-1">
            Banquet Halls
        </h3>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-4 mb-2">
            <div class="card shadow bg-light" style="max-width: 20rem;">
                <img src="gallery/mehndi.jpg" alt="img" style="width: 100%; height: 350px;opacity: 0.73;" >
                <div class="card-img-overlay  text-center">
                    <h2>
                        <b> Banquet Halls</b>
                        
                    </h2>
                    <p class="card-text text-light">
                        choose Your Banquets Halls from here 
                        tap the banner below button
                    </p> 
                    <a class="btn btn-success" href="venues.php?venuetype=<?php echo 'Banquet' ?>">Banquet Halls</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 mb-2">
            <div class="card shadow bg-light" style="max-width: 20rem;">
                <img src="gallery/24.jpg" alt="img" style="width: 100%; height: 350px;opacity: 0.73;" >
                <div class="card-img-overlay  text-center">
                    <h2>
                        <b> Party Halls</b>
                        
                    </h2>
                    <p class="card-text text-light">
                        Choose Your Party halls from here 
                        tap the banner below button
                    </p> 
                    <a class="btn btn-success" href="venues.php?venuetype=<?php echo 'Party' ?>">Party Halls</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 mb-2">
            <div class="card shadow bg-light" style="max-width: 20rem;">
                <img src="gallery/mehndi.jpg" alt="img" style="width: 100%; height: 350px;opacity: 0.73;" >
                <div class="card-img-overlay  text-center">
                    <h2>
                        <b>Wedding Halls</b>
                        
                    </h2>
                    <p class="card-text text-light">
                        Choose Your Wedding Halls from here 
                        tap the banner below button
                    </p> 
                    <a class="btn btn-success" href="venues.php?venuetype=<?php echo 'Wedding' ?>">Wedding Halls</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="jumbotron text-center text-success">
    <h1>Do You want to join us ?</h1>
    <p>Please go through Contact form section.</p>
    <a class="btn btn-success " href="contact_us.php">Contact Us Now</a>
</div>
<?php
require_once("footer.php");
?>