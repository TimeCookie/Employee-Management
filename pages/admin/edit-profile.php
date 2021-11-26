

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../../assets/css/edit-profile.css">
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
                <a href="../../admin-dashboard.php">
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
        <h4>Employee Profile</h4>
        
    </div> 

   <div class="title1">
       <div class="text1">Employee Name</div>
       <div class="form_div">
           <input type="text" class="form_input" placeholder="Employee Name">
       </div>
       <div class="text2">Date of Birth</div>
       <div class="form_div1">
            <input type="text1" class="form_input1" placeholder="Date of Birth">
       </div>
       <div class="text3">Gender</div>
       <div class="form_div2">
            <input type="text2" class="form_input2" placeholder="Gender">
       </div>
       <div class="text4">Phone Number</div>
       <div class="form_div3">
            <input type="text3" class="form_input3" placeholder="Phone Number">
       </div>
       </div>
       <div class="text5">Email Address</div>
       <div class="form_div4">
            <input type="text5" class="form_input4" placeholder="Email Address">
       </div>
       <div class="text6">Department</div>
       <div class="form_div5">
            <input type="text6" class="form_input5" placeholder="Department">
       </div>
       <div class="text7">Employee Id</div>
       <div class="form_div6">
            <input type="text7" class="form_input6" placeholder="Employee Id" readonly>      
       </div>
       <input type="submit" class="button3" value="Delete">
    </div>

   </div>
 <!---------Upload Employee------------->
    <div class="add-employee-container">
        <div class="row"> <!--Container-->
            <div class="col-lg-3 col-sm-12">
                <div class="jumbotron card2">
                    <div class="image1">
                        <img src="../../assets/img/test1.jpg" alt="upload-photo-employee" class="img-fluid rounded-circle  image2">
                    </div>
                    <form action="../../modules/picture-receiver.php" method="POST" enctype="multipart/form-data">
                        <input type="file" name="upload-photo"/>
                        <div class="upload-photo">
                            <input type="submit" class="button-upload-photo" value="Upload Photo">
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>

 <!------------Button Add Employee---->
 <a href=""
 class="button2">Save </a>


 

   

    <script src="../assets/js/main.js">
    </script>
</body>
</html>
