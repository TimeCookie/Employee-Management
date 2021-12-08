<?php
include 'db_connect.php';

if(isset($_POST['report-confirm'])) {
    $employeeId = $_POST['employee-id'];
    $report = $_POST['report'];
    $time = $_POST['time'];
    $location = $_POST['location-list'];

    $sepTime = explode(' ', $time);
    $timeOut = date("Y-m-d") . " " . $sepTime[0];
    


    // TODO: Function to check if the user has answered or not (must be session independent)
    $updateQuery = "UPDATE shift SET time_out=?, employee_report=?, location=?, report_status=1 WHERE employee_id=?";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$updateQuery)) {
        header("Location: ../pages/user/task-report.php?status=failed");
        die;
    }
    else {
        mysqli_stmt_bind_param($stmt, 'sssi', $timeOut, $report, $location, $employeeId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../pages/user/task-report.php?status=success");
    }
}

?>