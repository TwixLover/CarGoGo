<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

if(isset($_GET['customer'])){
    $customer_id = $_GET['customer'];
    $sql = "DELETE FROM customers WHERE customer_id = '$customer_id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location: admin.php");
    } else {
        echo "Error deleting records: " . mysqli_error($connection);
    }
}