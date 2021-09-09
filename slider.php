<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>slider</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<?php require("connection.php"); ?>
<?php
$ban_sql="SELECT `heading`, `description`, `image_path`, `upload_date`, `banner_id` FROM `carousel_banner` WHERE 1";
$ban_query=mysqli_query($conn,$ban_sql);
?>

<body>
    <div id="carouselExampleInterval" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php 
            $i=1;
            $active="";
            while($image=mysqli_fetch_array($ban_query)){
                if($i==$image['banner_id']){
                    $active="active";
                }
                else{
                    $active="";
                }

                
              ?>
            <div class="carousel-item <?php echo $active;?>" data-interval="10000">
                <img src="<?php echo $image['image_path'] ?>" class="d-block w-100" alt="...">
            </div>
            <?php
            $i++;
            }
            ?>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</body>

</html>