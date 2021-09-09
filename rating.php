<?php $title="rating" ?>
<?php
require("header.php")
?>
<?php
require_once('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$sql ="select rating from product";
$queryex=mysqli_query($conn,$sql);
$empty_rat="<span class='fa fa-star'></span>";
$filled_rat="<span class='fa fa-star rating'></span>";
$half_rat="<span class='fa fa-star-half-o rating'></span>";
while($product= mysqli_fetch_assoc($queryex)){?>

<?php
$x=$product['rating'];
switch($x){
    case ($x>0 && $x<1.5):
        echo $filled_rat;
        echo $empty_rat;
        echo $empty_rat;
        echo $empty_rat;
        echo $empty_rat;
        break;
    case ($x>=1.5 && $x<2):
        echo $filled_rat;
        echo $half_rat;
        echo $empty_rat;
        echo $empty_rat;
        echo $empty_rat;
        break;
    case ($x>=2 && $x<2.5):
        echo $filled_rat;
        echo $filled_rat;
        echo $empty_rat;
        echo $empty_rat;
        echo $empty_rat;
        break;
    case ($x>=2.5 && $x<3):
       echo $filled_rat;
       echo $filled_rat;
       echo $half_rat;
       echo $empty_rat;
       echo $empty_rat;
       break;
    case ($x>=3 && $x<3.5):
       echo $filled_rat;
       echo $filled_rat;
       echo $filled_rat;
       echo $empty_rat;
       echo $empty_rat;
       break;

    case ($x>=3.5 && $x<4):
       echo $filled_rat;
       echo $filled_rat;
       echo $filled_rat;
       echo $half_rat;
       echo $empty_rat;
       break;
    case ($x>=4 && $x<4.5):
        echo $filled_rat;
        echo $filled_rat;
        echo $filled_rat;
        echo $filled_rat;
        echo $empty_rat;
        break;
    case ($x>=4.5 && $x<5):
        echo $filled_rat;
        echo $filled_rat;
        echo $filled_rat;
        echo $filled_rat;
        echo $half_rat;
        break;
    case (5):
        echo $filled_rat;
        echo $filled_rat;
        echo $filled_rat;
        echo $filled_rat;
        echo $filled_rat;
        break;
    default:
        echo $empty_rat;
        echo $empty_rat;
        echo $empty_rat;
        echo $empty_rat;
        echo $empty_rat;
}
?>
<?php
}
?>
</body>
</html>