<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="../../assets/css/add-employee.css">
    <!-----ini Box icon ------>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    
</head>
<body>

    <!----------Sidebar---------->
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <div class="logo_name">Manajemen karyawan</div>
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

    <div class="task_content">
        <div class="text">Add Employee</div>
        <h4>Add Employee</h4>
        
    </div> 

   <div class="title1">
       <div class="text1">First Name</div>
       <div class="form_div">
           <input type="text" class="form_input" placeholder="First Name">
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
       <div class="text5">Last Name</div>
       <div class="form_div4">
            <input type="text4" class="form_input4" placeholder="Last Name">
       </div>
       <div class="text6">Email Address</div>
       <div class="form_div5">
            <input type="text5" class="form_input5" placeholder="Email Address">
       </div>
       <div class="text7">Department</div>
       <div class="form_div6">
            <input type="text6" class="form_input6" placeholder="Department">
       </div>
       <div class="text8">Employee Id</div>
       <div class="form_div7">
            <input type="text7" class="form_input7" placeholder="Employee Id">      
       </div>

    </div>

   </div>
  <!---------Upload Employee------------->
    <div class="add-employee-container">
        <div class="row"> <!--Container-->
            <div class="col-lg-3 col-sm-12">
                <div class="jumbotron card2">
                    <div class="image1">
                        <img src="" alt="upload-photo-employee" class="img-fluid rounded-circle  image2">
                    </div>
                    <div class="upload-photo">
                        <a href="" class="button-upload-photo">Upload Photo</a>
                    </div>
                </div>

 <!------------Button Add Employee---->
 <a href=""
 class="button-save">Save </a>

 

   

    <script src="../assets/js/main.js">
    </script>
</body>
</html>
