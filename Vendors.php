<?php
define("preventAccess",TRUE);
?>

<?php $title="Vendors | photographers | catteres | mehandi"?>
<?php
require("header.php");
?>

<?php 
require("connection.php")
?>

<div class="jumbotron">
<?php    
if(isset($_GET['type']) && isset($_GET['city'])){
    $city=$_GET['city'];
    $type=$_GET['type'];
}
else{
$city="<span>Lucknow, Delhi, Noida</span>";
$type="<span>Photographer, Cateres and Mehndi Artist</span>";
}
?>
    <h1 class="text-center"><?php echo $type; ?></h1>
    <p class="text-center">There are many vendors in <?php echo $city; ?></p>
</div>

<div class="row p-2">
    <div class="col-sm-6 col-md-3">
        <div class="p-1 ">
        <div id="accordion">
    <div class="card shadow">
      <div class="card-header alert alert-success">
        <a class="card-link text-success" data-toggle="collapse" href="#collapseOne">
          Ratings
        </a>
      </div>
      <div id="collapseOne" class="collapse show" data-parent="#accordion">
        <div class="card-body alert-success">
        <ul class="list-group">
                
                <li class="list-group-item">
                   <a href="vendors.php?ratings=<?php echo 4; ?>" class="btn btn-lg">4-5</a>
                </li>
                <li class="list-group-item">
                <a href="" class="btn btn-lg">3-4</a>
                </li>
                <li class="list-group-item">
                <a href="" class="btn btn-lg">2-3</a>
                </li>
            </ul>
        </div>
      </div>
    </div>
    <div class="card shadow">
      <div class="card-header alert alert-success">
        <a class="collapsed card-link text-success" data-toggle="collapse" href="#collapseTwo">
        Budget
      </a>
      </div>
      <div id="collapseTwo" class="collapse" data-parent="#accordion">
        <div class="card-body alert-success">
            <ul class="list-group ">
        
                <li class="list-group-item">
                   <a href="vendors.php?type=<?php  ?>& location=<?php echo 'Delhi' ?>" class="btn btn-block btn-outline-success">2000 to 5000</a>
                </li>
                <li class="list-group-item">
                <a href="" class="btn btn-block">5000 to 1200</a>
                </li>
                <li class="list-group-item">
                <a href="" class="btn btn-block">12000 to 70000</a>
                </li>
            </ul>
        </div>
      </div>
    </div>
    <div class="card shadow">
      <div class="card-header alert alert-success ">
        <a class="collapsed card-link text-success" data-toggle="collapse" href="#collapseThree">
          By Location
        </a>
      </div>
      <div id="collapseThree" class="collapse" data-parent="#accordion">
        <div class="card-body alert-success">
          <button class="btn btn-success">Delhi</button>
          <button class="btn btn-success">Noida</button>
          <button class="btn btn-success">Lucknow</button>
        </div>
      </div>
    </div>
  </div>
</div>
            
        
        
    </div>
    <div class="col-sm-6 col-md-9">
            <?php
                if(isset($_GET['type']) && isset($_GET['city'])){
                    $type=$_GET['type'];
                    $city=$_GET['city'];
                    $sql="SELECT `vendor_id`, `vendor_name`, `photos`, `v_email`, `v_contact`, `vendor_type`, `city`, `area`, `about_vendors`, `vendor_rating`, `price`, `created_date` FROM `vendors` WHERE vendor_type='$type' AND city='$city'";
                }
                
                elseif(isset($_GET['vendortype'])){
                    $vendors_type=$_GET['vendortype'];
                    $sql="SELECT `vendor_id`, `vendor_name`, `photos`, `v_email`, `v_contact`, `vendor_type`, `city`, `area`, `about_vendors`, `vendor_rating`, `price`, `created_date` FROM `vendors` WHERE vendor_type='$vendors_type'";
                     }
                elseif(isset($_GET['city'])){
                    $city=$_GET['city'];
                    $sql="SELECT `vendor_id`, `vendor_name`, `photos`, `v_email`, `v_contact`, `vendor_type`, `city`, `area`, `about_vendors`, `vendor_rating`, `price`, `created_date` FROM `vendors` WHERE city='$city'";
                }
                    
                else{
                    $sql="SELECT `vendor_id`, `vendor_name`, `photos`, `v_email`, `v_contact`, `vendor_type`, `city`, `area`, `about_vendors`, `vendor_rating`, `price`, `created_date` FROM `vendors` WHERE 1";
                }
                $query=mysqli_query($conn,$sql);
                $records=mysqli_num_rows($query);
                if($records>0)
                {
                while($vendors=mysqli_fetch_assoc($query))
                    {
                    ?>
        <div class="card mb-5 bg-light shadow" style="max-width: 1200px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $vendors['photos'] ?>" alt="PhotoGraphers" style="width: 100%;height: 100%;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><b><?php echo $vendors['vendor_name'] ?></b></h4>
                        <p class="card-text"><?php echo substr($vendors['about_vendors'],0,200) ?>... </p>
                        <span class="btn btn-success m-1" style="cursor: default;">&#x20B9; <?php echo $vendors['price'] ?></span>
                        <span class="btn btn-danger m-1" style="cursor: default;">Rating : <?php echo $vendors['vendor_rating'] ?></span>
                        <span class="btn btn-success m-1" style="cursor: default;"><?php echo $vendors['vendor_type'] ?></span><br>
                        <span class="text-danger m-1"><?php echo $vendors['city'] ?></span>
                        <br><a class="btn btn-outline-success mt-3" href="single_vendors_view.php?vendor_details=<?php echo $vendors['vendor_id'] ?>"> Check Now</a>

                    </div>
                </div>
            </div>
        </div>
        <?php
     }
    }
    else{
       echo '<div class="jumbotron">
        <h1 class="text-center text-danger">Sorry</h1>
        <p1 class="text-center ">There is no records in this page</p1>
    </div>';
       
    }
    ?>
    </div>
    
</div>

<?php
require_once("footer.php");
?>