<?php
$connection = "";
require 'db_config.php';

if (isset($_GET['employee'])) {
    $employee_id = $_GET['employee'];
    $blockQuery = "UPDATE employees SET is_blocked = 0 WHERE employee_id = '$employee_id'";
    mysqli_query($connection, $blockQuery);
}
header("Location: admin.php");
?>
