<?php
include 'db_connect.php';
session_start();

if(($_SERVER['REQUEST_METHOD'] == "POST") && (isset($_POST['user-login']))) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $readQuery = "SELECT * FROM user_employee WHERE username = '$username' LIMIT 1";
    $res = mysqli_query($con,$readQuery);

    if(mysqli_num_rows($res) <= 0) {
        header("Location: ../pages/user-login.php?status=unauthorized");
        die;
    }
    else {
        $data = mysqli_fetch_assoc($res);
        // Checks default password only
        if($password === $data['password']) {
            $_SESSION['userId'] = $data['username'];
            header("Location: ../pages/user/edit-profile.php?status=authorized-new");
        }
        else if($password != $data['username']) {
            $access = password_verify($password, $data['password']);
            
            if (($access == 1) || ($access == true)) {
                $_SESSION['userId'] = $data['username'];
                header("Location: ../pages/user/edit-profile.php?status=authorized");
            }
            else {
                header("Location: ../pages/user-login.php?status=unauthorized");
            }
        }
        
    }


}

?>