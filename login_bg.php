<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? mysqli_real_escape_string($connection, $_POST['username']) : null;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($connection, $_POST['password']) : null;
    if (isset($_POST['checkbox'])) {
        $checkbox = $_POST['checkbox'];
        $_SESSION['checkbox'] = $checkbox;
        $sql = "SELECT employee_id FROM employees WHERE employee_username = '$username' and password = '$password'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $checkBlockedQuery = "SELECT is_blocked FROM employees WHERE employee_username = '$username'";
        $result = mysqli_query($connection, $checkBlockedQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            $userData = mysqli_fetch_assoc($result);
            if ($userData['is_blocked'] == 1) {
                header("location: login.php");
                echo "<script>alert(A felhasználó le van tiltva!)</script>";
                exit;
            }
        }

        if ($row && isset($row['employee_id'])) {
            $_SESSION['login_employee'] = $username;
            header("location: employee.php");
            exit;
        } else {
            header("location: login.php");
            exit;
        }
    } else {
        $sql = "SELECT customer_id, password FROM customers WHERE username = '$username'";
        $result = mysqli_query($connection, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

        $checkBlockedQuery = "SELECT is_blocked FROM customers WHERE username = '$username'";
        $result = mysqli_query($connection, $checkBlockedQuery);

        if ($result && mysqli_num_rows($result) > 0) {
            $userData = mysqli_fetch_assoc($result);
            if ($userData['is_blocked'] == 1) {
                header("location: login.php");
                echo "<script>alert(A felhasználó le van tiltva!)</script>";
                exit;
            }
        }

        if ($row && isset($row['customer_id'])) {
            $hashed_password = $row['password'];
            if (password_verify($password, $hashed_password)) {
                $_SESSION['login_customer'] = $username;
                $_SESSION['customer_id'] = $row['customer_id'];
                header("location: logged_index.php");
                exit;
            } else {
                header("location: login.php");
                exit;
            }
        } else {
            header("location: login.php");
            exit;
        }
    }
}