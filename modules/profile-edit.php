<?php
include 'db_connect.php';

if(isset($_POST['save-data'])) {
$empid = $_POST['employee-id'];
    $empName = $_POST['employee-name'];
    $empGen = $_POST['gender'];
    $empDob = $_POST['date-of-birth'];
    $empDiv = $_POST['division'];
    $empEmail = $_POST['email-address'];
    $empPhone = $_POST['phone-number'];

    $QueryUpdate = "UPDATE employee SET employee_id=?, employee_name=?, employee_email=?, employee_phone_no=?, sex=?, date_of_birth=?, division_id=? WHERE employee_id=$empid";
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $QueryUpdate)) {
        header("Location: ../pages/admin/edit-profile.php?employ=".$empid."&status=invalid");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "isssssi", $empid,$empName,$empEmail,$empPhone,$empGen,$empDob,$empDiv);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../pages/admin/edit-profile.php?employ=".$empid."&status=success");
       
    }
    
}

?>