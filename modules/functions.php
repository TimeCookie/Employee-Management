<?php
include 'db_connect.php';


/*

$tableName = The table to take the data from
$firstColumn = The column for ID (employee id, dept id, etc)
$secondColumn = The column for name

*/
function dropdownFormat($con, $tableName, $idColumn, $nameColumn) {
    $res = array();

    $readQuery = "SELECT * FROM $tableName;";
    $rows = mysqli_query($con, $readQuery);

    if(mysqli_num_rows($rows) > 0) {
        $i = 0;
        while($data = mysqli_fetch_assoc($rows)) {
            $res[$i] = "";
            $res[$i] .= $data[$idColumn];
            $res[$i] .= " - ";
            $res[$i] .= $data[$nameColumn];
            $i++;
        }
    }
    return $res;
}

function getId($s, $sep) {
    $separated = explode($sep, $s);
    $id = $separated[0];
    return $id;
}

function getName($foreignIDTable, $primaryNameTable, $foreignIDColumn, $primaryNameColumn, $id) {

    $readQuery = "SELECT $primaryNameColumn FROM $primaryNameTable p JOIN $foreignIDTable f ON f.$foreignIDColumn = p.$primaryNameTable WHERE $foreignIDColumn = $id";
    $res = mysqli_query($con,$readQuery);
    // SELECT employee_name

    if(mysqli_num_rows($res) > 0) {
        $data = mysqli_fetch_assoc($res);
    }

    return $data[$primaryNameColumn];


}
?>