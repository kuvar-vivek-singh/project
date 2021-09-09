<?php
define("preventAccess",TRUE);
?>

<?php $title="index";?>
<?php
require("header.php");
?>

<?php 
require("connection.php")
?>
<div class="alert alert-success ">
    <h1 class=text-center>Banquets Halls, party hall, wedding hall</h1>
    <p class="text-center">Here is many with places.</p>

</div>


<div class="row">
  <div class="col-sm-6 col-md-4">
      <div class="p-2">
          <ul class="list-group">
              <li class="list-group-item bg-success">
                  <h4 class="text-white">By Rating</h4>
              </li>
              <li class="list-group-item">
                 <a href="vendors.php?type=<?php  ?>& location=<?php echo 'Delhi' ?>" class="btn btn-lg">4-5</a>
              </li>
              <li class="list-group-item">
              <a href="" class="btn btn-lg">3-4</a>
              </li>
              <li class="list-group-item">
              <a href="" class="btn btn-lg">2-3</a>
              </li>
          </ul>
      </div>
      <div class="p-2">
          <ul class="list-group">
              <li class="list-group-item bg-success">
                  <h4 class="text-white">By Budget</h4>
              </li>
              <li class="list-group-item">
                 <a href="vendors.php?type=<?php  ?>& location=<?php echo 'Delhi' ?>" class="btn btn-lg">2000 to 5000</a>
              </li>
              <li class="list-group-item">
              <a href="" class="btn btn-lg">5000 to 1200</a>
              </li>
              <li class="list-group-item">
              <a href="" class="btn btn-lg">12000 t0 70000</a>
              </li>
          </ul>
      </div>
  </div>
  <div class="col-sm-6 col-md-8">
          <?php
              if(isset($_GET['type']) && isset($_GET['city'])){
                  $type=$_GET['type'];
                  $city=$_GET['city'];
                  $sql="SELECT `venue_id`, `venue_name`, `photos`, `about_venue`, `venue_type`, `city`, `rating`, `area`, `price`, `No_guests`, `created_date` FROM `venue` WHERE venue_type='$type' AND city='$city'";
              }
              
              elseif(isset($_GET['vendortype'])){
                  $venues_type=$_GET['vendortype'];
                  $sql="SELECT `venue_id`, `venue_name`, `photos`, `about_venue`, `venue_type`, `city`, `rating`, `area`, `price`, `No_guests`, `created_date` FROM `venue` venue_type='$venues_type'";
                   }
                  
              else{
                  $sql="SELECT `venue_id`, `venue_name`, `photos`, `about_venue`, `venue_type`, `city`, `rating`, `area`, `price`, `No_guests`, `created_date` FROM `venue` WHERE 1";
              }
              $query=mysqli_query($conn,$sql);
              $records=mysqli_num_rows($query);
              if($records>0)
              {
              while($venues=mysqli_fetch_assoc($query))
                  {
                  ?>
      <div class="card mb-5 bg-light shadow" style="max-width: 1200px;">
          <div class="row g-0">
              <div class="col-md-4">
                  <img src="gallery/catering.jpg" alt="PhotoGraphers" style="width: 100%;height: 100%;">
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                      <h4 class="card-title"><b><?php echo $venues['venue_name'] ?></b></h4>
                      <p class="card-text"><?php echo substr($venues['about_venue'],0,200) ?>... </p>
                      <span class="btn btn-success m-1" style="cursor: default;">&#x20B9; <?php echo $venues['price'] ?></span>
                      <span class="btn btn-danger m-1" style="cursor: default;">Rating : <?php echo $venues['rating'] ?></span>
                      <span class="btn btn-success m-1" style="cursor: default;"><?php echo $venues['venue_type'] ?></span><br>
                      <span class="text-danger m-1"><?php echo $venues['city'] ?></span>
                      <br><a class="btn btn-outline-success mt-3" href="single_venue_view.php?venue_details=<?php echo $venues['venue_id'] ?>"> Check Now</a>

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

<div class=" jumbotron  alert-success justify-content-center">
  <h1 class="text-center">You Need help?Request a call Back</h1>
  <hr>
  <!-- Button trigger modal -->
<div class="text-center">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
  Request Us
</button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Get Call back from team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mobile NO</label>
    <input type="number" class="form-control" id="exampleInputPassword1" placeholder="10 digit No">
  </div>
  <div class="form-group ">
    <label for="inputState">Select city</label>
    <select id="inputState" class="form-control">
      <option value="Lucknow" selected>Lucknow</option>
      <option value="Delhi" >Delhi</option>
      <option value="Noida">Noida</option>
    </select>
  </div>
  <button type="submit" class="btn btn-block btn-success">Request</button>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</div>
<?php
require_once("footer.php")
?>