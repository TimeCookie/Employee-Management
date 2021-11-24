<?php
session_start();
include '../../modules/db_connect.php';

$departmentId = 0;

if(isset($_GET['dept'])) {
    $departmentId = $_GET['dept'];
}

$readQuery = "SELECT * FROM department WHERE department_id = $departmentId";
$res = mysqli_query($con, $readQuery);
if(mysqli_num_rows($res) > 0) {
    $res = mysqli_fetch_assoc($res);
}
$departmentName = $res['department_name'];
$departmentLocation = $res['department_location'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Department</title>
    <link rel="stylesheet" href="../../assets/css/edit_department.css">
    <link rel="stylesheet" href="../../assets/css/popup.css">
    <!-----ini Box icon ------>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
</head>
<body>

    <!----------Sidebar---------->
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

    <div class="task_content">
        <div class="text">Add Department</div>  
        
    </div> 

   <div class="title1">
       <form action="../../modules/department-edit.php" method="POST">
        <div class="text1">Department ID</div>
        <div class="form_div">
            <?php echo "<input type='text' class='form_input' name='department-id' placeholder='Department ID' value='$departmentId'>"; ?>     
        </div>
        <div class="text2">Department Name</div>
        <div class="form_div">
            <?php echo "<input type='text' class='form_input1' name='department-name' placeholder='Department Name' value='$departmentName'>"; ?>
        </div>
        <div class="text3">Department Location</div>
        <div class="form_div">
            <?php echo "<input type='text' class='form_input2' name='department-location' placeholder='Department Location' value='$departmentLocation'>"; ?>
        </div>
        <div class="text4">Division</div>
        <div class="form_div">
            <input type="text" class="form_input3" name="division" placeholder="Division">
        </div>

            <input type="submit" class="button2" name="save-confirm" value="Save">

       </form>
       
   </div>
  

 <!------------Feedback popup---->
    <?php
        if(isset($_GET['status'])) {

        
            if($_GET['status'] == "success") {
        
    ?>
    <div class="popup center">
        <div class="success-icon">
            <i class="bx bx-check"></i>
        </div>
        <div class="title">Success!</div>
        <div class="description">Department successfully added</div>
        <div class="dismiss-btn">
            <button id="dismiss-popup-btn"><a href="<?php echo "edit-department.php?dept=$departmentId"; ?>">Dismiss</a></button>
        </div>
    </div>
    
        
    <?php
        }

        elseif($_GET['status'] == "invalid") {  
    
    ?>
        <div class="popup center">
            <div class="fail-icon">
                <i class="bx bx-x"></i>
            </div>
            <div class="title">Failed!</div>
            <div class="description">Error, please check your data.</div>
            <div class="dismiss-btn">
                <button id="dismiss-popup-btn"><a class="dismiss" href="<?php echo "edit-department.php?dept=$departmentId"; ?>">Dismiss</a></button>
            </div>
        </div>
   
        
    <?php
        } 
    }
    ?>

 

   

    <script src="../../assets/js/main.js">
    </script>
</body>
</html>
