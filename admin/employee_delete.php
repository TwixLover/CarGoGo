<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

if(isset($_GET['employee'])){
    $employee_id = $_GET['employee'];
    $sql = "DELETE FROM employees WHERE employee_id = '$employee_id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location: admin.php");
    } else {
        echo "Error deleting records: " . mysqli_error($connection);
    }
}