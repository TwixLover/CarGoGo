<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Autó foglalás</title>
    <style>
        /* Reset some default browser styles */
        body, p, img, td, tr, a {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .car-image {
            max-width: 100%;
            height: 400px;
        }

        .car-details {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .car-details h2 {
            color: #f39c12;
            margin-bottom: 10px;
        }

        .car-details td {
            padding: 5px 0;
        }

        .login-register {
            text-align: center;
            margin-top: 20px;
        }

        .login-register a {
            color: #f39c12;
            text-decoration: none;
        }

        .login-register a:hover {
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
    <div class="image-container">
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
                echo "<img src='images/cars/$picture' alt='Car Image' class='car-image'>";
            }
        }
        ?>
    </div>
    <div class="car-details">
        <?php
        if (isset($_GET['car_id'])) {
            $car_id = $_GET['car_id'];
            $sql = "SELECT * FROM brands b JOIN cars c ON b.brand_id = c.brand_id WHERE c.car_id = '$car_id'";
            $result = mysqli_query($connection, $sql);
            while ($data = mysqli_fetch_assoc($result)) {
                echo '<h2>Autó: ' . $data['brand'] . '</h2>';
                echo '<table>
                            <tr>
                                <td>Model:</td>
                                <td>' . $data['model'] . '</td>
                            </tr>
                            <tr>
                                <td>Évjárat:</td>
                                <td>' . $data['prod_year'] . '</td>
                            </tr>
                            <tr>
                                <td>Ülések száma:</td>
                                <td>' . $data['seats'] . '</td>
                            </tr>
                            <tr>
                                <td>Hengerűrtartalom:</td>
                                <td>' . $data['engine_size'] . '</td>
                            </tr>
                            <tr>
                                <td>Üzemanyag:</td>
                                <td>' . $data['fuel_type'] . '</td>
                            </tr>
                            <tr>
                                <td>Váltó típusa:</td>
                                <td>' . $data['trans_type'] . '</td>
                            </tr>
                        </table>';
            }
        }
        ?>
    </div>
    <div class="login-register">
        <p>Ha szeretné leadni rendelését, akkor kérem <a href="login.php">jelentkezzen be</a>, vagy <a href="register.php">regisztráljon</a>!</p>
    </div>
</div>
</body>
</html>
