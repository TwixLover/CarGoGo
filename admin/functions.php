<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

if(isset($_GET['delete'])){
    $car_id = $_GET['delete'];
    $sql_brand_id = "SELECT brand_id FROM cars WHERE car_id = '$car_id'";
    $result_brand_id = mysqli_query($connection, $sql_brand_id);
    if ($result_brand_id) {
        $row = mysqli_fetch_assoc($result_brand_id);
        $brand_id = $row['brand_id'];
        $sql = "DELETE FROM cars WHERE car_id = '$car_id'";
        $result = mysqli_query($connection, $sql);
        if ($result) {
            header("location: admin.php");
        } else {
            echo "Error deleting records: " . mysqli_error($connection);
        }
    }
}
