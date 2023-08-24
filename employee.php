<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>ORDERS</h2>
<div class="table_wrapper">
    <table class="table" cellspacing="0">
        <tbody>
        <thead>
        <tr>
            <th>ORDER_ID</th>
            <th>USERNAME</th>
            <th>BRAND</th>
            <th>MODEL</th>
            <th>PRODUCTION YEAR</th>
            <th>ORDER TIME</th>
            <th>ORDER DATE</th>
            <th>PRICE</th>
            <th>ACCEPT</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $connection = "";
        $sql = "";
        $result = "";
        require 'db_config.php';

        session_start();

        $username = '';
        if (isset($_SESSION['login_employee'])) {
            $username = $_SESSION['login_employee'];
        } else {
            header("location: login.php");
        }

        $sql = "SELECT * FROM orders o JOIN customers cu ON o.customer_id = cu.customer_id JOIN cars ca ON o.car_id = ca.car_id JOIN brands b ON ca.brand_id = b.brand_id WHERE o.driver = 1";
        $result = mysqli_query($connection, $sql);
        while ($data = mysqli_fetch_assoc($result)) {
            echo '
            <tr>
                <td>'.$data['order_id'].'</td>
                <td>'.$data['username'].'</td>
                <td>'.$data['brand'].'</td>
                <td>'.$data['model'].'</td>
                <td>'.$data['prod_year'].'</td>
                <td>'.$data['order_time'].'</td>
                <td>'.$data['order_date'].'</td>
                <td>'.$data['price'].'</td>
                <td><a href="order_accept.php?order='.$data['order_id'].'">ACCEPT</td>
            </tr>';
        }
        ?>
        <tbody>
    </table>
</div>
</body>
</html>