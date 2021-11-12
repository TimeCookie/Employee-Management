<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="../assets/css/admin-login.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="cont">
        <div class="form sign-in">
            <h2>Admin Sign In</h2>
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
            <form action="../modules/login-check.php" method="POST">
                <label>
                    <span>Username</span>
                    <input type="text" name="username">
                </label>
                <label>
                    <span>Password</span>
                    <input type="password" name="password">
                </label>
                <button class="submit" name="login" type="submit">Log in</button>
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-in">
                    <h2>User</h2>
                    <p>LAI MASUK USER</p>
                    <div class="container">
                        <a href="../pages/user-login.php">
                            <button class="btn btn1">Sign In</button>
                        </a> 
                    </div>
                </div>
            </div>  
        </div>
    </div>
    <script type="text/javascript" src="../assets/js/main.js"></script>
</body>
</html>