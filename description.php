<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>DESCRIPTION</title>
</head>
<body>
<form method="post" action="">
    <label for="description">Leírás: </label>
    <textarea name="description" rows="4" cols="50"></textarea><br>
    <input type="submit" name="submit" value="Rendben">
</form>
<?php
$connection = "";
$result = "";
require 'db_config.php';

if(isset($_POST['submit'])){
    if(isset($_GET['comp_order_id']) && isset($_POST['description'])){
        $comp_order_id = $_GET['comp_order_id'];
        $description = $_POST['description'];

        $sql = "UPDATE completed_orders SET description = '$description' WHERE comp_order_id = '$comp_order_id'";
        $result = mysqli_query($connection, $sql);

        if ($result) {
            header("location: employee.php");
        } else {
            echo "Error updating description: " . mysqli_error($connection);
        }
    }
}
?>
</body>
</html>
