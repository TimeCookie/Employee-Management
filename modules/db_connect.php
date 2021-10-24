<?php
// Database connection goes here

//Code author: Bryan Tandian (2031076) 

$dbName = "dbemployee";

$con = mysqli_connect("localhost","root", "", $dbName);

if(!$con) {
    echo mysqli_connect_errno();
} 
?>