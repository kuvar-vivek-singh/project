<?php 
$servername="localhost";
$username="root";
$password="";
$dbname="event";
$conn=new mysqli($servername,$username,$password,$dbname);
if($conn->connect_error){
    die("<b style='color:red'>Connection is not established</b>".$conn->connect_error);
}
//echo "connection is Established";
?>