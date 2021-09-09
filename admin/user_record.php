<?php

session_start();
if(!isset($_SESSION['email'])){
    header("location:admin_login.php");
    exit();
}
define("preventAccess",TRUE);
require_once("sideheader_comm.php");

?>
<table class="table table-bordered table-hover bg-light shadow">
  <thead>
    <tr>
        <th scope="col">Serial No.</th>
      <th scope="col">User Id(UID)</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile Number</th>
      <th scope="col">User city</th>
      <th scope="col">Address</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $sql="SELECT `user_id`, `first_name`, `last_name`, `user_email`, `mobile_num`, `user_city`, `address` FROM `user_reg`";
      
      $data=mysqli_query($conn,$sql);
      $number=0;
      while($user_data=mysqli_fetch_assoc($data)){
          $number+=1;
        ?>
      <tr>
      <th scope="row"><?php echo $number; ?></th>
      <td><?php echo $user_data['user_id'] ?></td>
      <td><?php echo $user_data['first_name'] ?></td>
      <td><?php echo $user_data['last_name'] ?></td>
      <td><?php echo $user_data['user_email'] ?></td>
      <td><?php echo $user_data['mobile_num'] ?></td>
      <td><?php echo $user_data['user_city'] ?></td>
      <td><?php echo $user_data['address'] ?></td>
    </tr>
    <?php

         }
        ?>
  </tbody>
</table>

<?php
require_once("sideheader_end_comm.php")
?>