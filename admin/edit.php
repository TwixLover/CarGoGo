<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <?php
    $connection = "";
    $sql = "";
    $result = "";
    require 'db_config.php';

    if(isset($_GET['edit'])) {
        $car_id = $_GET['edit'];

        $sql = "SELECT * FROM cars c JOIN brands b ON c.brand_id = b.brand_id WHERE c.car_id = '$car_id'";
        $result = mysqli_query($connection, $sql);
        $data = mysqli_fetch_assoc($result);
        $brand_id = $data['brand_id'];
        $brand = $data['brand'];
        $model = $data['model'];
        $prod_year = $data['prod_year'];
        $seats = $data['seats'];
        $engine_size = $data['engine_size'];
        $fuel_type = $data['fuel_type'];
        $trans_type = $data['trans_type'];
        $pic_name = $data['pic_name'];

        if (isset($_POST['update'])) {
            $new_brand = $_POST['brand'];
            $new_model = $_POST['model'];
            $new_prod_year = $_POST['prod_year'];
            $new_seats = $_POST['seats'];
            $new_engine_size = $_POST['engine_size'];
            $new_fuel_type = $_POST['fuel_type'];
            $new_trans_type = $_POST['trans_type'];
            $new_pic_name = $_POST['pic_name'];

            $update_brands = "UPDATE brands SET brand = '$new_brand'WHERE brand_id = '$brand_id'";
            $result_brands = mysqli_query($connection, $update_brands);

            $update_cars = "UPDATE cars SET model = '$new_model', prod_year = '$new_prod_year', seats = '$new_seats', engine_size = '$new_engine_size', fuel_type = '$new_fuel_type', trans_type = '$new_trans_type', pic_name = '$new_pic_name' WHERE car_id = '$car_id'";
            $result_cars = mysqli_query($connection, $update_cars);

            if ($result_brands && $result_cars) {
                header("location: index.php");
            } else {
                echo "Update failed: " . mysqli_error($connection);
            }
        }
    }
    ?>
    <div id="insert">
        <form id="form" method="post">
            <div id="form_container">
                <input type="text" id="brand" name="brand" maxlength="20" size="50" value="<?php echo $brand ?>">
                <br>
                <br>
                <input type="text" id="model" name="model" maxlength="20" size="50" value="<?php echo $model ?>">
                <br>
                <br>
                <input type="text" id="prod_year" name="prod_year" maxlength="4" size="50" value="<?php echo $prod_year ?>">
                <br>
                <br>
                <input type="text" id="seats" name="seats" maxlength="1" size="50" value="<?php echo $seats ?>">
                <br>
                <br>
                <input type="text" id="engine_size" name="engine_size" maxlength="10" size="50" value="<?php echo $engine_size ?>">
                <br>
                <br>
                <input type="text" id="fuel_type" name="fuel_type" maxlength="20" size="50" value="<?php echo $fuel_type ?>">
                <br>
                <br>
                <input type="text" id="trans_type" name="trans_type" maxlength="10" size="50" value="<?php echo $trans_type ?>">
                <br>
                <br>
                <input type="text" id="pic_name" name="pic_name" maxlength="30" size="50" value="<?php echo $pic_name ?>">
                <br>
                <br>
                <input type="submit" id="accept" name="update" value="UPDATE">
                <input type="reset" id="back"  name="reset" value="RESET">
            </div>
        </form>
    </div>
</body>
</html>