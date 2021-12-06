<?php
include 'db_connect.php';
include 'functions.php';

if(isset($_POST['confirm-add-task'])) {
    $projectId = $_POST['project-id'];
    $projectTitle = $_POST['project-title'];
    $projectDesc = $_POST['project-desc'];
    $projectPIC = $_POST['pic'];
    $projectDivision = ($_POST['division'] == '') ? NULL : $_POST['division'];
    $employee1 = ($_POST['employee-1'] == '') ? NULL : $_POST['employee-1'];
    $employee2 = ($_POST['employee-2'] == '') ? NULL : $_POST['employee-2'];
    $employee3 = ($_POST['employee-3'] == '') ? NULL : $_POST['employee-3'];

    // *Reformat
    $projectPIC = getId($projectPIC, '-');
    $projectDivision = getId($projectDivision, '-');
    $employee1 = getId($employee1, '-');
    $employee2 = getId($employee2, '-');
    $employee3 = getId($employee3, '-');


    $updateQuery = "UPDATE Project SET project_title=?, project_desc=?, pic_id=?, division_id=? WHERE project_id=?";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$updateQuery)) {
        header("Location: ../pages/admin/edit-task.php?task=$projectId&status=invalid");
        die;
    }
    else {
        mysqli_stmt_bind_param($stmt, 'ssiii',$projectTitle,$projectDesc,$projectPIC,$projectDivision,$projectId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../pages/admin/edit-task.php?task=$projectId&status=success");
    }

}
else if(isset($_POST['delete-task'])) {
    // Dependency: Shift
    $projectId = 1001; // ! Need solution: add Project ID input box into the form

    $readQuery = "SELECT * FROM shift WHERE project_id=$projectId";
    $res = mysqli_query($con, $readQuery);

    if(mysqli_num_rows($res) > 0) {
        header("Location: ../pages/admin/edit-task.php?task=$projectId&status=delete-failed");
        die;
    }
    else {
        $deleteQuery = "DELETE FROM project WHERE project_id=$projectId";
        header("Location: ../pages/admin/dashboard.php?status=delete-project-success");
        die;
    }

}

?>