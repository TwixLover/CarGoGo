<?php
session_start();
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

if (isset($_GET['verification'])) {
    $verification = $_GET['verification'];
    $sql = "SELECT verification FROM customers WHERE verification = '$verification'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        $sql2 = "SELECT ver_check FROM customers WHERE verification = '$verification'";
        $result2 = mysqli_query($connection, $sql2);
        $row = mysqli_fetch_array($result2);

        if ($row['ver_check'] == 0) {
            $sql_update = "UPDATE customers SET ver_check = 1 WHERE verification = '$verification'";
            $result_update = mysqli_query($connection, $sql_update);

            if ($result_update) {
                $_SESSION['ver_check'] = 'A profilja igazolva lett!';
                header("location: login.php");
            } else {
                $_SESSION['ver_check'] = 'Az igazolás hibás!';
            }
        } else {
            $_SESSION['ver_check'] = 'A profilja már igazolva lett!';
            header("location: index.php");
        }
    } else {
        $_SESSION['ver_check'] = 'Az igazolás hibás!';
        header("location: login.php");
    }
}
?>
