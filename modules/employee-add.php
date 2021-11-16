<?php
include 'db_connect.php';

if(isset($_POST['save-confirm'])) {
    $firstName = $_POST['first-name'];
    $dob = $_POST['date-of-birth'];
    $gender = $_POST['gender'];
    $phoneNumber = $_POST['phone-number'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $divisionId = $_POST['department'];
    $employeeId = $_POST['employee-id'];
    //$employeePhoto = $_POST['employee_photo'];

    $employeeName = ucfirst($firstName) . " " . ucfirst($lastName);

    $readQuery = "SELECT employee_id FROM employee WHERE employee_id='$employeeId'";
    $res = mysqli_query($con, $readQuery);

    // overwrites existing data
    if(mysqli_num_rows($res) > 0) {
        $updateQuery = "UPDATE employee SET employee_name=?, sex=? ,date_of_birth=?, division_id=? WHERE employee_id=?";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $updateQuery)) {
            header('Location: ../pages/admin/add-employee.php?=invalid-code-1');
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt,'sssii',$employeeName,$gender,$dob,$divisionId,$employeeId);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        header("Location: ../pages/admin/add-employee.php?=edit-succeses.php");
    }
    // creates new data
    else if(mysqli_num_rows($res) <= 0) {
        $createQuery = "INSERT INTO employee VALUES (?,?,?,?,?,NULL)";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $createQuery)) {
            header('Location: ../pages/admin/add-employee.php?=invalid-code-2');
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, 'isssi',$employeeId, $employeeName, $gender, $dob, $divisionId);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        header("Location: ../pages/admin/add-employee.php?=add-success.php");
    }

}

?>