<?php
// Database connection goes here

$dbName = "dbemployee";

$con = mysqli_connect("localhost","magenta", "#magentaofficial2021", $dbName);

if(!$con) {
    echo mysqli_connect_errno();
} 
?>