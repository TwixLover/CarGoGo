<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

/*function send_verification($username, $email, $verification) {

}*/

$fname = isset($_POST['fname']) ? mysqli_real_escape_string($connection, $_POST['fname']) : null;
$lname = isset($_POST['lname']) ? mysqli_real_escape_string($connection, $_POST['lname']) : null;
$per_id = isset($_POST['per_id']) ? mysqli_real_escape_string($connection, $_POST['per_id']) : null;
$dri_id = isset($_POST['dri_id']) ? mysqli_real_escape_string($connection, $_POST['dri_id']) : null;
$location = isset($_POST['location']) ? mysqli_real_escape_string($connection, $_POST['location']) : null;
$email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : null;
$username = isset($_POST['username']) ? mysqli_real_escape_string($connection, $_POST['username']) : null;
$password = isset($_POST['password']) ? mysqli_real_escape_string($connection, $_POST['password']) : null;
$reg_date = date('Y-m-d');
$verification = md5(rand());

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
    if (isset($_POST['regist']) and !empty($fname) and !empty($lname) and !empty($per_id) and !empty($dri_id) and !empty($location) and !empty($email) and !empty($username) and !empty($password) and !empty($reg_date)) {

        // password hashing
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        //send_verification($username, $email, $verification);
        $sql = 'INSERT INTO customers (fname, lname, personal_id, drivers_id, location, email, username, password, reg_date) VALUES ("' . $fname . '","' . $lname . '","' . $per_id . '","' . $dri_id . '","' . $location . '","' . $email . '","' . $username . '","' . $hashed_password . '","' . $reg_date . '")';
        $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        echo 'Sikeres regisztráció!';
        echo '<a href="login.php">Tovább a bejelentkezéshez</a>';
    }
}
