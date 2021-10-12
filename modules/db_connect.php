<?php
// Database connection goes here

$dbName = "dbemployee";

$con = mysqli_connect("localhost","root", "", $dbName);

if(!$con) {
    echo mysqli_connect_errno();
} 
?>