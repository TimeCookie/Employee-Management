<?php
include '../../modules/db_connect.php';
//ketika ditekan

/*else {
echo 'The result is empty';
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department</title>
    <link rel="stylesheet" href="../../assets/css/employee.css">
    <!-----ini Box icon ------>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="logo_name">MagentaCorp</div>
            </div>
            <i class='bx bx-menu'id="btn"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="admin-dashboard.php">
                    <i class='bx bx-home'></i>
                    <span class="link_name">Home</span>
                </a>
               <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="employee.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">Employee</span>
                </a>
               <span class="tooltip">Employee</span>
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
                <a href="../../modules/logout.php">
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
        <form action="department.php" method="POST">
            <input type="text" class="search" name="typing" placeholder="what are you looking for?"/>
            <button type="submit" name="searching" class="search-btn" > 
                <i class='bx bx-search'></i>
            </button>

        </form>    
        </div>
    </div>
    


    <!------------Button Add Employe----------->
    <a href="edit-department.php" class="button1">Add Department</a>


    <!---------Container Department------------->
    <div class="employee-container">
        <div class="row"> <!--Container-->
        <?php
        
        if(isset($_POST["searching"])) {

            $searchRes = mysqli_real_escape_string($con, $_POST['typing']);
            if($searchRes!='') {

            $query ="SELECT department_name,department_id FROM department dep WHERE dep.department_name LIKE '%$searchRes%'";

            $result = mysqli_query($con,$query);
   
    
            if(mysqli_num_rows($result) > 0){
                while($rows = mysqli_fetch_assoc($result)) { 
                                 
        ?>
            <div class="col-lg-4 col-sm-12">
                <div class="jumbotron card2">
                    <div class="image1">
                        <img src="../../assets/img/test1.jpg" class="img-fluid rounded-circle  image2">
                    </div>
                    <div class="info">
                        <h4><?php echo $rows['department_name'];?> </h4>
                        <p> <?php echo $rows['department_id'];?> </p>
                        <a href="#" class="button3">Edit Profile</a>
                    </div>
                </div>
            </div>
        <?php
                    }
                }
                else {
                    echo " ";
                }
            }
        }
        ?>
              <!-- Code goes here -->
            </div>        

        </div>
    
    </div>

 

   

    <script src="../../assets/js/main.js">
    </script>
</body>
</html>
