<?php
include 'db_connect.php';
include 'functions.php';

if(isset($_POST['report-confirm'])) {
    $employeeId = $_POST['employee-id'];
    $report = $_POST['report'];
    $time = $_POST['time'];
    $location = $_POST['location-list'];
    $project = $_POST['project-list'];

    $projectId = getId($project, " - ");

    $sepTime = explode(' ', $time);
    $timeOut = date("Y-m-d") . " " . $sepTime[0];
    


    // TODO: Function to check if the user has answered or not (must be session independent)
    $updateQuery = "UPDATE shift SET time_out=?, employee_report=?, location=?, report_status=1 WHERE employee_id=$employeeId AND project_id=$projectId";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$updateQuery)) {
        header("Location: ../pages/user/task-report.php?status=failed");
        die;
    }
    else {
        mysqli_stmt_bind_param($stmt, 'sss', $timeOut, $report, $location);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../pages/user/task-report.php?task=$projectId&status=success");
    }
}

?>