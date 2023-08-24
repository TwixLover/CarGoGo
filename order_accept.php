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
    $employee_id_result = mysqli_query($connection, $employee_sql);
    $employee_data = mysqli_fetch_assoc($employee_id_result);
    $employee_id = $employee_data['employee_id'];

    $sql = 'INSERT INTO drivers (car_id, customer_id, employee_id, order_id) VALUES ("' . $car_id . '","' . $customer_id . '","' . $employee_id . '","' . $order_id . '")';
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $sql = "DELETE FROM orders WHERE order_id = '$order_id'";
        $result2 = mysqli_query($connection, $sql);

        if ($result2) {
            header("location: employee.php");
        } else {
            echo "Error deleting records: " . mysqli_error($connection);
        }
    } else {

    }
}