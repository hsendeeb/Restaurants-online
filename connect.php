<?php
$server="localhost";
$user="root";
$database="restaurantOnline";
$password="";
$con=mysqli_connect($server,$user,$password,$database);
if(!$con){
    echo "failed to connect";
}

?>