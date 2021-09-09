<?php
session_start();
require_once("connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .sidebar {
            margin: 0;
            padding: 0;
            width: 250px;
            position: fixed;
            height: 100%;
            overflow: auto;
            text-align: center;
        }

        div.content {
            margin-left: 250px;
            padding-left: 6px;
            height: auto;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            div.content {
                margin-left: 0;
            }
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-light bg-light sticky-top p-3 mb-1">
        <a class="navbar-brand" style="font-size:30px" href="#">Eventwala.com</a>
        <ul class="navbar-nav justify-content-end">

            <li class="nav-item">
                <?php
                if(isset($_SESSION["user_email"]))
                {
                    echo '<a href="logout.php" class="btn btn-outline-dark btn-lg">Logout</a>';
                }
                else{
                    header("location:index.php");
                }
                ?>
            </li>

        </ul>
        
    </nav>
    <div class="sidebar bg-light">
        <nav class="navbar navbar-expand-md bg-light navbar-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggleto"
                aria-controls="navbar-toggleto" aria-expanded="true" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center " id="navbar-toggleto">
                <div class="nav flex-column nav-pills " id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <div class="mt-2 mb-3">
                        <span class="btn"><img src="gallery/developers/KVS.jpeg"
                                style="margin-top: 3px; width: 112px;height: 110px; border-radius: 50%;" alt=""></span>
                        <span class="text-muted p-2"><?php if(isset($_SESSION["user_email"])) echo $_SESSION["user_email"]; else echo '<br>Example@gmail.com'; ?></span>
                        <hr>
                    </div>
                    <?php 
                        $link_sql = "SELECT `v-pills`, `links` FROM `user_dashboard` WHERE 1";
                        $link_query = mysqli_query($conn,$link_sql);
                        $value_true=0;
                        ?>
                    <?php
                        while($link=mysqli_fetch_array($link_query)){
                            ?>
                    <a class="nav-link <?php if($value_true==0) echo 'active'?>"
                        id="<?php echo $link["v-pills"]; ?>-tab" data-toggle="pill"
                        href="#<?php echo $link["v-pills"]?>" role="tab" aria-controls="<?php echo $link["v-pills"]?>"
                        aria-selected="<?php if($value_true==0)echo 'true'; else echo 'false' ?>"><?php echo $link["links"] ?></a>
                    <?php
                        $value_true=1;
                        }
                        ?>
                </div>
            </div>
    </div>
    </nav>
    </div>

    <div class="content mb-3">
        <div class="tab-content justify-content-center" id="v-pills-tabContent">
            <?php 
            $data_sql="SELECT `dash_id`, `v-pills`, `links`, `heading` FROM `user_dashboard` WHERE 1";
            $data_query= mysqli_query($conn,$data_sql);
            $active=0;
            ?>
            <?php  
            while($data= mysqli_fetch_array($data_query)){
                ?>
            <div class="tab-pane fade show <?php if($active==0) echo 'active'?>" id="<?php echo $data['v-pills']?>"
                role="tabpanel" aria-labelledby="<?php echo $data['v-pills']?>-tab">
                <div class="text-center bg-dark">
                    <h4 class="text-light p-3 text-capitalize" style=""><?php echo $data["heading"];?> </h4>
                </div>
                <?php
                $switching_to=$data['links'];
                switch($switching_to){
                    case 'About':
                        require_once("about_me.php");
                        break;
                    case 'Update Password':
                        require_once("update_password.php");
                        break;
                    default:
                        require("sorry.php");
                }
                ?>
            </div>
            <?php
            $active=1;
            }
            ?>
        </div>

    </div>

</body>

</html>