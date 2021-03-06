<?php
session_start();

include '../../modules/db_connect.php';

if(!isset($_SESSION['userId'])) {
    header("Location: ../user-login.php?status=unauthorized");
}

$userId = $_SESSION['userId'];

$readQuery = "SELECT * FROM employee WHERE employee_id = $userId";
$res = mysqli_query($con,$readQuery);

if(mysqli_num_rows($res) <= 0) {
    header("Location: ../user-login.php?status=reauthorize");
}
else {
    $data = mysqli_fetch_assoc($res);
}

$employeeName = $data['employee_name'];
$employeeGender = $data['sex'];
$employeeDob = $data['date_of_birth'];
$divisionId = $data['division_id'];
$employeePhoto = $data['employee_photo'];
$employeeEmail = $data['employee_email'];
$employeePhone = $data['employee_phone_no'];
$employeePhoto = "../".$data['employee_photo'];

$readQuery = "SELECT project_id FROM shift WHERE employee_id=$userId LIMIT 1";
$res = mysqli_query($con, $readQuery);

if(mysqli_num_rows($res) > 0) {
    $data = mysqli_fetch_assoc($res);
}

$projectId = $data['project_id'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../../assets/css/edit-profile-user.css">
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
                <a href="">
                    <i class='bx bx-user'></i>
                    <span class="link_name">User</span>
                </a>
               <span class="tooltip">User</span>
            </li>
            <li>
                <a href="<?php echo "task-report.php?task=$projectId"; ?>">
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
        <div class="text">Edit Profile</div>
        
    </div> 

   <div class="title1">
    <form id="prof-edit" action="../../modules/user_edit-profile.php" method="POST" enctype="multipart/form-data">
        <div class="text1">Employee Name</div>
        <div class="form_div">
            <?php echo "<input type='text' class='form_input' name='employee-name' value='$employeeName' readonly>"; ?>
        </div>
        <div class="text2">Date of Birth</div>
        <div class="form_div1">
            <?php echo "<input type='text' class='form_input1' name='date-of-birth' value='$employeeDob' readonly>"; ?>
        </div>
        <div class="text3">Gender</div>
        <div class="form_div2">
            <?php echo "<input type='text' class='form_input2' name='gender-list' value='$employeeGender' readonly>"; ?>
        </div>
        <div class="text4">Phone Number</div>
        <div class="form_div3">
            <?php echo "<input type='text' class='form_input3' name='phone-number' placeholder='Phone Number' value='$employeePhone'>"; ?>
        </div>
        <div class="text5">Email Address</div>
        <div class="form_div4">
            <?php echo "<input type='text' class='form_input4' name='email-address' placeholder='Email Address' value='$employeeEmail'>"; ?>
        </div>
        <div class="text6">Division</div>
        <div class="form_div5">
            <?php echo "<input type='text' class='form_input5' name='division-list' value='$divisionId' readonly>"; ?>
        </div>
        <div class="text7">Employee Id</div>
        <div class="form_div6">
            <?php echo "<input type='text' name='employee-id' class='form_input6' value='$userId' readonly>"; ?>
        </div>
        <div class="text8">Password</div>
        <div class="form_div7">
            <input type="password" class="form_input7" name="password" placeholder="Password">      
        </div>

        <div class="add-employee-container">
                <div class="row"> <!--Container-->
                    <div class="col-lg-3 col-sm-12">
                        <div class="jumbotron card2">
                            <label class="preview-label">Image Preview</label>
                            <div class="image1">
                                <?php echo "<img src='$employeePhoto' onclick='triggerClick()' class='img-fluid rounded-circle image2' id='placeholder-image'>" ?>
                                <?php echo "<input type='hidden' name='current-photo' value='$employeePhoto'>"; ?>
                            </div>
                        
                            <input type="file" id="employee-photo-input" onchange="previewImage(this)" name="upload-photo" style="display:none"/>
                                <!--
                                <div class="upload-photo">
                                    <input type="submit" class="button-upload-photo" value="Upload Photo">
                                </div>-->
                        
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <input type="submit" value="Save" name="edit-confirm" class="button2">
    </form>
    <input type="submit" id="btn-print" class="button4" onclick="formRoute()" name="print" value="Print"/>

   </div>
 <!---------Feedback popup------------->
    <?php
        if(isset($_GET['status'])) {

        
            if($_GET['status'] == "success") {
        
    ?>
    <div class="popup center">
        <div class="success-icon">
            <i class="bx bx-check"></i>
        </div>
        <div class="title">Success!</div>
        <div class="description">Data successfully updated</div>
        <div class="dismiss-btn">
            <button id="dismiss-popup-btn"><a href="edit-profile.php">Dismiss</a></button>
        </div>
    </div>
    
        
    <?php
        }

        elseif($_GET['status'] == "unauthorized") {  
    
    ?>
        <div class="popup center">
            <div class="fail-icon">
                <i class="bx bx-x"></i>
            </div>
            <div class="title">Failed!</div>
            <div class="description">Couldn't fetch data, please join a project first before you can report your work.</div>
            <div class="dismiss-btn">
                <button id="dismiss-popup-btn"><a class="dismiss" href="edit-profile.php">Dismiss</a></button>
            </div>
        </div>
   
        
    <?php
        } 
    }
    ?>
 


 

   

    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/employee-photo.js"></script>
    <script>
        function formRoute() {
            var btn = document.getElementById("btn-print");
            var form = document.getElementById("prof-edit");

            btn.addEventListener('click', () => {
                form.action = "../print-template.php";
                form.submit();

                return false;
            })
        }
    </script>
</body>
</html>
