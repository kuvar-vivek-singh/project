

<?php
/* Note : before including this page into anothor page first ensure connection with databse
(means include header first then it. thanks you) */
    $indicator_sql="SELECT  `banner_id` FROM `carousel_banner` WHERE 1";
    $indicator_query= mysqli_query($conn,$indicator_sql);
    $indicators_count=0;
    $counter_img=0;
    ?>
    <div class=" mb-2">
        <div id="vive_link" class="carousel slide" data-ride="carousel">
            <!-- if you want to add interval then go for by using and add most recent top line: data-interval="500" data-pause="hover" -->

            <!-- Indicators -->
            <ul class="carousel-indicators">
            <?php
            while($indicators=mysqli_fetch_assoc($indicator_query)){
            if($indicators_count==0){
                $active="class='active'";
            }
            else{
                $active="";
            }
                $indicators_count++;
            ?>


                <li data-target="#vive_link" data-slide-to="<?php echo $counter?>" <?php echo $active;?>></li>
            <?php
                }
            ?>
            </ul>

            <!-- The slideshow -->
            <?php
                $slide_sql="SELECT `heading`, `description`, `image_path` FROM `carousel_banner` WHERE 1";
                $slide_query=mysqli_query($conn,$slide_sql);
            ?>
            <div class="carousel-inner">
                <?php
                while($slideshow=mysqli_fetch_assoc($slide_query)){
                if($counter_img==0){
                    $active_img="active";
                }
                else{
                    $active_img="";
                }
                $counter_img++;
                ?>

                <div class="carousel-item <?php echo $active_img;?>">
                    <img src='<?php echo $slideshow["image_path"]?>' alt="banner"
                        style="max-height:500px;width:100%;filter:blur(1px); background-color: rgba(0, 0, 0, 0.445);">
                        <div class="carousel-caption">
                            <h3><?php echo $slideshow["heading"]; ?></h3>
                            <p><?php echo $slideshow["description"]; ?></p>
                          </div>
                </div>
            <?php
             }
            ?>

            </div>

            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#vive_link" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#vive_link" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>

        </div>
    </div>