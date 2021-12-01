<?php
include 'db_connect.php';

if(isset($_POST['report-confirm'])) {
    $employeeId = $_POST['employee-id'];
    $report = $_POST['report'];

    // TODO: Function to check if the user has answered or not (must be session independent)
    $updateQuery = "UPDATE shift SET employee_report=? WHERE employee_id=?";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$updateQuery)) {
        header("Location: ../pages/user/task-report.php?status=failed");
        die;
    }
    else {
        mysqli_stmt_bind_param($stmt, 'si', $report, $employeeId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../pages/user/task-report.php?status=success");
    }
}

?>