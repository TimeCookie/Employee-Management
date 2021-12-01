<?php
include 'db_connect.php';


/*

$tableName = The table to take the data from
$firstColumn = The column for ID (employee id, dept id, etc)
$secondColumn = The column for name

*/
function dropdownFormat($con, $tableName, $firstColumn, $secondColumn) {
    $res = array();

    $readQuery = "SELECT * FROM ". $tableName .";";
    $rows = mysqli_query($con, $readQuery);

    if(mysqli_num_rows($rows) > 0) {
        $i = 0;
        while($data = mysqli_fetch_assoc($rows)) {
            $res[$i] = "";
            $res[$i] .= $data[$firstColumn];
            $res[$i] .= " - ";
            $res[$i] .= $data[$secondColumn];
            $i++;
        }
    }

    

    return $res;
}

// !To be deleted once working
/*
Output schema

$res[0] = "3001 - IT"
$res[1] = "3002 - Finance"
...
*/
?>