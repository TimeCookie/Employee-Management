<?php
include 'db_connect.php';

// *Auto re-fill department id

$readQuery = "SELECT MAX(department_id) AS current_department_id FROM department";
$res = mysqli_query($con, $readQuery);

$departmentId = 2001; // *Default if empty
if(mysqli_num_rows($res) > 0) {
    $res = mysqli_fetch_assoc($res);
    $departmentId = $res['current_department_id'] + 1;
}


// *Insert new department data
if(isset($_POST['save-confirm'])) {
    $departmentName = $_POST['department-name'];
    $departmentLocation = $_POST['department-location'];
    $division = $_POST['division'];

    // *Reformatting
    $departmentName = ucfirst(strtolower($departmentName));
    $departmentLocation = ucfirst(strtolower($departmentLocation));
    
    $createQuery = "INSERT INTO department VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$createQuery)) {
        header("Location: ../pages/admin/add-department.php?status=invalid");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt,'iss',$departmentId,$departmentName,$departmentLocation);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../pages/admin/add-department.php?status=success");
    }
}

?>