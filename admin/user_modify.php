<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:admin_login.php");
    exit();
}
define("preventAccess",TRUE);
require_once("sideheader_comm.php");
?>
<h2>Modify User Details</h2>
<div class="table-responsive-sm">
<table class="table table-bordered table-hover bg-light shadow-sm">
  <thead class="thead-dark">
    <tr>
        <th scope="col">Serial No.</th>
      <th scope="col">User Id(UID)</th>
      <th scope="col">First Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">Action</th>
  
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql="SELECT `user_id`, `first_name`, `user_email`, `mobile_num`, `user_city`, `address` FROM `user_reg`";
      
      $data=mysqli_query($conn,$sql);
      $number=0;
      while($user_data=mysqli_fetch_assoc($data)){
          $number+=1;
        ?>
      <tr>
      <th scope="row"><?php echo $number; ?></th>
      <td><?php echo $user_data['user_id'] ?></td>
      <td><?php echo $user_data['first_name'] ?></td>
      <td><?php echo $user_data['user_email'] ?></td>
      <td><?php echo $user_data['mobile_num'] ?></td>
      <td>
        <div class="row">
          <div class="col">
          <a href="delete_user.php?Uid=<?php echo $user_data['user_id']+999?>" title="delete user"><i style="font-size:20px;" class="fal fa-trash-alt text-danger"></i></a>
          </div>
          <div class="col">
          <a href="admin_update_user.php?Uid=<?php echo $user_data['user_id']+999?>& name=<?php echo $user_data['first_name'] ?>" title="Update user details" ><i style="font-size:20px" class="far fa-user-edit text-success"></i></a></td> 
          </div>
        </div>
        
      
    </tr>
    <?php

         }
        ?>
  </tbody>
</table>
</div>
<?php
require_once("sideheader_end_comm.php");
?>