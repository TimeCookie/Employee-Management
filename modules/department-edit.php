<?php
include 'db_connect.php';

if(isset($_POST['save-confirm'])) {

    $departmentId = $_POST['department-id'];
    $departmentName = $_POST['department-name'];
    $departmentLocation = $_POST['department-location'];
    $division = $_POST['division'];

    $updateQuery = "UPDATE department SET department_id=?, department_name=?, department_location=? WHERE department_id=$departmentId";
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $updateQuery)) {
        header("Location: ../pages/admin/edit-department.php?dept=".$departmentId."&status=invalid");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "iss", $departmentId, $departmentName, $departmentLocation);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../pages/admin/edit-department.php?dept=".$departmentId."&status=success");
    }
    
}
elseif(isset($_POST['delete-confirm'])) {
    $departmentId = $_POST['department-id'];

    $deleteQuery = "DELETE FROM department WHERE department_id=$departmentId";
    mysqli_query($con,$deleteQuery);
    
    header("Location: ../pages/admin/department.php?status=delete-success");
}

?>