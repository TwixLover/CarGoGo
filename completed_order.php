<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

if(isset($_GET['order'])) {
    $order_id = $_GET['order'];
    $sql = "SELECT * FROM orders o JOIN customers cu ON o.customer_id = cu.customer_id JOIN cars ca ON o.car_id = ca.car_id WHERE o.order_id = '$order_id'";
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    $data = mysqli_fetch_assoc($result);

    $customer_id = $data['customer_id'];
    $car_id = $data['car_id'];
    $order_date = $data['order_date'];
    $price = $data['price'];

    $sql2 = 'INSERT INTO completed_orders (order_id, customer_id, car_id, order_date, price) VALUES ("' . $order_id . '","' . $customer_id . '","' . $car_id . '","' . $order_date . '","' . $price . '")';
    $result2 = mysqli_query($connection, $sql2) or die(mysqli_error($connection));

    if($result2) {
        $sql3 = "DELETE FROM orders WHERE order_id = '$order_id'";
        $result3 = mysqli_query($connection, $sql3);
        header("location: logged_index.php");
    }
}