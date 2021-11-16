<?php
if(isset($_FILES['upload-photo'])){
    $err = array();
    $fileName = $_FILES['upload-photo']['name'];
    $fileSize = $_FILES['upload-photo']['size'];
    $fileTmp = $_FILES['upload-photo']['tmp_name'];
    $fileType = $_FILES['upload-photo']['type'];

    $extractExt = explode('.',$fileName);
    $fileExt = strtolower(end($extractExt));

    $ext = array("jpeg","jpg","png"); //supported file types

    if(in_array($fileExt,$ext) === false){
        $err[] = "Extension not allowed, please upload a JPEG or PNG file.";
    }

    if($fileSize > 2097152){
        $err[] = 'File size must not exceed 2 MB';
    }

    
    if(empty($err) == true){
        move_uploaded_file($fileTmp,"../assets/img-upload/".$fileName);
        //header("Location: ../pages/admin/add-employee.php")
        //echo "Success";
    }
    else{
        print_r($err);
    }
}

?>