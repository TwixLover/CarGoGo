<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

if(isset($_GET['drive'])){
    $drive_id = $_GET['drive'];
    $sql = "DELETE FROM drivers WHERE drive_id = '$drive_id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location: admin.php");
    } else {
        echo "Error deleting records: " . mysqli_error($connection);
    }
}