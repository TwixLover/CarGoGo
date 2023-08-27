<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autó foglalás</title>
    <style>
        /* Reset some default browser styles */
        body, p, img, td, tr, a, input {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        img {
            width: 500px;
            height: 400px;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .car-details {
            display: block;
            background-color: #fff;
            padding: 10px;
            border-radius: 2px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding-left: 150px;
        }

        .car-details h1 {
            color: #f39c12;
            margin-bottom: 10px;
        }

        .car-details form {
            margin-bottom: 20px;
        }

        .car-details label {
            display: block;
            margin-bottom: 5px;
        }

        .car-details input[type="radio"] {
            margin-right: 5px;
        }

        .car-details input[type="date"] {
            width: 18%;
            padding: 8px;
            margin-bottom: 10px;
        }

        .car-details input[type="submit"] {
            background-color: #f39c12;
            font-size: medium;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 180px;
        }

        .car-details input[type="submit"]:hover {
            background-color: #e67e22;
        }

        .message {
            background-color: silver;
            color: red;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            background-size: auto;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #f39c12;
            text-decoration: none;
        }

        .back-link:hover {
            color: #e67e22;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .car-details {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="car-details">
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
                        <h1>Autó: '.$data['brand'].'</h1>
                        <table>
                            <tr>
                                <td>Model:</td>
                                <td>'.$data['model'].'</td>
                            </tr>
                            <tr>
                                <td>Évjárat:</td>
                                <td>'.$data['prod_year'].'</td>
                            </tr>
                            <tr>
                                <td>Ülések száma:</td>
                                <td>'.$data['seats'].'</td>
                            </tr>
                            <tr>
                                <td>Hengerűrtartalom:</td>
                                <td>'.$data['engine_size'].'</td>
                            </tr>
                            <tr>
                                <td>Üzemanyag:</td>
                                <td>'.$data['fuel_type'].'</td>
                            </tr>
                            <tr>
                                <td>Váltó típusa:</td>
                                <td>'.$data['trans_type'].'</td>
                            </tr>
                        </table>';
            }
        }
        ?>
        <form method="POST">
            <label for="time">Kölcsönzési idő:</label>
            <input type="radio" name="order_time" value="12" checked> 12 óra
            <input type="radio" name="order_time" value="24"> 24 óra
            <br>
            <label for="date">Dátum:</label>
            <input type="date" name="order_date" required>
            <br>
            <label style="display: inline-flex; align-items: center;">
                <input type="checkbox" name="driver" value="no_driver">
                <p style="margin-left: 5px">Sofőrt is szeretnék</p>
            </label>
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
        $result = mysqli_query($connection, $sql);
        while ($data = mysqli_fetch_assoc($result)) {
            $customer_id = $data['customer_id'];
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $car_id = $_SESSION['car_id'];
            $order_time = $_POST['order_time'];
            $order_date = $_POST['order_date'];
            $driver = isset($_POST['driver']) ? 1 : 0;
            $price = 100;
            if ($order_time == 24) {
                $price += 100;
            }
            if ($driver) {
                $price += 200;
            }

            $check_query = "SELECT * FROM orders WHERE car_id = '$car_id' AND order_date = '$order_date'";
            $check_result = mysqli_query($connection, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                echo "<div class='message'>Válasszon másik dátumot, ez a dátum már foglalt erre az autóra!</div>";
            } else {
                $insert_query = "INSERT INTO orders (customer_id, car_id, order_time, order_date, driver, price) VALUES ('$customer_id', '$car_id', '$order_time', '$order_date', '$driver', '$price')";
                if (mysqli_query($connection, $insert_query)) {
                    echo "<div class='message'>Sikeres foglalás!</div>";
                    echo "<div class='message'>Foglalás ára: " . $price . "€</div>";
                } else {
                    echo "<div class='message'>Hiba történt a foglalás során!</div>";
                    echo "Hibaüzenet: " . mysqli_error($connection);
                }
            }
        }
        ?>
        <form method="get">
            <label for="rating">Értékelés (1-10):</label>
            <input type="number" name="rating" min="1" max="10" required>
            <button type="submit" name="submit_rating">Értékelés beküldése</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['submit_rating'])) {
                $rating = $_GET['rating'];
                $car_id = $_SESSION['car_id'];

                $insert_rating_query = "INSERT INTO car_ratings (car_id, rating, rate_date) VALUES ('$car_id', '$rating', NOW())";

                if (mysqli_query($connection, $insert_rating_query)) {
                    echo "<div class='message'>Sikeres értékelés beküldése!</div>";
                } else {
                    echo "<div class='message'>Hiba történt az értékelés beküldése során!</div>";
                    echo "Hibaüzenet: " . mysqli_error($connection);
                }
            }
        }
        ?>
        <a href="logged_index.php" class="back-link">Vissza</a>
    </div>
</div>
</body>
</html>