<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EMPLOYEES</title>
    <link rel="stylesheet" href="css/employee.css">
</head>
<body>
<a href="logout.php">Kijelentkezés</a>
<h2>Megrendelések</h2>
<div class="table_wrapper">
    <table class="table" cellspacing="0">
        <tbody>
        <thead>
        <tr>
            <th>ORDER_ID</th>
            <th>Megrendelő</th>
            <th>Autó típusa</th>
            <th>Model</th>
            <th>Gyártási év</th>
            <th>Megrendelés ideje</th>
            <th>Megrendelés napja</th>
            <th>Ár</th>
            <th>Elfogadom</th>
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
                <td><a href="order_accept.php?order='.$data['order_id'].'" class="accept-button">Elfogadom</a></td>

            </tr>';
        }
        ?>
        <tbody>
    </table>
</div>
<h2>Befejezett megrendelések</h2>
<div class="table_wrapper">
    <table class="table" cellspacing="0">
        <tbody>
        <thead>
        <tr>
            <th>COMP_ORDER_ID</th>
            <th>ORDER_ID</th>
            <th>CUSTOMER_ID</th>
            <th>CAR_ID</th>
            <th>ORDER DATE</th>
            <th>PRICE</th>
            <th>DESCRIPTION</th>
            <th>INSERT DESCRIPTION</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $connection = "";
        require 'db_config.php';
        $sql_completed_order = "SELECT * FROM completed_orders";
        $result_completed_order = mysqli_query($connection, $sql_completed_order);

        while ($data2 = mysqli_fetch_assoc($result_completed_order)) {
            echo '
                    <tr>
                        <td>'.$data2['comp_order_id'].'</td>
                        <td>'.$data2['order_id'].'</td>
                        <td>'.$data2['customer_id'].'</td>
                        <td>'.$data2['car_id'].'</td>
                        <td>'.$data2['order_date'].'</td>
                        <td>'.$data2['price'].'</td>
                        <td>'.$data2['description'].'</td>
                        <td><a href="description.php?comp_order_id='.$data2['comp_order_id'].'" class="accept-button">Leírás</a></td>
                    </tr>';
        }
        ?>
        <tbody>
    </table>
</div>
</body>
</html>