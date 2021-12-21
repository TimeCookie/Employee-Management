<?php
include 'db_connect.php';


if(isset($_POST['save-data'])) {
    $empid = $_POST['employee-id'];
   if(isset($_FILES['upload-photo'])){
        $err = array();
        $empid = $_POST['employee-id'];
        $fileName = $empid . "-" . $_FILES['upload-photo']['name'];
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


    //*  For default photo
    if($imgDir == "") {

		$readQuery = "SELECT employee_photo FROM Employee WHERE employee_id=$empid";
		$res = mysqli_query($con,$readQuery);

		if(mysqli_num_rows($res) == 0) {
			if($imgDir == "") {
				$imgDir = "../assets/img/user-icon.jpg";
			}
		}
		else {
			$data = mysqli_fetch_assoc($res);
			$imgDir = $data['employee_photo'];
		}
	}
    


    $empid = $_POST['employee-id'];
    $empName = $_POST['employee-name'];
    $empGen = $_POST['gender-list'];
    $empDob = $_POST['date-of-birth'];
    $empDiv = $_POST['division-list'];
    $empEmail = $_POST['email-address'];
    $empPhone = $_POST['phone-number'];
    $additionalInfo = $_POST['additional-report'];

    $QueryUpdate = "UPDATE employee SET employee_id=?, employee_name=?, employee_email=?, employee_phone_no=?, sex=?, date_of_birth=?, division_id=?, employee_photo=?, additional_info=? WHERE employee_id=$empid";
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $QueryUpdate)) {
        header("Location: ../pages/admin/edit-profile.php?employ=".$empid."&status=invalid");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "isssssiss", $empid,$empName,$empEmail,$empPhone,$empGen,$empDob,$empDiv,$imgDir, $additionalInfo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../pages/admin/edit-profile.php?employ=".$empid."&status=success");
       
    }
    
}
elseif(isset($_POST['delete-employee'])) {
    $empid = $_POST['employee-id'];

    // Remove from shift
    $deleteQuery = "DELETE FROM shift WHERE employee_id=$empid";
    mysqli_query($con,$deleteQuery);

    // Remove from user_employee
    $deleteQuery = "DELETE FROM user_employee WHERE username=$empid";
    mysqli_query($con,$deleteQuery);

    // Updates project PIC
    $updateQuery = "UPDATE project SET pic_id=0 WHERE pic_id=$empid";
    mysqli_query($con,$updateQuery);

    // Remove employee data
    $Queryfordelete = "DELETE FROM employee WHERE employee_id=$empid";
    mysqli_query($con,$Queryfordelete);

    // Remove related photos from server
    
    header("Location: ../pages/admin/employee.php?status=delete-success");
}

?>