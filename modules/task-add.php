<?php
include 'db_connect.php';
include_once 'functions.php';

if(isset($_POST['confirm-add-task'])) {
    $projectId = 0;
    $projectTitle = $_POST['project-title'];
    $projectDesc = $_POST['project-desc'];
    $personInCharge = $_POST['pic'];
    $divisionId = $_POST['division'];
    $employee1 = (empty($_POST['employee-1'])) ? NULL : $_POST['employee-1'];
    $employee2 = (empty($_POST['employee-2'])) ? NULL : $_POST['employee-2'];
    $employee3 = (empty($_POST['employee-3'])) ? NULL : $_POST['employee-3'];


    $personInCharge = ($personInCharge == NULL) ? NULL : getId($personInCharge,'-');
    $employee1 = ($employee1 == NULL) ? NULL : getId($employee1,'-');
    $employee2 = ($employee2 == NULL) ? NULL : getId($employee2,'-');
    $employee3 = ($employee3 == NULL) ? NULL : getId($employee3,'-');
    $divisionId = ($divisionId == NULL) ? NULL : getId($divisionId,'-');

    $readQuery = "SELECT MAX(project_id) AS project_id FROM Project";
    $result = mysqli_query($con, $readQuery);

    if(mysqli_num_rows($result) > 0) {
        $result = mysqli_fetch_assoc($result);
        $projectId = $result['project_id'] + 1;
    } else {
        $projectId = 1001;
    }

    // Adds new project
    $createQuery = "INSERT INTO Project VALUES (?,?,?,?,?);";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt, $createQuery)) {
        header("Location: ../pages/admin/add-task.php?status=invalid");
        exit();
    } else {        
        mysqli_stmt_bind_param($stmt,'issii', $projectId, $projectTitle, $projectDesc, $personInCharge, $divisionId);
        mysqli_stmt_execute($stmt);
        
        // Adds employee to project
        $createQuery = "INSERT INTO Shift VALUES ($personInCharge,$projectId, NULL,NULL, 'Work report for today',NULL)";
        mysqli_query($con, $createQuery);
        if($employee1 != NULL){
            $createQuery = "INSERT INTO Shift VALUES ($employee1, $projectId, NULL,NULL,'Work report for today',NULL)";
            mysqli_query($con, $createQuery);
        }
        
        if($employee2 != NULL){
            $createQuery = "INSERT INTO Shift VALUES ($employee2, $projectId, NULL,NULL,'Work report for today',NULL)";
            mysqli_query($con, $createQuery);
            
        }
        
        if($employee3 != NULL){
            $createQuery = "INSERT INTO Shift VALUES ($employee3, $projectId, NULL,NULL,'Work report for today',NULL)";
            mysqli_query($con, $createQuery);
        }
        header("Location: ../pages/admin/add-task.php?status=success");
    }
    
    
    

}

/*
($employee1, $projectId, NULL,NULL),
($employee2, $projectId, NULL,NULL),
($employee3, $projectId, NULL,NULL)
*/

?>

