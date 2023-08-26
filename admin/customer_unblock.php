<?php
$connection = "";
require 'db_config.php';

if (isset($_GET['customer'])) {
    $customer_id = $_GET['customer'];
    $blockQuery = "UPDATE customers SET is_blocked = 0 WHERE customer_id = '$customer_id'";
    mysqli_query($connection, $blockQuery);
}
header("Location: admin.php");
?>