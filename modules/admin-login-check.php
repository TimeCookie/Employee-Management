<?php
// Login process goes here

//Code Author: Marvin Christian (2031140)
include 'db_connect.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $readQuery = "SELECT * FROM admin WHERE username = '$username' AND password = '$password' LIMIT 1";
    $res = mysqli_query($con, $readQuery);

    if (mysqli_num_rows($res) <= 0) {
        header("location: ../pages/admin-login.php?status=unauthorized");
    } else {
        $data = mysqli_fetch_assoc($res);
        if($password === $data['password']) {
            $_SESSION['adminId'] = $data['id'];
            header("location: ../pages/admin/admin-dashboard.php?status=authorized");
        } else {
            header("location: ../pages/admin-login.php?status=unauthorized1");
            
        }
    }
}

?>