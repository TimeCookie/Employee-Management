<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Task</title>
    <link rel="stylesheet" href="../../assets/css/add-task.css">
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
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="link_name">Setting</span>
                </a>
               <span class="tooltip">Setting</span>
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
        <div class="text">Add Task</div>
        <h4>Task Information</h4>
        
    </div> 

   <div class="title1">
       <div class="text1">Task Name</div>
       <form action="../../modules/task-add.php" method="POST">
            <div class="form_div">
                <input type="text" name="project-title" class="form_input" placeholder="Task Name">
            </div>
            <div class="text2">Task Description</div>
            <div class="form_div1">
                <input type="text" name="project-type" class="form_input1" placeholder="Task Description">
            </div>
            <div class="text3">Person In Charge</div>
            <div class="form_div2">
                <input type="text" name="person-in-charge" class="form_input2" placeholder="Person In Charge">
            </div>
            <div class="text4">Division</div>
            <div class="form_div3">
                <input type="text" name="division-name" class="form_input3" placeholder="Division">
            </div>
            <div class="text5">Employee 1</div>
            <div class="form_div4">
                <input type="text" name="employee-1" class="form_input4" placeholder="Employee Name">
            </div>
            <div class="text6">Employee 2</div>
            <div class="form_div5">
                <input type="text" name="employee-2" class="form_input5" placeholder="Employee Name">
            </div>
            <div class="text7">Employee 3</div>
            <div class="form_div6">
                <input type="text" name="employee-3" class="form_input6" placeholder="Employee Name">
            </div>
            <input type="submit" name="confirm-add-task" class="button2" value="Add Task"/>
       </form>
       
    </div>

   </div>
  

    <script src="../../assets/js/main.js">
    </script>
</body>
</html>
