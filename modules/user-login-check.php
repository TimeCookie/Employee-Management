<?php
include 'db_connect.php';
session_start();

date_default_timezone_set('Asia/Jakarta');

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
        // Checks default password
        if($password === $data['password']) {
            $_SESSION['userId'] = $data['username'];

            $readQuery = "SELECT * FROM shift WHERE employee_id = $username";
            $res = mysqli_query($con,$readQuery);

            // New user that hasn't changed password
            if(mysqli_num_rows($res) == 0) {
                header("Location: ../pages/user/edit-profile.php?status=authorized-new");
            }
            // Old user who hasn't changed password
            else {
                $readQuery1 = "SELECT admission_time FROM shift WHERE employee_id=$username";
                $res1 = mysqli_query($con,$readQuery1);
                $data = mysqli_fetch_assoc($res1);
                $curAdmission = $data['admission_time'];
                if($curAdmission == '0000-00-00 00:00:00' || empty($curAdmission)) {
                    $timeNow = date('Y-m-d H:i:s');
                    $updateQuery = "UPDATE shift SET admission_time='$timeNow' WHERE employee_id=$username";
                    mysqli_query($con,$updateQuery);

                    //echo $timeNow;
                    //echo $username;
                    header("Location: ../pages/user/edit-profile.php?status=authorized");

                }
                else {
                    header("Location: ../pages/user/edit-profile.php?status=authorized");
                }
            }
        }
        // User that has changed their password
        else if($password != $data['username']) {
            $access = password_verify($password, $data['password']);
            
            if (($access == 1) || ($access == true)) {
                $_SESSION['userId'] = $data['username'];
                $username = $data['username'];
                $readQuery = "SELECT * FROM shift WHERE employee_id = $username";
                $res = mysqli_query($con,$readQuery);

                if(mysqli_num_rows($res) == 0) {
                    header("Location: ../pages/user/edit-profile.php?status=authorized-new");
                }
                else {
                    
                    $username = $data['username'];
                    $readQuery1 = "SELECT admission_time FROM shift WHERE employee_id=$username";
                    $res1 = mysqli_query($con,$readQuery1);
                    $data = mysqli_fetch_assoc($res1);
                    $curAdmission = $data['admission_time'];
                    if($curAdmission == '0000-00-00 00:00:00' || empty($curAdmission)) {
                        $timeNow = date('Y-m-d H:i:s');
                        $updateQuery = "UPDATE shift SET admission_time='$timeNow' WHERE employee_id=$username";
                        mysqli_query($con,$updateQuery);
                        //echo $timeNow;
                        //echo $username;
                        
                        header("Location: ../pages/user/edit-profile.php?status=authorized");

                    }
                    else {
                        header("Location: ../pages/user/edit-profile.php?status=authorized");
                    }
                    
                }
            }
            else {
                header("Location: ../pages/user-login.php?status=unauthorized");
            }
        }
        // User entered wrong password
        else {
                header("Location: ../pages/user-login.php?status=unauthorized");
        }
    }


}

?>