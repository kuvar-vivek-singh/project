<?php
session_start();
?>
<?php
if(!defined("preventAccess")){
    exit("<b style='color:red'>Your request cannot be accepted at this Page</b>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
       
        #navbar {
            padding: 90px 10px;
            transition: 0.4s;
            width: 100%;
            top: 0;
            
        }

        #navbar #logo {
            font-size: 35px;
            transition: 0.4s;
            margin-right: 140px;
        }

        @media only screen and (max-width: 530px) {
            #navbar {
                padding: 20px 10px !important;
            }
           #navbar #logo{
                margin-right: 0px;
            }
            
        }
    </style>

    <script>
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
                document.getElementById("navbar").style.padding = "30px 10px";
                document.getElementById("logo").style.fontSize = "25px";
            } else {
                document.getElementById("navbar").style.padding = "70px 10px";
                document.getElementById("logo").style.fontSize = "35px";
            }
        }
    </script>
    

</head>

<body>
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-light shadow p-3  sticky-top">
        <a class="navbar-brand" href="#"  id="logo"><span class="text-success">Eventwala</span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-toggleto"
            aria-controls="navbar-toggleto" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbar-toggleto">
            <ul class="navbar-nav  mr-auto mt-2  mt-lg-0 " style="font-size: 18px;">
                <li class="nav-item">
                    <div class="dropdown">
                        <a id="drop" class="nav-link dropdown-toggle und-top" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Venues
                        </a>
                        <div class="dropdown-menu px-4 py-3 shadow p-3 mb-5 bg-light rounded"
                            aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="venues.php?type=<?php echo 'Banquet' ?>&city=<?php echo 'Lucknow'; ?>">Banquet Halls in Lucknow</a>
                            <a class="dropdown-item" href="venues.php?type=<?php echo 'Banquet' ?>&city=<?php echo 'Delhi'; ?>">Banquet Halls in Delhi</a>
                            <a class="dropdown-item" href="venues.php?type=<?php echo 'Banquet' ?>&city=<?php echo 'Noida'; ?>">Banquet Halls in Noida</a>
                            <a class="dropdown-item" href="venues.php?type=<?php echo 'Wedding' ?>&city=<?php echo 'Lucknow'; ?>">Wedding Halls in Lucknow</a>
                            <a class="dropdown-item" href="venues.php?type=<?php echo 'Wedding' ?>&city=<?php echo 'Delhi'; ?>">Wedding Halls in Delhi</a>
                            <a class="dropdown-item" href="venues.php?type=<?php echo 'Wedding' ?>&city=<?php echo 'Noida'; ?>">Wedding Halls in Noida</a>
                            <a class="dropdown-item" href="venues.php?type=<?php echo 'Party' ?>&city=<?php echo 'Lucknow'; ?>">Party Halls  in Lucknow</a>
                            <a class="dropdown-item" href="venues.php?type=<?php echo 'Party' ?>&city=<?php echo 'Delhi'; ?>">Party Halls in Delhi</a>
                            <a class="dropdown-item" href="venues.php?type=<?php echo 'Party' ?>&city=<?php echo 'Noida'; ?>">Party Halls in Noida</a>
                            <hr class="text-success" style="border: 1px solid;">
                            <a class="dropdown-item" href="venues.php">All Venues in Three cities</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle und-top" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Vendors
                        </a>
                        <div class="dropdown-menu px-4 py-3 shadow p-3 mb-5 bg-light rounded"
                            aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="vendors.php?type=<?php echo 'Photographer' ?>&city=<?php echo 'Lucknow'; ?>">Photographer in Lucknow</a>
                            <a class="dropdown-item" href="vendors.php?type=<?php echo 'Photographer' ?>&city=<?php echo 'Delhi'; ?>">Photographer in Delhi</a>
                            <a class="dropdown-item" href="vendors.php?type=<?php echo 'Photographer' ?>&city=<?php echo 'Noida'; ?>">Photographer in Noida</a>
                            <a class="dropdown-item" href="vendors.php?type=<?php echo 'Mehandi' ?>&city=<?php echo 'Lucknow'; ?>">Mehandi Artists in Lucknow</a>
                            <a class="dropdown-item" href="vendors.php?type=<?php echo 'Mehandi' ?>&city=<?php echo 'Delhi'; ?>">Mehandi Artists in Delhi</a>
                            <a class="dropdown-item" href="vendors.php?type=<?php echo 'Mehandi' ?>&city=<?php echo 'Noida'; ?>">Mehandi Artists in Noida</a>
                            <a class="dropdown-item" href="vendors.php?type=<?php echo 'Caterers' ?>&city=<?php echo 'Lucknow'; ?>">Cateres  in Lucknow</a>
                            <a class="dropdown-item" href="vendors.php?type=<?php echo 'Caterers' ?>&city=<?php echo 'Delhi'; ?>">Cateres in Delhi</a>
                            <a class="dropdown-item" href="vendors.php?type=<?php echo 'Caterers' ?>&city=<?php echo 'Noida'; ?>">Cateres in Noida</a>
                            <hr class="text-success" style="border: 1px solid;">
                            <a class="dropdown-item" href="venues.php">All vendors in Three cities</a>
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link und-bott" href="Blog.php">BLOG</a>
                </li>
            </ul>
            <div class="inline my-2 my-lg-0">
                <div class="dropdown">

                </div>
                <?php if(isset($_SESSION["user_email"])){
                  ?>
                <a href="user_profile.php" class="btn btn-lg btn-outline-success my-2 my-sm-0"><i class="far fa-user-circle"></i> Profile</a>
                
                <?php
                }
                else
                {?>
                <a href="login.php" class="btn btn-lg btn-outline-success my-2 my-sm-0">Login</a>
                <?php
                }?>
            </div>
        </nav>