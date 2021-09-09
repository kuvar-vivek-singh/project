<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:admin_login.php");
    exit();
}
define("preventAccess",TRUE);
require_once("connection.php");
require_once("sideheader_comm.php");
?>
<div class="containet-fluid">
    <div class="jumbotron text-center">
        <h2> <b> Venues and Vendor Info</b></h2>
        <p>Here is information about venues and Vendors</p>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow text-center">
                <div class="card-header">
                    <h3 class="text-success">Registered Vendors</h3>
                    <p class="text-muted">Confirmed by Eventwala team</p>
                </div>
                <div class="card-body bg-success">
                    <?php 
                    $sql="SELECT * FROM vendors";
                    $query=mysqli_query($conn,$sql);
                    $vendors=mysqli_num_rows($query);
                    ?>
                    <h1><b class="text-white">
                        <?php echo $vendors ?>
                    </b></h1>
                </div>
                
            </div>
        </div>
        <div class="col">
            <div class="card shadow text-center">
                <div class="card-header">
                    <h3 class="text-success">Registered Venues</h3>
                    <p class="text-muted">Confirmed by  Eventwala team</p>
                </div>
                <div class="card-body bg-dark">
                    <?php 
                    $sql="SELECT * FROM venue";
                    $query=mysqli_query($conn,$sql);
                    $venues=mysqli_num_rows($query);
                    ?>
                    <h1><b class="text-white"> <?php echo $venues ?></b></h1>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class="card text-center">
                <div class="card-header bg-light ">
                    <h2><b>Vendors Category</b></h2>
                </div>
                <div class="card-body bg-dark">
                    
                    <p>Totally three Category are there</p>
                    <div class="row">
                        <div class="col">
                            Photographers
                        </div>
                        <div class="col">
                            Caterers
                        </div>
                        <div class="col">
                            Menhadi artist
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-center">
                <div class="card-header bg-light">
                    <h2><b>4 Plus venues</b></h2>
                    

                </div>
                <div class="card-body bg-success">
                    <p class="text-white">Totally three Location are there</p>
                </div>
            </div>
        </div>
    </div>

</div>
<?php
require_once('sideheader_end_comm.php');
?>