<?php
session_start();
if(!isset($_SESSION['email'])){
    header("location:admin_login.php");
    exit();
}
define("preventAccess",TRUE);
require_once("sideheader_comm.php");
?>
<h2 class="text-center"><b>Request Message</b></h2>
<p class="text-center text-muted">This message appeard which is sent by user</p>
<hr>
<div class="container">
    <div class="d-flex">
    <div class="dropdown m-1 mb-2">
        <button class="btn btn-success " type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Sort <i class="fal fa-sort"></i>
        </button>
        <div class="dropdown-menu bg-light shadow" aria-labelledby="dropdownMenu2">
          <a class="dropdown-item " href="contact_us_user.php?switch=<?php echo 20202 ?>">Name <i class="far fa-arrow-up"></i></a>
          <a class="dropdown-item" href="contact_us_user.php?switch=<?php echo 30021 ?>"  >Newest date <i class="far fa-arrow-up"></i></a>
          <a class="dropdown-item" href="contact_us_user.php?switch=<?php echo 45321 ?>" >Oldest Date <i class="fal fa-arrow-down"></i></a>
        </div>
    </div>
    <?php 
    $count_q="SELECT * FROM contactus";
    $tuple=mysqli_query($conn,$count_q);
    $count=mysqli_num_rows($tuple);
    ?>
   <span class="btn" style="cursor:default;">Number Of Tuple : <?php echo $count ?> </span>
    </div>
    <table class="table table-hover">
        <thead class="thead-dark">
            <tr>
                <th scope="col">
                    User Name
                </th>
                <th scope="col">
                    User Email
                </th>
                <th scope="col">
                    Mobile No
                </th>
                <th>
                    Message for Us
                </th>
                <th>
                    Operation
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            function fixing(){
                if(isset($_GET['switch'])){
                    return($_GET['switch']);
                }
                else{
                    return(2021); // this is value which return as default setting
                }
            }
            $switching=fixing();
            if($switching==2021){
                $sql="SELECT `cont_id`, `first_name`, `last_name`, `mobile_no`, `email_add`, `comment`, `comment_time` FROM `contactus`";
            }
            else{
            switch($switching){
                case($switching==20202):
                    $sql="SELECT `cont_id`, `first_name`, `last_name`, `mobile_no`, `email_add`, `comment`, `comment_time` FROM `contactus`  ORDER BY last_name asc";
                    break;
                case ($switching==30021):
                    $sql="SELECT  `first_name`, `last_name`, `mobile_no`, `email_add`, `comment`, `comment_time` FROM `contactus` ORDER BY comment_time DESC";
                    break;
                case ($switching==45321):
                    $sql="SELECT  `first_name`, `last_name`, `mobile_no`, `email_add`, `comment`, `comment_time` FROM `contactus` ORDER BY comment_time ASC";
                    break;
            }
          }
            
            
            $query=mysqli_query($conn,$sql);
            if(mysqli_num_rows($query)>0){
                while($info=mysqli_fetch_assoc($query))
                {
                    ?>
            
            <tr>
                <td><?php echo $info['first_name']." ".$info['last_name'] ?></td>
                <td><?php echo $info['email_add']?></td>
                <td><?php echo $info['mobile_no']?></td>
                <td><?php echo $info['comment']?></td>
                <td> <a class="btn btn-success" href="">Reply</a> </td>

            </tr>
            <?php
                }

                
            }
            else{
                echo'<div class="jumbotron text-center bg-danger text-white">
                    <h3>No Message Has been found</h3>
                </div> ';
            }
            ?>
        </tbody>
    </table>
</div>
<?php
require_once("sideheader_end_comm.php");
?>