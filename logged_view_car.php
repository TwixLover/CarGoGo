<!DOCTYPE html>
<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Autó Foglalás</h1>
    <form method="POST">
        <?php
        $connection = "";
        $sql = "";
        $result = "";
        require 'db_config.php';

        if (isset($_GET['car_id'])) {
            $car_id = $_GET['car_id'];
            $sql = "SELECT * FROM brands b JOIN cars c ON b.brand_id = c.brand_id WHERE c.car_id = '$car_id'";
            $result = mysqli_query($connection, $sql);
            while ($data = mysqli_fetch_assoc($result)) {
                $_SESSION['brand_id'] = $data['brand_id'];
                $_SESSION['car_id'] = $data['car_id'];
                $picture = $data['pic_name'];
                echo "<img src='images/cars/$picture' width='300px'><br>";
                echo '
                            <tr>
                                <td>Autó: '.$data['brand'].'</td>
                                <td>'.$data['model'].'</td>
                                <td>'.$data['prod_year'].'</td>
                                <br>
                                <td>Ülések száma: '.$data['seats'].'</td>
                                <br>
                                <td>Hengerűrtartalom: '.$data['engine_size'].'</td>
                                <br>
                                <td>Üzemanyag: '.$data['fuel_type'].'</td>
                                <br>
                                <td>Váltó típusa: '.$data['trans_type'].'</td>
                            </tr>';
            }
        }
        ?>
        <label for="time">Kölcsönzési idő:</label>
        <input type="radio" name="order_time" value="12" checked> 12 óra
        <input type="radio" name="order_time" value="24"> 24 óra
        <input type="radio" name="order_time" value="36"> 36 óra
        <input type="radio" name="order_time" value="48"> 48 óra
        <br>
        <label for="date">Dátum:</label>
        <input type="date" name="order_date" required>
        <br>
        <input type="submit" value="Foglalás elküldése">
    </form>
    <?php
    $connection = "";
    $sql = "";
    $result = "";
    require 'db_config.php';

    $username = '';
    if (isset($_SESSION['login_customer'])) {
        $username = $_SESSION['login_customer'];
    } else {
        header("location: login.php");
    }

    $customer_id = '';
    $sql = "SELECT customer_id FROM customers WHERE username = '$username'";
    $result = mysqli_query($connection,$sql);
    while ($data = mysqli_fetch_assoc($result)) {
        $customer_id = $data['customer_id'];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $car_id = $_SESSION['car_id'];
        $order_time = $_POST['order_time'];
        $order_date = $_POST['order_date'];

        $check_query = "SELECT * FROM orders WHERE car_id = '$car_id' AND order_date = '$order_date'";
        $check_result = mysqli_query($connection, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            echo "<script>alert('Válasszon másik dátumot, ez a dátum már foglalt erre az autóra!')</script>";
        } else {
            // Insert the new order into the database
            $insert_query = "INSERT INTO orders (customer_id, car_id, order_time, order_date) VALUES ('$customer_id', '$car_id', '$order_time', '$order_date')";
            if (mysqli_query($connection, $insert_query)) {
                echo "<script>alert('Sikeres foglalás!')</script>";
            } else {
                echo "<script>alert('Hiba történt a foglalás során!')</script>";
            }
        }
    }
    ?>
<a href="logged_index.php">Vissza</a>
</body>
</html>