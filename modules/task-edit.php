<?php
include 'db_connect.php';
include 'functions.php';

if(isset($_POST['confirm-add-task'])) {
    $projectId = $_POST['project-id'];
    $projectTitle = $_POST['project-title'];
    $projectDesc = $_POST['project-desc'];
    $projectPIC = $_POST['pic'];
    $projectDivision = (empty($_POST['division'])) ? 'NULL' : $_POST['division'];
    $employee1 = (empty($_POST['employee-1'])) ? 'NULL' : $_POST['employee-1'];
    $employee2 = (empty($_POST['employee-2'])) ? 'NULL' : $_POST['employee-2'];
    $employee3 = (empty($_POST['employee-3'])) ? 'NULL' : $_POST['employee-3'];

    // *Reformat
    $projectPIC = (empty($projectPIC)) ? 'NULL' : getId($projectPIC, ' - ');
    $projectDivision = (empty($projectDivision)) ? 'NULL' : getId($projectDivision, ' - ');
    $employee1 = (empty($employee1)) ? 'NULL' : getId($employee1, ' - ');
    $employee2 = (empty($employee2)) ? 'NULL' : getId($employee2, ' - ');
    $employee3 = (empty($employee3)) ? 'NULL' : getId($employee3, ' - ');


    $newEmployeeLists = array();
    $newEmployeeLists[0] = $employee1;
    $newEmployeeLists[1] = $employee2;
    $newEmployeeLists[2] = $employee3;

    // Check for PIC changes
    
    $readQuery = "SELECT pic_id FROM project WHERE project_id=$projectId";
    $res = mysqli_query($con,$readQuery);
    
    if(mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
    }
    $currentPIC = $data['pic_id'];

    if($currentPIC != $projectPIC) {
        $deleteQuery = "DELETE FROM shift WHERE employee_id=$currentPIC AND project_id=$projectId";
        mysqli_query($con,$deleteQuery);

        $createQuery = "INSERT INTO shift VALUES($projectPIC,$projectId,NULL,NULL,'Work report for today',NULL,0)";
        mysqli_query($con,$createQuery);
    }
    else {
        $readQuery = "SELECT employee_id FROM shift WHERE employee_id=$projectPIC";
        $res = mysqli_query($con,$readQuery);
        if(mysqli_num_rows($res) == 0) {
            $createQuery = "INSERT INTO shift VALUES($projectPIC,$projectId,NULL,NULL,'Work report for today',NULL,0)";
            mysqli_query($con,$createQuery);
        }
    }
    
    // Check for employee changes
    
    $readQuery = "SELECT employee_id FROM shift WHERE project_id=$projectId";
    $res = mysqli_query($con,$readQuery);
    if(mysqli_num_rows($res) > 0) {
        $curEmp = array();
        $a = 0;
        while($data = mysqli_fetch_assoc($res)) {
            $curEmp[$a] = $data['employee_id'];
            $a++;
        }
        $diff = array_diff($curEmp, $newEmployeeLists);

        if(count($diff) > 0) {
            for($i = 0;$i<count($diff);$i++) {
                $tbd = $diff[$i];
                $deleteQuery = "DELETE FROM shift WHERE employee_id=$tbd";
                mysqli_query($con, $deleteQuery);

                if (($key = array_search($tbd, $newEmployeeLists)) !== false) {
                    unset($newEmployeeLists[$key]);
                }
            }
            for($i=0;$i<count($newEmployeeLists);$i++) {
                $tba = $newEmployeeLists[$i];
                $createQuery = "INSERT INTO shift VALUES($tba,$projectId,NULL,NULL,'Work report for today',NULL,0)";
                mysqli_query($con,$createQuery);
            }
        }
    }
    

    // Change project status
    $updateQuery = "UPDATE project SET project_title='$projectTitle', project_desc='$projectDesc', pic_id=$projectPIC, division_id=$projectDivision WHERE project_id=$projectId";
    
    if(!mysqli_query($con,$updateQuery)) {
        echo $updateQuery."<br>";
        echo $projectId."<br>";
        echo $projectTitle."<br>";
        echo $projectDesc."<br>";
        echo $projectPIC."<br>";
        echo $projectDivision."<br>";
        echo mysqli_error($con);
        //header("Location: ../pages/admin/edit-task.php?task=$projectId&status=invalid");
        //die;
    }
    else {
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