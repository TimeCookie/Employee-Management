<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Report</title>
    <link rel="stylesheet" href="../../assets/css/task-report.css">
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
                    <i class='bx bx-home'></i>
                    <span class="link_name">Home</span>
                </a>
               <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="">
                    <i class='bx bx-user'></i>
                    <span class="link_name">User</span>
                </a>
               <span class="tooltip">User</span>
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
       <div class="text1">Clock</div>
       <div class="form_div">
           <input type="text" class = "form_input">
           <script>
                var today = new Date();
                var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                document.getElementById("currentTime").value = time;
            </script>
       </div>
       <div class="text2">Employee ID</div>
       <div class="form_div">
           <input type="text" class="form_input1" placeholder="Employee ID">
       </div>
       <div class="text3">Employee Name</div>
       <div class="form_div">
           <input type="text" class="form_input2" placeholder="Employee Name"> 
       </div>
       <div class="text4">Report</div>
       <div class="form_div">
           <textarea name="taskreport" class="form_input3" placeholder="Report"></textarea> 
       </div>
       <div class="text5">Division</div>
       <div class="form_div">
           <input type="text" class="form_input4" placeholder="Division"> 
       </div>

   </div>
  

 <!------------Button Add Department---->
 <a href=""
 class="button2">Save </a>

 

   

    <script src="../../assets/js/main.js">
    </script>
</body>
</html>
