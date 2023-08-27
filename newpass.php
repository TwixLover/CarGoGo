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
        <h3 id="log">Add meg az új jelszavad</h3>
        <form method="post">
            <label for="email">Új jelszó:</label>
            <input type="text" id="new_pass" name="new_pass" required>
            <input type="submit" value="Küldés" id="btnOk">
        </form>
        <p><a href="login.php" id="btnBack">Vissza</a></p>
    </div>
    <?php
    $connection = "";
    $sql = "";
    $result = "";
    require 'db_config.php';

    if (isset($_GET['customer_id'])) {
        $customer_id = $_GET['customer_id'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $new_pass = isset($_POST['new_pass']) ? mysqli_real_escape_string($connection, $_POST['new_pass']) : null;
            $new_hashed_pass = password_hash($new_pass, PASSWORD_BCRYPT);
            $sql = "UPDATE customers SET password = '$new_hashed_pass'WHERE customer_id = '$customer_id'";
            $result = mysqli_query($connection, $sql);
            if ($result) {
                header("location: login.php");
            } else {
                echo "Update failed: " . mysqli_error($connection);
            }
        }
    }
    ?>
</body>
</html>
