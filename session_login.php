<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

session_start();

$customer_check = $_SESSION['login_customer'];

$ses_sql = mysqli_query($connection,"SELECT username FROM customers WHERE username = '$customer_check'");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['username'];

if(!isset($_SESSION['login_customer'])){
    header("location:login.php");
    die();
}