<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
    <title>Hello, world!</title>
    <link rel="stylesheet" href="assets/css/style.css">
    
  </head>
  <body>
    <section class="Form my-4 mx-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-5">
                    <img src="assets/img/harry-shelton-pPxhM0CRzl4-unsplash.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 px-5 pt-5">
                    <h1 class="font-weight-bold py-3">LOGO</h1>
                    <h4>Sign into your account</h4>
                    <!-- FORM BEGINS HERE -->
                    <form method="POST" action="modules/login-check.php">
                        <?php
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
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" name="username" placeholder="Username" class="form-control my-3 p-4">
                            </div>
                            <div class="form-row">
                                <div class="col-lg-7">
                                    <input type="password" name="password" placeholder="Password" class="form-control my-3 p-4">
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-7">
                                        <input type="submit" class="btn1 mt-3 mb-5" value="Login"></input>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!--FORM ENDS HERE-->
                </div>
            </div>
        </div>

    </section>
  




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->
  </body>
</html>