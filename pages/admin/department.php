<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>
    <link rel="stylesheet" href="../../assets/css/department.css">
    <!-----ini Box icon ------>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="logo_name">Manajemen karyawan</div>
            </div>
            <i class='bx bx-menu'id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="dashboard.php">
                    <i class='bx bx-home'></i>
                    <span class="link_name">Home</span>
                </a>
               <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="employee.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">User</span>
                </a>
               <span class="tooltip">User</span>
            </li>
            <li>
                <a href="department.php">
                    <i class='bx bxs-school'></i>
                    <span class="link_name">Department</span>
                </a>
               <span class="tooltip">Department</span>
            </li>
            <li>
                <a href="add-task.php">
                    <i class='bx bx-plus'></i>
                    <span class="link_name">Add</span>
                </a>
                <span class="tooltip">Add</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
               <span class="tooltip">Setting</span>
            </li>
            <li>
                <a href="../modules/logout.php">
                    <i class='bx bx-power-off'></i>
                    <span class="link_name">Log out</span>
                </a>
                <span class="tooltip">Log out</span>
            </li>
        </ul>

        <!------ just Optional Design 
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details"></div>
              <---- <img src="./assets/test1.jpg" class="img-fluid sukunaPic" alt=""
                <div class="name_job">
                    <div class="name">User 1</div>
                    <div class="job">Technician</div>
                </div>
            </div>
        </div>
        ------------------------------------------->
        
    </div>

    <div class="add_content">
        <div class="text">Department</div>
        
    </div> 

    <!-----------------Search Bar ADD EMPLOYEE----------->
    <div class="container">
        <div class="search-box">
            <input type="text" class="search" placeholder="what are you looking for?"/>
            <button type="submit" class="search-btn">
                <i class='bx bx-search-alt-2'></i>
            </button>
        </div>
    </div>


    <!------------Button Add Employe----------->
    <a href="edit-department.php" class="button1">Add Department </a>


    <!---------Container Employee------------->
    <div class="employee-container">
        <div class="row"> <!--Container-->
            <div class="col-lg-3 col-sm-12">
                <div class="jumbotron card2">
                    <div class="image1">
                        <img src="../assets/img/test1.jpg" alt="people" class="img-fluid rounded-circle  image2">
                    </div>
                    <div class="info">
                        <h4>Department Name </h4>
                        <p>Desc</p>
                        <a href="edit-department.php" class="button3">Edit</a>
                    </div>
                </div>
              <!-- Code goes here -->
            </div>        

        </div>
    
    </div>

 

   

    <script src="../assets/js/main.js">
    </script>
</body>
</html>
