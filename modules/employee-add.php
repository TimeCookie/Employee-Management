<?php
include 'db_connect.php';

$employeeId = 4001; // Default
// Takes the nearest available employee Id
$readQuery = "SELECT MAX(employee_id) AS current_id FROM employee";
$res = mysqli_query($con, $readQuery);

if(mysqli_num_rows($res) > 0) {
    $res = mysqli_fetch_assoc($res);
    $employeeId = $res['current_id'] + 1;
}
/*----IMAGE INSERTION----*/
$imgDir = "../assets/img-upload/";


// * Saves employee data
if(isset($_POST['save-confirm'])) {

    // * Saves employee photo
    if(isset($_FILES['upload-photo'])){
        header("Location: test-success.php");
        $err = array();

        $fileName = $employeeId . "-" . $_FILES['upload-photo']['name'];
        $fileSize = $_FILES['upload-photo']['size'];
        $fileTmp = $_FILES['upload-photo']['tmp_name'];
        $fileType = $_FILES['upload-photo']['type'];

        $extractExt = explode('.',$fileName);
        $fileExt = strtolower(end($extractExt));

        $ext = array("jpeg","jpg","png"); //supported file types

        if(in_array($fileExt,$ext) === false){
            $err[] = "Extension not allowed, please upload a JPEG or PNG file.";
            header("Location: ../pages/admin/add-employee.php?status=invalid");
        }
        
        if($fileSize > 2097152){
            $err[] = 'File size must not exceed 2 MB';
            header("Location: ../pages/admin/add-employee.php?status=invalid");
        }

        
        if(empty($err) == true){
            move_uploaded_file($fileTmp,"../assets/img-upload/".$fileName);
            $imgDir = "../assets/img-upload/" . $fileName;
            //header("Location: ../pages/admin/add-employee.php")
            //echo "Success";
        }
        else{
            print_r($err);
            header("Location: ../pages/admin/add-employee.php?status=invalid");
        }
        
    }
    else {
        $imgDir = null; // TODO: Perhaps can add a default picture later
    }


    // * Saves employee data

    $firstName = $_POST['first-name'];
    $dob = $_POST['birthday'];
    $gender = $_POST['gender-list'];
    $phoneNumber = $_POST['phone-number'];
    $lastName = $_POST['last-name'];
    $email = $_POST['email'];
    $divisionId = $_POST['department'];
    
    // Re-format    
    $employeeName = ucfirst(strtolower($firstName)) . " " . ucfirst(strtolower($lastName));

    $readQuery = "SELECT employee_id FROM employee WHERE employee_id='$employeeId'";
    $res = mysqli_query($con, $readQuery);

    // creates new data
    if(mysqli_num_rows($res) <= 0) {
        $createQuery = "INSERT INTO employee VALUES (?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $createQuery)) {
            header('Location: ../pages/admin/add-employee.php?status=invalid');
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, 'isssis',$employeeId, $employeeName, $gender, $dob, $divisionId, $imgDir);
            mysqli_stmt_execute($stmt);
        }
        mysqli_stmt_close($stmt);
        header("Location: ../pages/admin/add-employee.php?status=add-success");
    }

}




?>