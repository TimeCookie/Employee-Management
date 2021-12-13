<?php
include 'db_connect.php';


if(isset($_POST['confirm-delete-task'])) {
    $projectId = $_POST['project-id'];
    
    // Delete all employees from shift
    $deleteQuery = "DELETE FROM shift WHERE project_id=$projectId";
    mysqli_query($con,$deleteQuery);

    // Delete project
    $deleteQuery = "DELETE FROM project WHERE project_id=$projectId";
    mysqli_query($con,$deleteQuery);

    header("Location: ../pages/admin/admin-dashboard.php?status=delete-project-success");

}


?>