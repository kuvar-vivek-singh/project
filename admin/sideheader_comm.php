<?php
if(!defined("preventAccess")){
    exit("<b style='color:red'>Access Denied at this Page</b>");
}
?>
<!DOCTYPE html>
<html lang="en">
<?php
require_once("connection.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Eventwala Dashbord</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="style.css">


</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar" class=" text-light bg-dark ">
            <div class="sidebar-header text-success">
                <h3 id="full-text ">Eventwala</h3>
                <h3 id="half-text">EW</h3>
                <p class="text-muted">Admin panels</p>
                <span class="text-danger" title="Logged in Admin"><?php if(isset($_SESSION['email'])){
                                    $email=$_SESSION['email'];
                                 $sql="SELECT  `name`, `email` FROM `admin_regi` WHERE email= '$email'";
                                 $sql_query=mysqli_query($conn,$sql);
                                 $name=mysqli_fetch_assoc($sql_query);
                                  echo $name['name'];} ?>  &nbsp; </span>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="index.php">Admin dashboard</a>
                </li>
                <!--<li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                    <ul class="collapse bg-light list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                </li>-->
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false"
                        class="dropdown-toggle">Users</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="user_record.php">User Records</a>
                        </li>
                        <li>
                        <a href="user_modify.php">User Modify</a>
                        </li>
                        <li>
                        <a href="contact_us_user.php">Users Request</a>
                        </li>
                </li>
            </ul>
            </li>
            
            <li>
                <a href="venue_vendor_info.php">Vendors and Venues</a>
            </li>
            <li>
                <a href="">Add Vendors +</a>
            </li>
            <li>
                <a href="">Add Venues +</a>
            </li>
            <li>
                <a href="add_blog_post.php">Add Post</a>
            </li>
            <li>
            <a href="admin_regi.php">Admin Plus</a></li>
            </ul>

            <ul class="list-unstyled DECO">
                <li>
                    
                    <a href="#" class="download">Admin can See Only</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-dark">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-success ">
                        <i class="fas fa-align-left"></i>
                        <span>Starter.</span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end " id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item ">
                               
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success" class="nav-link btn btn-otline-success"
                                    href="logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="myTabContent">
           