<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
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
<p>Ha szeretné leadni rendelését, akkor kérem <a href="login.php">jelentkezzen be</a>, vagy <a href="register.php">regisztráljon</a>!</p>
</body>
</html>