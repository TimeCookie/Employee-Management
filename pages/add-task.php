<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Task</title>
    <link rel="stylesheet" href="../assets/css/add_Task.css">
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
                <a href="dashboard.php">
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
        <div class="text">Add Task</div>
        <h4>Task Information</h4>
        
    </div> 

   <div class="title1">
       <div class="text1">Task Name</div>
       <div class="form_div">
           <input type="text" class="form_input" placeholder="Task Name">
       </div>
       <div class="text2">Task type</div>
       <div class="form_div1">
            <input type="text1" class="form_input1" placeholder="Task type">
       </div>
       <div class="text3">Person In Charge</div>
       <div class="form_div2">
            <input type="text2" class="form_input2" placeholder="Person In Charge">
       </div>
       <div class="text4">Department</div>
       <div class="form_div3">
            <input type="text3" class="form_input3" placeholder="Department">
       </div>
       <div class="text5">Employee#1</div>
       <div class="form_div4">
            <input type="text4" class="form_input4" placeholder="Employee Name">
       </div>
       <div class="text6">Employee#2</div>
       <div class="form_div5">
            <input type="text5" class="form_input5" placeholder="Employee Name">
       </div>
       <div class="text7">Employee#3</div>
       <div class="form_div6">
            <input type="text6" class="form_input6" placeholder="Employee Name">
       </div>
    </div>

   </div>
  

 <!------------Button Add TASK----------->
 <a href="#" class="button2">Add Task</a>

 

   

    <script src="../assets/js/main.js">
    </script>
</body>
</html>