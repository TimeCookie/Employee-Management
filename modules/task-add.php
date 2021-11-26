<?php
include 'db_connect.php';

if(isset($_POST['confirm-add-task'])) {
    $projectId = 0;
    $projectTitle = $_POST['project-title'];
    $projectDesc = $_POST['project-desc'];
    $personInCharge = $_POST['person-in-charge'];
    $divisionId = $_POST['division-name'];
    $employee1 = $_POST['employee-1'];
    $employee2 = $_POST['employee-2'];
    $employee3 = $_POST['employee-3'];

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
        
        $createQuery = "INSERT INTO Shift VALUES ($personInCharge,$projectId, NULL,NULL), ($employee1, $projectId, NULL,NULL),($employee2, $projectId, NULL,NULL),($employee3, $projectId, NULL,NULL)";
        mysqli_query($con, $createQuery);
        header("Location: ../pages/admin/add-task.php?status=success");
    }
    
    // Adds employee to project
    

}

?>