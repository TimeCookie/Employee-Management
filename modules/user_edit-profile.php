<?php
include 'db_connect.php';


if(isset($_POST['edit-confirm'])) {

    
    // *User changes password
    $userId = $_POST['employee-id'];
    $userPassword = $_POST['password'];
    $hashPass = password_hash($userPassword, PASSWORD_DEFAULT);
    
    if(!empty($userPassword)) {
        $readQuery = "SELECT * FROM user_employee WHERE employee_id = $userId";
        $res = mysqli_query($con,$readQuery);
        if(mysqli_num_rows($res) <= 0) {
            $createQuery = "INSERT INTO user_employee VALUES ($userId, '$hashPass')";
            mysqli_query($con,$createQuery);
        
        }
        else {
            $updateQuery = "UPDATE user_employee SET password = '$hashPass' WHERE employee_id = $userId";
            mysqli_query($con,$updateQuery);
        
        }

    }
    $imgDir = "";
    // * Saves employee photo
    if(isset($_FILES['upload-photo'])){
        
        $err = array();

        
        $fileName = $userId . "-" . $_FILES['upload-photo']['name'];
        $fileSize = $_FILES['upload-photo']['size'];
        $fileTmp = $_FILES['upload-photo']['tmp_name'];
        $fileType = $_FILES['upload-photo']['type'];

        $extractExt = explode('.',$fileName);
        $fileExt = strtolower(end($extractExt));

        $ext = array("jpeg","jpg","png"); //supported file types

        if(in_array($fileExt,$ext) === false){
            $err[] = "Extension not allowed, please upload a JPEG or PNG file.";
            header("Location: ../pages/user/edit-profile.php?status=invalid");
        }
        
        if($fileSize > 2097152){
            $err[] = 'File size must not exceed 2 MB';
            header("Location: ../pages/user/edit-profile.php?status=invalid");
        }

        
        if(empty($err) == true){
            move_uploaded_file($fileTmp,"../assets/img-upload/".$fileName);
            $imgDir = "../assets/img-upload/" . $fileName;
            //header("Location: ../pages/admin/add-employee.php")
            //echo "Success";
        }
        else{
            print_r($err);
            header("Location: ../pages/user/edit-profile.php?status=invalid");
        }
        
    }
    else {
        $imgDir = null; // TODO: Perhaps can add a default picture later
    }




    // *Saves employee data
    $userEmail = $_POST['email'];
    $phoneNumber = $_POST['phone-number'];
    
    if($imgDir == null) {

        $updateQuery = "UPDATE employee SET employee_email = ?, employee_phone_no = ? WHERE employee_id = ?";

        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $updateQuery)) {
            header('Location: ../pages/user/edit-profile.php?status=invalid');
            die;
        }
        else {
            mysqli_stmt_bind_param($stmt, "ssi", $userEmail, $phoneNumber, $userId);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);

            header('Location: ../pages/user/edit-profile.php?status=success');
            
        }
    }
    else {
        $updateQuery = "UPDATE employee SET employee_photo = ?, employee_email = ?, employee_phone_no = ? WHERE employee_id = ?";

        $stmt = mysqli_stmt_init($con);
        if(!mysqli_stmt_prepare($stmt, $updateQuery)) {
            header('Location: ../pages/user/edit-profile.php?status=invalid');
            die;
        }
        else {
            mysqli_stmt_bind_param($stmt, "sssi", $imgDir,$userEmail, $phoneNumber, $userId);
            mysqli_stmt_execute($stmt);

            mysqli_stmt_close($stmt);

            header('Location: ../pages/user/edit-profile.php?status=success');
            
        }

    }
    
    

}

?>