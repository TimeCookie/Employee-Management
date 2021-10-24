<?php
// Login process goes here

//Code Author: Marvin Christian (2031140)
include 'db_connect.php';

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $readQuery = "SELECT * FROM Admin WHERE username = '$username' AND password = '$password' LIMIT 1";
    $res = mysqli_query($con, $readQuery);

    if (mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
        if($password === $data['password']) {
            $_SESSION['adminId'] = $data['id'];
            header("location: ../pages/dashboard.php?status=authorized");
        } else {
            header("location: ../index.php?status=unauthorized");
        }
    } else {
        header("location: ../index.php?status=unauthorized");
    }
}

?>