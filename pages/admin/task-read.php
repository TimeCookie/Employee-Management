
<?php
// code author : Andre Jonathan Harahap (2031095)
session_start();
include '../../modules/db_connect.php';

if(isset($_GET['emp'])) {
    $employeeId = $_GET['emp'];
} else {
    header("Location: admin-dashboard.php");
}
 

$readQuery = "SELECT * FROM shift WHERE employee_id=$employeeId";
$res = mysqli_query($con,$readQuery);

if(mysqli_num_rows($res) > 0) {
    $data = mysqli_fetch_assoc($res);
}
else {
    echo mysqli_error($con);
}

// Fetch shift data
$projectId = $data['project_id'];
$admissionTime = $data['admission_time'];
$timeOut = $data['time_out'];
$employeeReport = $data['employee_report'];
$location = $data['location'];
$reportStatus = $data['report_status'];

// Fetch employee name
$readQuery = "SELECT employee_name FROM employee e JOIN shift s ON e.employee_id = s.employee_id WHERE e.employee_id=$employeeId";
$res = mysqli_query($con, $readQuery);

if(mysqli_num_rows($res) > 0) {
    $data = mysqli_fetch_assoc($res);
} else {
    echo mysqli_error($con);
}

$employeeName = $data['employee_name'];


// Fetch project data
$readQuery = "SELECT project_title FROM project WHERE project_id=$projectId";
$res = mysqli_query($con, $readQuery);

if(mysqli_num_rows($res) > 0) {
    $data = mysqli_fetch_assoc($res);
} else {
    echo mysqli_error($con);
}

$project = $projectId . " - " . $data['project_title'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Read</title>
    <link rel="stylesheet" href="../../assets/css/task-read.css">
    <link rel="stylesheet" href="../../assets/css/popup.css">
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

    <div class="task_content">
        <div class="text">Task Read </div>
        <h4></h4>
        
    </div> 

   <div class="title1">
        <form action="../../modules/read-task.php" method="POST">
            <div class="text1">Admission Time </div>
            <div class="form_div">
                <?php echo "<input type='text' class = 'form_input' value='$admissionTime' name='admission-time' readonly>"; ?>
            </div>
            <div class="text2">Time Out </div>
            <div class="form_div">
                <?php echo "<input type='text' class='form_input1' name='time-out' value='$timeOut' placeholder='Time Out' readonly>"; ?>
            </div>
            <div class="text3">Employee ID</div>
            <div class="form_div">
                <?php echo "<input type='text' class='form_input2' name='employee-id' value='$employeeId' placeholder='Employee ID' readonly>"; ?>
            </div>
            <div class="text4">Report</div>
            <div class="form_div">
                <textarea name='report' class='form_input3' placeholder='Report'><?php echo $employeeReport; ?></textarea>"; ?>
            </div>
            <div class="text5">Employee Name</div>
            <div class="form_div">
                <?php echo "<input type='text' class='form_input4' name='employee-name' value='$employeeName' placeholder='Employee Name' readonly>"; ?>
            </div>
            <div class="text6">Project</div>
            <div class="form_div">
                <?php echo "<input type='text' class='form_input5' name='project' value='$project' placeholder='Project' readonly>"; ?>
            </div>
            <div class="text7">Location</div>
            <div class="form_div">
                <div class ="form_input6">
                    <select name="location-list">
                        <option value=""><?php echo $location;?></option>
                    </select>
                </div>
            </div>
            <input type="submit" class="button2" name="read" value="Mark As Read">
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
            <button id="dismiss-popup-btn"><a href="task-report.php">Dismiss</a></button>
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
                <button id="dismiss-popup-btn"><a class="dismiss" href="task-report.php">Dismiss</a></button>
            </div>
        </div>
   
        
    <?php
        } 
    }
    ?>

   

    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/clock.js"></script>
</body>
</html>
