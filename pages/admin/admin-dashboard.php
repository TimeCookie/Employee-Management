
<?php
// code author : Andre Jonathan Harahap (2031095)
session_start();
include '../../modules/db_connect.php';

if (!isset($_SESSION['adminId'])) {

    header("location: ../admin-login.php?status=unauthorized");

}

$readQuery = "SELECT COUNT(employee_id) AS num_of_employee FROM employee";
$res = mysqli_query($con, $readQuery);
$res = mysqli_fetch_assoc($res);

$totalEmployee = $res['num_of_employee'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
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
        <div class="text">Welcome, Admin</div>
        
    </div> 


    <!---------Container header------------->
    <div class="card">
        <div class="image">
            <img src=""class="img-fluid rounded-circle w-50 mb-3">
        </div>
        <div class="Title">
            <?php echo "<h4>$totalEmployee</h4>"; ?>
        </div>
        <div class="Title1">
            <h4>Employees</h4>
        </div>
    </div>
  <!---------Container JOB------------->
    <div class="Day">
        <div class="text3"> Today </div>
    </div> 
    <div class="job-container1">
        <div class="row"> <!--Container-->
        <?php 
        $readQuery = "SELECT project_id,project_title, pic_id, employee_name FROM project p JOIN employee em ON p.pic_id = em.employee_id LIMIT 5";
        $res = mysqli_query($con,$readQuery);

        if(mysqli_num_rows($res) > 0) {
            while($data = mysqli_fetch_assoc($res)) {
                $projectId = $data['project_id'];
                $projectTitle = $data['project_title'];
                $picName = $data['employee_name'];
        ?>
        <!-- Front-end only -->
            <div class="col-lg-12 col-sm-12">
                <div class="jumbotron job2">
                    <div class="info2">
                        <h4><?php echo "<a href='edit-task.php?task=$projectId'>$projectTitle</a>" ?></h4>
                        <p><?php echo $picName; ?></p>
                    </div>
                </div>
            </div>
        <!-- Front-end only -->
        <?php
            }
        }
        ?>

        </div>
    </div>


    <!---------Employee Report------------->

    <div class="absence-container">

        <div class="row"> <!--Container-->
        <?php
        $readQuery = "SELECT * FROM shift WHERE report_status=1";
        $res = mysqli_query($con,$readQuery);

        if(mysqli_num_rows($res) == 0) {
            // Echo "no reports yet"
        }
        else {
            while($data = mysqli_fetch_assoc($res)) {
                $curId = $data['employee_id'];
                $statusMsg = "Not read"; //Default
                $statusCls = "not-read"; //Default
                switch ($data['report_status']) {
                    case 0:
                        $statusMsg = "Read";
                        $statusCls = "read";
                        break;
                    case 1:
                        $statusMsg = "Not Read";
                        $statusCls = "not-read";
                        break;
                }

                $readQuery1 = "SELECT employee_name FROM employee e JOIN shift s ON e.employee_id = s.employee_id WHERE e.employee_id=$curId";
                $res1 = mysqli_query($con,$readQuery1);
                $nameData = mysqli_fetch_assoc($res1);
                $name = $nameData['employee_name'];
        ?>
            <div class="col-lg-6 col-sm-12">
                <div class="jumbotron card1">
                    <div class="info">
                        <h4><?php echo "<a class='dynamic-link' href='report.php?emp=$curId'>$name</a>"; ?></h4>
                        <?php echo "<p class=$statusCls>$statusMsg</p>"; ?>
                    </div>
                </div>
            </div>
        <?php
            }
        }
        ?>
        </div>
    </div>

    <?php
    if(isset($_GET['status'])) {
        if($_GET['status'] == "delete-project-success") {

    ?>
    <div class="popup center">
        <div class="success-icon">
            <i class="bx bx-check"></i>
        </div>
        <div class="title">Success!</div>
        <div class="description">Project successfully deleted</div>
        <div class="dismiss-btn">
            <button id="dismiss-popup-btn"><a href="<?php echo "department.php"; ?>">Dismiss</a></button>
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
