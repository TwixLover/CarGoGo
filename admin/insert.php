<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

$brand = isset($_POST['brand']) ? mysqli_real_escape_string($connection, $_POST['brand']) : null;
$model = isset($_POST['model']) ? mysqli_real_escape_string($connection, $_POST['model']) : null;
$prod_year = isset($_POST['prod_year']) ? mysqli_real_escape_string($connection, $_POST['prod_year']) : null;
$seats = isset($_POST['seats']) ? mysqli_real_escape_string($connection, $_POST['seats']) : null;
$engine_size = isset($_POST['engine_size']) ? mysqli_real_escape_string($connection, $_POST['engine_size']) : null;
$fuel_type = isset($_POST['fuel_type']) ? mysqli_real_escape_string($connection, $_POST['fuel_type']) : null;
$trans_type = isset($_POST['trans_type']) ? mysqli_real_escape_string($connection, $_POST['trans_type']) : null;
if(isset($_FILES['image']) && $_FILES['image']['name'] != ""){
    $pic_name = $_FILES['image']['name'];
    $directory_self = str_replace(basename($_SERVER['PHP_SELF']), '', $_SERVER['PHP_SELF']);
    $uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . $directory_self . "../images/cars/";
    $uploadDirectory .= $pic_name;
    move_uploaded_file($_FILES['image']['tmp_name'], $uploadDirectory);
}

$brand_id = "";

if (isset($_POST['insert']) and !empty($brand) and !empty($model) and !empty($prod_year) and !empty($seats) and !empty($engine_size) and !empty($fuel_type) and !empty($trans_type) and !empty($pic_name)) {
    $checkBrandQuery = 'SELECT * FROM brands WHERE brand = "' . $brand . '"';
    $checkBrandResult = mysqli_query($connection, $checkBrandQuery);

    if (mysqli_num_rows($checkBrandResult) > 0) {
        $row = mysqli_fetch_assoc($checkBrandResult);
        $brand_id = $row['brand_id'];
    } else {
        $insertBrandQuery = 'INSERT INTO brands (brand) VALUES ("' . $brand . '")';
        $insertBrandResult = mysqli_query($connection, $insertBrandQuery) or die(mysqli_error($connection));
        $brand_id = mysqli_insert_id($connection);
    }
    $sql2 = 'INSERT INTO cars (brand_id, model, prod_year, seats, engine_size, fuel_type, trans_type, pic_name) VALUES ("' . $brand_id . '","' . $model . '","' . $prod_year . '","' . $seats . '","' . $engine_size . '","' . $fuel_type . '","' . $trans_type . '","' . $pic_name . '")';
    $result2 = mysqli_query($connection, $sql2) or die(mysqli_error($connection));
    header("location: admin.php");
}