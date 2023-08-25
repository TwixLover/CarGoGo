<?php
session_start();
if (!isset($_POST['submit'])) {
    echo "Something wrong! Check again!";
    exit;
}

$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

$username = trim($_POST['name']);
$password = trim($_POST['pass']);

if (empty($username) || empty($password)) {
    echo "Name or Pass is empty!";
    exit;
}

$name = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);

$query = "SELECT username, password FROM admin WHERE username = '$username'";
$result = mysqli_query($connection, $query);

if (!$result) {
    echo "Query error: " . mysqli_error($connection);
    exit;
}

$row = mysqli_fetch_assoc($result);

if ($row && $password == $row['password']) {
    $_SESSION['admin'] = true;
    header("Location: admin.php");
} else {
    echo "Name or pass is wrong. Check again!";
    $_SESSION['admin'] = false;
    exit;
}
?>
