<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

$fname = isset($_POST['fname']) ? mysqli_real_escape_string($connection, $_POST['fname']) : null;
$lname = isset($_POST['lname']) ? mysqli_real_escape_string($connection, $_POST['lname']) : null;
$email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : null;
$username = isset($_POST['username']) ? mysqli_real_escape_string($connection, $_POST['username']) : null;
$password = isset($_POST['password']) ? mysqli_real_escape_string($connection, $_POST['password']) : null;
$reg_date = date('Y-m-d');

$checkEmail = "SELECT * FROM customers WHERE email = '$email'";
$checkName = "SELECT * FROM customers WHERE username = '$username'";
$checkEmailRun = mysqli_query($connection, $checkEmail) or die(mysqli_error($connection));
$checkNameRun = mysqli_query($connection, $checkName) or die(mysqli_error($connection));

if (mysqli_num_rows($checkEmailRun) > 0) {
    echo 'Ez az email cím már regisztrálva van!';
    echo '<a href="register.php">Vissza</a>';
}elseif (mysqli_num_rows($checkNameRun) > 0){
    echo 'Ez a felhasználónév már foglalt!';
    echo '<a href="register.php">Vissza</a>';
} else {
    if (isset($_POST['regist']) and !empty($fname) and !empty($lname) and !empty($email) and !empty($username) and !empty($password) and !empty($reg_date)) {
        $sql = 'INSERT INTO customers (fname, lname, email, username, password, reg_date) VALUES ("' . $fname . '","' . $lname . '","' . $email . '","' . $username . '","' . $password . '","' . $reg_date . '")';
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        echo 'Sikeres regisztráció!';
        echo '<a href="login.php">Tovább a bejelentkezéshez</a>';
    }
}
