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
        $sql2 = "DELETE FROM brands WHERE brand_id = '$brand_id'";
        $result2 = mysqli_query($connection, $sql2);
        if ($result && $result2) {
            header("location: index.php");
        } else {
            echo "Error deleting records: " . mysqli_error($connection);
        }
    }
}
