<?php
session_start();
include '../../modules/db_connect.php';

$empid = 0;

if(isset($_GET['employ'])) {
    $empid = $_GET['employ'];
}
echo $empid;
$readQuery = "SELECT * FROM employee WHERE employee_id = $empid";

$res = mysqli_query($con, $readQuery);
if(mysqli_num_rows($res) > 0) {
    $res = mysqli_fetch_assoc($res);    
}
$empName = $res['employee_name'];
$empGen = $res['sex'];
$empDob = $res['date_of_birth'];
$empDiv = $res['division_id'];
$empPic = $res['employee_photo'];
$empEmail = $res['employee_email'];
$empPhone = $res['employee_phone_no'];
$additionalInfo = $res['additional_info'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../../assets/css/edit-profile.css">
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

    <div class="task_content">
        <div class="text">Edit Profile</div>
        
    </div> 

   <div class="title1">
        <form action="../../modules/profile-edit.php" method="POST" enctype="multipart/form-data" >
            <div class="text1">Employee Name</div>
            <div class="form_div">
                <?php echo"<input type='text' class='form_input' name='employee-name' placeholder=''Employee Name' value='$empName'>"; ?>
            </div>
            <div class="text2">Date of Birth</div>
            <div class="form_div1">
                <?php echo"<input type='date' class='form_input1' name='date-of-birth' placeholder='Date Of Birth' value='$empDob'>"; ?>
            </div>
            <div class="text3">Gender</div>
            <div class="form_div2">
                <?php echo"<input type='text' class='form_input2' name='gender' placeholder='Gender' value='$empGen'>"; ?>
            </div>
            <div class="text4">Phone Number</div>
            <div class="form_div3">
                <?php echo"<input type='text' class='form_input3' name='phone-number' placeholder='Phone Number' value='$empPhone'>"; ?> 
            </div>
            <div class="text5">Email Address</div>
            <div class="form_div4">
                <?php echo"<input type='text' class='form_input4' name='email-address' placeholder='Email Address' value='$empEmail'>"; ?>
            </div>
            <div class="text6">Division</div>
            <div class="form_div5">
                <?php echo"<input type='text' class='form_input5' name='division' placeholder='Division' value='$empDiv'>"; ?>
            </div>
            <div class="text7">Employee Id</div>
            <div class="form_div6">
                <?php echo"<input type='text' class='form_input6' name='employee-id' placeholder='Employee Id' value='$empid' readonly>"; ?>
            </div>
            <div class="text9">Additional Information</div>
            <div class="form_div8">
                <?php echo "<textarea name='additional-report' class='form_input8' placeholder='Write down your additional report'>$additionalInfo</textarea>" ?>
            </div>


            <div class="add-employee-container">
                <div class="row"> <!--Container-->
                    <div class="col-lg-3 col-sm-12">
                        <div class="jumbotron card2">
                            <label class="preview-label">Image Preview</label>
                            <div class="image1">
                                <?php echo "<img src='../$empPic' onclick='triggerClick()' class='img-fluid rounded-circle image2' id='placeholder-image'>" ?>
                            </div>
                        
                            <input type="file" id="employee-photo-input" onchange="previewImage(this)" name="input-photo" style="display:none;"/>
                                <!--
                                <div class="upload-photo">
                                    <input type="submit" class="button-upload-photo" value="Upload Photo">
                                </div>-->
                        
                            
                        </div>
                    </div>
                </div>
            </div>



            <input type="submit" class="button2" name="save-data" value="Save">
            
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
        <div class="description"> Employee successfully updated</div>
        <div class="dismiss-btn">
            <button id="dismiss-popup-btn"><a href="<?php echo "edit-profile.php?employ=$empid"; ?>">Dismiss</a></button>
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
                <button id="dismiss-popup-btn"><a class="dismiss" href="<?php echo "edit-profile.php?employ=$empid"; ?>">Dismiss</a></button>
            </div>
        </div>
   
        
    <?php
        } 
    }
    ?> 

 



   

    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/employee-photo.js"></script>
</body>
</html>