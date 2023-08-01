<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = isset($_POST['username']) ? mysqli_real_escape_string($connection, $_POST['username']) : null;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($connection, $_POST['password']) : null;


    $sql = "SELECT user_id FROM users WHERE username = '$username' and password = '$password'";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    if($count == 1) {
        $_SESSION['login_user'] = $username;

        header("location: index.php");
    }else {
        $error = "Your Login Name or Password is invalid";
    }
}


