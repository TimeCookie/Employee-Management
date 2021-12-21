<?php
include '../../modules/db_connect.php';
session_start();

if(!isset($_SESSION['userId'])) {
    header("Location: ../user-login.php?status=unauthorized");
    die;
}

if(!isset($_GET['task'])) {
    header("Location: ../user-login.php?status=unauthorized");
    die;
}
else {
    $projectId = $_GET['task'];
}


$employeeId = $_SESSION['userId'];

$readQuery = "SELECT employee_name, division_name FROM employee e JOIN division d ON e.division_id = d.division_id WHERE employee_id=$employeeId";
$res = mysqli_query($con, $readQuery);

if(mysqli_num_rows($res) > 0) {
    $data = mysqli_fetch_assoc($res);
}

$employeeName = $data['employee_name'];
$divisionName = $data['division_name'];


$readQuery = "SELECT * FROM shift WHERE employee_id=$employeeId AND project_id=$projectId";
$res = mysqli_query($con,$readQuery);
$report = "";

if(mysqli_num_rows($res) == 0) {
    header("Location: edit-profile.php?status=unauthorized");
} else {
    $data = mysqli_fetch_assoc($res);
    $report = $data['employee_report'];
    $location = $data['location'];
}

$projectList = array();

$readQuery = "SELECT s.project_id,p.project_title FROM shift s JOIN project p ON s.project_id = p.project_id WHERE employee_id=$employeeId";
$res = mysqli_query($con,$readQuery);

if(mysqli_num_rows($res) > 0) {
    $i = 0;
    while($data = mysqli_fetch_assoc($res)) {
        $projectList[$i] = $data['project_id'] . " - " . $data['project_title'];
        $i++;
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Report</title>
    <link rel="stylesheet" href="../../assets/css/task-report.css">
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
                <a href="edit-profile.php">
                    <i class='bx bx-user'></i>
                    <span class="link_name">User</span>
                </a>
               <span class="tooltip">User</span>
            </li>
            <li>
                <?php echo "<a href='task-report.php?task=$projectId'>"; ?>
                    <i class='bx bxs-report'></i>
                    <span class="link_name">Task Report</span>
                </a>
               <span class="tooltip">Task Report</span>
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
        <div class="text">Task Report</div>
        <h4></h4>
        
    </div> 

   <div class="title1">
        <form action="../../modules/report-task.php" method="POST">
            <div class="text1">Clock</div>
            <div class="form_div">
                <input type="text" class = "form_input" id="clock" name="time" readonly>
            </div>
            <div class="text2">Employee ID</div>
            <div class="form_div">
                <?php echo "<input type='text' class='form_input1' name='employee-id' value='$employeeId' placeholder='Employee ID' readonly>"; ?>
            </div>
            <div class="text3">Employee Name</div>
            <div class="form_div">
                <?php echo "<input type='text' class='form_input2' name='employee-name' value='$employeeName' placeholder='Employee Name' readonly>"; ?>
            </div>
            <div class="text4">Report</div>
            <div class="form_div">
                <?php echo "<textarea name='report' class='form_input3' placeholder='Report'>$report</textarea>"; ?>
            </div>
            <div class="text5">Division</div>
            <div class="form_div">
                <?php echo "<input type='text' class='form_input4' name='division' value='$divisionName' placeholder='Division' readonly>"; ?>
            </div>
            <div class="text7">Project</div>
            <div class="form_div">
                <div class ="form_input6">
                    <select name="project-list" id="project" onchange="redirect()">
                        <?php
                            $readQuery = "SELECT project_title FROM project WHERE project_id=$projectId";
                            $res = mysqli_query($con,$readQuery);
                            $data = mysqli_fetch_assoc($res);
                            $projectTitle = $data['project_title'];

                            echo "<option value='$projectId'>$projectId - $projectTitle</option>";
                        ?>
                        <?php 
                            foreach($projectList as $el) {
                                echo "<option value='$el'>$el</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="text6">Location</div>
            <div class="form_div">
                <div class ="form_input5">
                    <select name="location-list">
                        <?php echo"<option>$location</option>"; ?>
                        <option value="Office">Office</option>
                        <option value="Meeting Room">Meeting Room</option>
                        <option value="Canteen">Canteen</option>
                    </select>
                </div>
            </div>
            <input type="submit" class="button2" name="report-confirm" value="Submit">
        </form>
   </div>
  


<!-- Popup Feedback -->
    <?php
        if(isset($_GET['status'])) {

        
            if($_GET['status'] == "success") {
        
    ?>
    <div class="popup center">
        <div class="success-icon">
            <i class="bx bx-check"></i>
        </div>
        <div class="title">Success!</div>
        <div class="description">Report submitted</div>
        <div class="dismiss-btn">
            <button id="dismiss-popup-btn"><a href="<?php echo "task-report.php?task=$projectId"; ?>">Dismiss</a></button>
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
                <button id="dismiss-popup-btn"><a class="dismiss" href="<?php echo "task-report.php?task=$projectId"; ?>">Dismiss</a></button>
            </div>
        </div>
   
        
    <?php
        } 
    }
    ?>

   

    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/clock.js"></script>
    <script>
        var projectDropdown = document.getElementById("project");

        function redirect() {
            var selectedProject = projectDropdown.value;
            var projectId = selectedProject.split(" - ");
            projectId = projectId[0];

            window.location.href = "task-report.php?task=" + String(projectId);
        }
        
    </script>
</body>
</html>
