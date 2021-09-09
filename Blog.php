<?php
define("preventAccess",TRUE);
?>

<?php
$title="Our Blog Post";
require_once("connection.php");
require_once("header.php");
?>
<?php
$blog_post="SELECT `blog_id`, `blog_title`, `blog_image`, `blog_content`, `Update_time`, `author_name` FROM `blog_post` WHERE 1";
$blog_query=mysqli_query($conn,$blog_post)
?>
<div class="jumbotron text-center bg-light">
  <h2 class="text-success">Our New BLOG Post</h2>
  <p>Read Our New Good quality blog post for New ideas</p>
  
</div>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <?php
  $crumbs = explode("/",$_SERVER["REQUEST_URI"]);
  foreach($crumbs as $crumb){
  ?>
    <li class="breadcrumb-item"><?php echo ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');  ?></li>
    <?php
  }
    ?>
  </ol>
</nav>
<div class="container">
  
  
    <?php
    while($blog=mysqli_fetch_assoc($blog_query)){

      ?>
    
      <div class="card mb-3 bg-light shadow" style="max-width: 1000px;">
        <div class="row ">
          <div class="col-md-4">
            <img src="<?php echo $blog['blog_image'] ?>" alt="Our Blog Post" style="width: 100%;height: 100%;">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title"><?php echo $blog['blog_title']; ?></h5>
              <p class="card-text">
              <?php echo substr( $blog["blog_content"],0,120); ?>...
              </p>
              <div class="row">
                <div class="col">
                  <small>
                    <p class="card-text text-muted">Last Update <?php echo $blog['Update_time'] ?></p>
                  </small>
                </div>
                <div class="col">
                  <a class="text-success" href="blog_read_more.php?postNo=<?php echo $blog['blog_id']  ?>">Read more</a>
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
<div class="jumbotron text-center">

  <h4>Subscribe Our Newslatter, get Updated</h4>
  <p><small>DON'T WORRY, WE DON'T SPAM,WE HATE TOO,WE WILL SEND YOU ONE IN A WEEK.</small></p>
  <div class="d-flex justify-content-center">
  <form action="" class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
      
      <input type="email" class="form-control" id="inputemail" placeholder="e.g.wedding@gmail.com">
    </div>
    <button type="submit" class="btn btn-primary mb-2">Subscribe Now</button>
  </form>
</div>
</div> 
<div class="jumbotron bg-light">
  <h1 class="text-center"><b> New Post</b></h1>
  <p class="text-center">Our New post comming Soon...till wait</p>
</div>
<?php
require_once("footer.php");
?>