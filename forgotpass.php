<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/forgotpass.css">
    <title>Email Form</title>
</head>
<body>
<div id="login">
    <h3 id="log">Kérlek add meg az E-mail címed, amivel regisztráltál</h3>
    <form method="post">
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <input type="submit" value="Küldés" id="btnOk">
    </form>
    <p><a href="login.php" id="btnBack">Vissza</a></p>
</div>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function send_pass($customer_id) {
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '1ea10c51550ba1';
        $mail->Password = 'bc34abded6fb10';
        $mail->setFrom('info@mailtrap.io', 'Mailtrap');
        $mail->Subject = 'Elfelejtett jelszó';
        $mail->addAddress('1ea10c51550ba1+1@inbox.mailtrap.io');
        $mail->isHTML(true);
        $mailContent = "<h1>Elfelejtett jelszó</h1>
        <p>Kérem kattintson <a href='http://localhost/CarGoGo/newpass.php?customer_id=$customer_id'>ide</a>, hogy megváltoztathassa a jelszavát!</p>";
        $mail->Body = $mailContent;
        if($mail->send()){
            echo 'Message has been sent';
        }else{
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

    $customer_id = '';

    $email = isset($_POST['email']) ? mysqli_real_escape_string($connection, $_POST['email']) : null;

    $sql = "SELECT customer_id FROM customers WHERE email = '$email'";
    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);
    $customer_id = $data['customer_id'];
    send_pass($customer_id);
}

?>
</body>
</html>
