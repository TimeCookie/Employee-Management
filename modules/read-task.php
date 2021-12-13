<?php

include 'db_connect.php';

if(isset($_POST['read'])) {
    $employeeId = $_POST['employee-id'];

    $updateQuery = "UPDATE shift SET employee_report = '', report_status=0, admission_time='',time_out='',location='' WHERE employee_id=$employeeId";
    mysqli_query($con,$updateQuery);

    header("Location: ../pages/admin/admin-dashboard.php");
}

?>