<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

session_start();

if(isset($_GET['order'])){
    $order_id = $_GET['order'];

    $sql = "SELECT * FROM orders o JOIN customers cu ON o.customer_id = cu.customer_id JOIN cars ca ON o.car_id = ca.car_id WHERE o.order_id = $order_id";
    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);
    $car_id = $data['car_id'];
    $customer_id = $data['customer_id'];
    $employee_username = $_SESSION['login_employee'];
    $employee_sql = "SELECT employee_id FROM employees WHERE username = '$employee_username'";
    $employee_result = mysqli_query($connection, $employee_sql);
    $employee_id = mysqli_fetch_assoc($employee_result);

    $sql = 'INSERT INTO drivers (car_id, customer_id, employee_id, order_id) VALUES ("' . $car_id . '","' . $customer_id . '","' . $employee_id . '","' . $order_id . '")';
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header("location: employee.php");
    } else {

    }
}