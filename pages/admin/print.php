<?php

if(isset($_POST['print-data'])) {

    $imgDir = "";
    if(isset($_FILES['upload-photo'])){
        $err = array();

        $employeeId = $_POST['employee-id'];


        $fileName = $employeeId . "-" . $_FILES['upload-photo']['name'];
        $fileSize = $_FILES['upload-photo']['size'];
        $fileTmp = $_FILES['upload-photo']['tmp_name'];
        $fileType = $_FILES['upload-photo']['type'];

        $extractExt = explode('.',$fileName);
        $fileExt = strtolower(end($extractExt));

        $ext = array("jpeg","jpg","png"); //supported file types

        if(in_array($fileExt,$ext) === false){
            $err[] = "Extension not allowed, please upload a JPEG or PNG file.";
            header("Location: ../pages/admin/edit-employee.php?status=invalid");
        }
        
        if($fileSize > 2097152){
            $err[] = 'File size must not exceed 2 MB';
            header("Location: ../pages/admin/edit-employee.php?status=invalid");
        }
        

        
        if(empty($err) == true){
            move_uploaded_file($fileTmp,"../../assets/img-upload/".$fileName);
            $imgDir = "../assets/img-upload/" . $fileName;
            //header("Location: ../pages/admin/add-employee.php")
            //echo "Success";
        }
        else{
            print_r($err);
            header("Location: ../pages/admin/e-employee.php?status=invalid");
        }

        
    }
    if($imgDir == "") {
        $imgDir = "../../assets/img/user-icon.jpg";
    }


    $divisionId = $_POST['division'];
    $email = $_POST['email-address'];
    $phoneNo = $_POST['phone-number'];
    $gender = $_POST['gender'];
    $dob = $_POST['date-of-birth'];
    $employeeName = $_POST['employee-name'];

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <?php
        echo "<img style='width:100px; height:100px' src='../$imgDir'/>";
        echo "<p>Nama: $employeeName</p>";
        echo "<p>Tanggal Lahir : $dob</p>";
        echo "<p>Jenis Kelamin: $gender</p>";
        echo "<p>No. Telp: $phoneNo</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Divisi: $divisionId</p>";
        echo "<p>EmployeeId: $employeeId</p>";
        ?>
    </div>
</body>
</html>