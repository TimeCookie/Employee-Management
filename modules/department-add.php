<?php
include 'db_connect.php';

// *Auto re-fill department id

$readQuery = "SELECT MAX(department_id) AS current_department_id FROM department";
$res = mysqli_query($con, $readQuery);

$departmentId = 2001; // *Default if empty
if(mysqli_num_rows($res) > 0) {
    $res = mysqli_fetch_assoc($res);
    $departmentId = $res['current_department_id'] + 1;
}


// *Insert new department data
if(isset($_POST['save-confirm'])) {
    $departmentName = $_POST['department-name'];
    $departmentLocation = $_POST['department-location'];
    $division = $_POST['division'];

    // *Reformatting
    $departmentName = ucfirst(strtolower($departmentName));
    $departmentLocation = ucfirst(strtolower($departmentLocation));
    $divisionList = explode(",", $division);

    // Department
    $createQuery = "INSERT INTO department VALUES (?,?,?)";
    $stmt = mysqli_stmt_init($con);
    if(!mysqli_stmt_prepare($stmt,$createQuery)) {
        header("Location: ../pages/admin/add-department.php?status=invalid");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt,'iss',$departmentId,$departmentName,$departmentLocation);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    
    // Division arrangement
    $index = 0;
    while($index < count($divisionList)) {
        $readQuery = "SELECT MAX(division_id) AS current_id FROM division";
        $res = mysqli_query($con, $readQuery);
        $curMaxId = mysqli_fetch_assoc($res);
        
        $curId = $curMaxId['current_id'] + 1;
        $curName = $divisionList[$index];

        $createQuery = "INSERT INTO division VALUES($curId, '$curName', $departmentId)";
        mysqli_query($con, $createQuery);

        echo mysqli_error($con);

        $index++;
    }
    header("Location: ../pages/admin/add-department.php?status=success");
    
    
}

?>