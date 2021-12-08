<?php
include 'db_connect.php';

if(isset($_POST['save-confirm'])) {

    $departmentId = $_POST['department-id'];
    $departmentName = $_POST['department-name'];
    $departmentLocation = $_POST['department-location'];
    $division = empty($_POST['division']) ? null : $_POST['division'];

    $divisionList = explode(", ", $division);

    $updateQuery = "UPDATE department SET department_id=?, department_name=?, department_location=? WHERE department_id=$departmentId";
    $stmt = mysqli_stmt_init($con);

    if(!mysqli_stmt_prepare($stmt, $updateQuery)) {
        header("Location: ../pages/admin/edit-department.php?dept=".$departmentId."&status=invalid");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "iss", $departmentId, $departmentName, $departmentLocation);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    $readQuery = "SELECT division_id, division_name FROM division WHERE department_id=$departmentId";
    $res = mysqli_query($con,$readQuery);

    if(mysqli_num_rows($res) > 0) {
        while($data = mysqli_fetch_assoc($res)) {
            $curDivName = $data['division_name'];
            $curDivId = $data['division_id'];

            // Delete all different instances
            if(!in_array($curDivName, $divisionList)) {
                $updateQuery = "UPDATE project SET division_id=null WHERE division_id=$curDivId";
                mysqli_query($con, $updateQuery);

                // Set all employee with that div id to null
                $updateQuery = "UPDATE employee SET division_id=null WHERE division_id=$curDivId";
                mysqli_query($con, $updateQuery);
                
                // Delete that division
                $deleteQuery = "DELETE FROM division WHERE division_id=$curDivId";
                mysqli_query($con, $deleteQuery);

                echo mysqli_error($con);

                for($a=0;$a<count($divisionList);$a++) {
                    if($divisionList[$a] == $curDivName) {
                        unset($divisionList[$a]);
                        $divisionList = array_values($divisionList);
                    }
                }

            }
            else {
                for($a=0;$a<count($divisionList);$a++) {
                    if($divisionList[$a] == $curDivName) {
                        unset($divisionList[$a]);
                        $divisionList = array_values($divisionList);
                    }
                }
            }
        }
        if(count($divisionList) > 0) {
            for($i=0;$i<count($divisionList);$i++) {
                $readQuery = "SELECT MAX(division_id) AS current_id FROM division";
                $res = mysqli_query($con, $readQuery);
                $curMaxDivId = mysqli_fetch_assoc($res);
                    
                $curAvailableId = $curMaxDivId['current_id'] + 1;
                $newDivName = $divisionList[$i];

                $createQuery = "INSERT INTO division VALUES ($curAvailableId, '$newDivName', $departmentId)";
                mysqli_query($con,$createQuery);
                echo mysqli_error($con);
            }
        }
        
        header("Location: ../pages/admin/edit-department.php?dept=".$departmentId."&status=success");
        
    }

    /*
    if(mysqli_num_rows($res) > 0) {
        while($data = mysqli_fetch_assoc($res)) {
            if(in_array($data['division_name'],$divisionList)) {
                for($i=0;$i<count($divisionList);$i++) {
                    if ($divisionList[$i] === $data['division_name']) {
                        unset($divisionList[$i]);
                        $divisionList = array_values($divisionList);
                    }
                }
            }
        }
        if(count($divisionList) > 0) {
            for($i=0;$i<count($divisionList);$i++) {
                $readQuery = "SELECT MAX(division_id) AS current_id FROM division";
                $res = mysqli_query($con, $readQuery);
                $curMaxId = mysqli_fetch_assoc($res);
                
                $curId = $curMaxId['current_id'] + 1;
                $curName = $divisionList[$i];

                $createQuery = "INSERT INTO division VALUES ($curId,'$curName',$departmentId)";
                mysqli_query($con, $createQuery);
                
            }
        }
        //header("Location: ../pages/admin/edit-department.php?dept=".$departmentId."&status=success");
    }
    */
    
}
elseif(isset($_POST['delete-confirm'])) {
    $departmentId = $_POST['department-id'];

    // Deletes all the divisions
    $readQuery = "SELECT * FROM division WHERE department_id=$departmentId";
    $res = mysqli_query($con, $readQuery);

    if(mysqli_num_rows($res) > 0) {
        $deleteQuery = "DELETE FROM division WHERE department_id=$departmentId";
        if(!mysqli_query($con,$deleteQuery)) {
            header("Location: ../pages/admin/department.php?status=failed");
            die;
        }
    }

    // Deletes said department
    $deleteQuery = "DELETE FROM department WHERE department_id=$departmentId";
    mysqli_query($con,$deleteQuery);
    
    header("Location: ../pages/admin/department.php?status=success");
}

?>