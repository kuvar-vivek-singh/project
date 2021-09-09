<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:admin_login.php");
    exit();
}
define("preventAccess",TRUE)
?>
<?php

require_once("sideheader_comm.php");
?>
<div class="row">
    <div class="col-sm-4 mb-3">
        <div class="card shadow-sm" style="width: 300px;border:none">
            <div class="card-header bg-light">
                <h3 class="text-muted">Registered User</h3>
            </div>
            <div class="card-body">
                <?php
                        $fetch_rec_user="SELECT * FROM `user_reg`";
                        $record= mysqli_query($conn,$fetch_rec_user);
                        $num_of_rows=mysqli_num_rows($record);
                        ?>
                <h2 class="text-center">
                    <?php echo $num_of_rows ?>
                </h2>
            </div>
        </div>
    </div>
    <div class="col-sm-4 mb-3">
        <div class="card shadow" style="width: 300px;border:none">
            <div class="card-header bg-light">
                <h3 class="text-muted">Fixed Admin</h3>
            </div>
            <div class="card-body bg-success">
                <?php
                                $fetch_rec_user="SELECT * FROM `admin_regi`";
                                $record= mysqli_query($conn,$fetch_rec_user);
                                $num_of_rows=mysqli_num_rows($record);
                                ?>
                <h1 class="text-center text-white" style="font-weight: 700;">
                    <?php echo $num_of_rows ?>
                </h1>
            </div>
        </div>
    </div>
    <div class="col-sm-4 mb-3">
        <div class="card shadow-sm" style="width: 300px;border:none">
            <div class="card-header bg-light">
                <h3 class="text-muted">Blog Post written</h3>
            </div>
            <div class="card-body">
                <?php
                        $fetch_rec_user="SELECT * FROM `blog_post`";
                        $record= mysqli_query($conn,$fetch_rec_user);
                        $num_of_rows=mysqli_num_rows($record);
                        ?>
                <h2 class="text-center">
                    <?php echo $num_of_rows ?>
                </h2>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row">
    <div class="col-sm-4">
        <div class="card shadow" style="width: 300px;">
            <div class="card-header bg-light">
                <h3 class="text-muted">Venue info</h3>
            </div>
            <div class="card-body bg-success">
                <h1 class="text-white text-center">5</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card shadow-sm" style="width: 300px;">
            <div class="card-header bg-light">
                <h3 class="text-muted">User Notifications</h3>
            </div>
            <div class="card-body">
                <h1 class=" text-center">5</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card shadow" style="width: 300px;">
            <div class="card-header bg-light">
                <h3 class="text-muted">Vendors info</h3>
            </div>
            <div class="card-body bg-success">
                <h1 class="text-white text-center">5</h1>
            </div>
        </div>
    </div>
</div>


<?php
require_once("sideheader_end_comm.php");
?>