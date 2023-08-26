<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

if(isset($_GET['order'])){
    $order_id = $_GET['order'];
    $sql = "DELETE FROM orders WHERE order_id = '$order_id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location: admin.php");
    } else {
        echo "Error deleting records: " . mysqli_error($connection);
    }
}