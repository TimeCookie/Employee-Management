<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="../../assets/css/edit-task.css">
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
        <div class="text">Edit Task</div>
        
    </div> 

   <div class="title1">
       <div class="text1">Task Name</div>
       <form action="../../modules/task-add.php" method="POST">
            <div class="form_div">
                <input type="text" name="project-title" class="form_input" placeholder="Task Name">
            </div>
            <div class="text2">Task Description</div>
            <div class="form_div1">
                <textarea name="project-desc" class="form_input1" placeholder="Task Description"></textarea>
            </div>
            <div class="text3">Person In Charge</div>
            <div class="form_div2">
                <div class ="form_input2">
                    <select name="pic">
                        <option value="picid"></option>
                        <option value="picid">4001-Marvin</option>
                        <option value="picid">4002-Andre</option>
                        <option value="picid">4003-Bryan</option>
                        <option value="picid">4004-Pangestu</option>
                    </select>
                </div>
            </div>
            <div class="text4">Division</div>
            <div class="form_div3">
                <div class ="form_input3">
                    <select name="division">
                        <option value="divisionid"></option>
                        <option value="divisionid">3001-IT</option>
                        <option value="divisionid">3002-Finance</option>
                    </select>
                </div>
            </div>
            <div class="text5">Employee 1</div>
            <div class="form_div4">
                <div class ="form_input4">
                    <select name="Employee">
                        <option value="employeeid"></option>
                        <option value="employeeid">4001-Marvin</option>
                        <option value="employeeid">4002-Andre</option>
                        <option value="employeeid">4003-Bryan</option>
                        <option value="employeeid">4004-Pangestu</option>
                    </select>
                </div>
            </div>
            <div class="text6">Employee 2</div>
            <div class="form_div5">
                <div class ="form_input5">
                    <select name="Employee1">
                        <option value="employeeid"></option>
                        <option value="employeeid">4001-Marvin</option>
                        <option value="employeeid">4002-Andre</option>
                        <option value="employeeid">4003-Bryan</option>
                        <option value="employeeid">4004-Pangestu</option>
                    </select>
                </div>
            </div>
            <div class="text7">Employee 3</div>
            <div class="form_div6">
                <div class ="form_input6">
                    <select name="Employee2">
                        <option value="employeeid"></option>
                        <option value="employeeid">4001-Marvin</option>
                        <option value="employeeid">4002-Andre</option>
                        <option value="employeeid">4003-Bryan</option>
                        <option value="employeeid">4004-Pangestu</option>
                    </select>
                </div>
            </div>
      
            <input type="submit" name="confirm-add-task" class="button2" value="Save Changes"/>
            <input type="delete" name="delete-task" class="button3" value="Delete Task"/>
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
            <button id="dismiss-popup-btn"><a href="add-task.php">Dismiss</a></button>
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
                <button id="dismiss-popup-btn"><a class="dismiss" href="add-task.php">Dismiss</a></button>
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
