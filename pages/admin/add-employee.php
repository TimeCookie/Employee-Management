<?php
include '../../modules/employee-add.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="../../assets/css/add-employee.css">
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
        <div class="text">Add Employee</div>
        
    </div> 

   <div class="title1">
       <form action="../../modules/employee-add.php" method="POST" enctype="multipart/form-data">
            <div class="text1">First Name</div>
            <div class="form_div">
                <input type="text" name="first-name" class="form_input" placeholder="First Name">
            </div>
            <div class="text2">Date of Birth</div>
            <div class="form_div1">
                <input class = "form_input1" type = "date" id= "birthday" name= "birthday">
            </div>
            <div class="text3">Gender</div>
            <div class="form_div2">
                <div class ="form_input2">
                    <select name="gender-list">
                        <option value="Male">M&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>
                        <option value="Female">F&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>
                    </select>
                </div>
            </div>
            <div class="text4">Phone Number</div>
            <div class="form_div3">
                <input type="text" name="phone-number" class="form_input3" placeholder="Phone Number">
            </div>
            <div class="text5">Last Name</div>
            <div class="form_div4">
                <input type="text" name="last-name" class="form_input4" placeholder="Last Name">
            </div>
            <div class="text6">Email Address</div>
            <div class="form_div5">
                <input type="text" name="email" class="form_input5" placeholder="Email Address">
            </div>
            <div class="text7">Division</div>
            <div class="form_div6">
                <input type="text" name="department" class="form_input6" placeholder="Department">
            </div>
            <div class="text8">Employee Id</div>
            <div class="form_div7">
                <?php
                
                    echo "<input type='text' name='employee-id' class='form_input7' placeholder='Employee Id' value='$employeeId' readonly>";
                
                ?>
                      
            </div>


            <div class="add-employee-container">
                <div class="row"> <!--Container-->
                    <div class="col-lg-3 col-sm-12">
                        <div class="jumbotron card2">
                            <label class="preview-label">Image Preview</label>
                            <div class="image1">
                                <img src="../../assets/img/user-icon.jpg" onclick="triggerClick()" alt="upload-photo-employee" class="img-fluid rounded-circle image2" id="placeholder-image">
                            </div>
                        
                            <input type="file" id="employee-photo-input" onchange="previewImage(this)" name="upload-photo" style="display:none;"/>
                                <!--
                                <div class="upload-photo">
                                    <input type="submit" class="button-upload-photo" value="Upload Photo">
                                </div>-->
                        
                            
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" name="save-confirm" value="Save" class="button-save"/>
       </form>

    </div>

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
        <div class="description">Employee successfully added</div>
        <div class="dismiss-btn">
            <button id="dismiss-popup-btn"><a href="add-employee.php">Dismiss</a></button>
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
                <button id="dismiss-popup-btn"><a class="dismiss" href="add-employee.php">Dismiss</a></button>
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
