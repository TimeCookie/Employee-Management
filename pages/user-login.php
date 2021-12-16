<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/user-login.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="cont">
        <div class="form sign-in">
            <form action="../modules/user-login-check.php" method="POST">

                <h2>User Sign In</h2>
                <?php
                    // Code Author: Andre Jonathan Harahap (203105)
                    if(isset($_GET['status'])) {
                        if ($_GET['status'] == "unauthorized") {
                ?>
                    <div class="unauthorized-user">
                        <p>User not authorized!</p>
                    </div>
                <?php
                        }
                    }
                ?>
                <label>
                    <span>Username</span>
                    <input type="Username" name="username">
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password">
                </label>
                <button type="submit" name="user-login" class="submit">Log in</button>

            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-in">
                    <h2>Admin</h2>
                    <p>Sign in as Admin</p>
                    <div class="container">
                        <a href="../pages/admin-login.php">
                            <button class="btn btn1">Sign In</button>
                        </a>
                    </div>
                </div>  
            </div>
        </div>
    </div>

</body>
</html>