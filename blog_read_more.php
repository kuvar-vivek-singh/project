<?php
define("preventAccess",TRUE);
?>

<?php
$title="Read This Blog Post";
require_once("header.php");
require_once("connection.php");
?>
<div class="container-fluid mt-5">
    <?php
        $get_post_id=$_GET['postNo'];
        $sql="SELECT `blog_id`, `blog_title`, `blog_image`, `blog_content`, `Update_time`, `author_name` FROM `blog_post` WHERE blog_id=$get_post_id";
        $query=mysqli_query($conn,$sql);
        $blog=mysqli_fetch_assoc($query);
        $count=mysqli_num_rows($query);
        if($count>0){
            ?>
    <div class="row">
        <div class="col-sm-7">
            <div class="container-fluid">

                <h2 class="text-center">
                   <b> <?php echo $blog['blog_title'] ?></b>
                </h2>
                <hr>
               <?php
                ?>
                <img src="<?php echo $blog['blog_image'] ?>" alt="bog post image" style="width: 100%;">
                
                <p class="text-secondary m-1" style="word-spacing: 1px;">
                    <?php echo $blog['blog_content'] ?>
                </p>

            </div>
        </div>
        <div class="col-sm-5">
            <h2>Links for another Post</h2>
            <hr>
            </div>
    </div>
    <?php
        }
        else{
            echo '<div class="jumbotron">
                <h1 class="text-center"><b class="text-danger"> Sorry to see This</b></h1>
                <p class="text-center">In feature we will Post More</p>
            </div>';
        }
        ?>

</div>
<div class="jumbotron text-center">

  <h4>Subscribe Our Newslatter, get Updated</h4>
  <p><small>DON'T WORRY, WE DON'T SPAM,WE HATE TOO,WE WILL SEND YOU ONE IN A WEEK.</small></p>
  <div class="d-flex justify-content-center">
  <form action="" class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
      
      <input type="email" class="form-control" id="inputemail" placeholder="e.g.wedding@gmail.com">
    </div>
    <button type="submit" class="btn btn-success mb-2">Subscribe Now</button>
  </form>
</div>
</div>
<?php
    require_once("footer.php");
    ?>