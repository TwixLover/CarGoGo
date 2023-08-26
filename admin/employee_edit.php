<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<?php
$connection = "";
$sql = "";
$result = "";
require 'db_config.php';

if(isset($_GET['employee'])) {
    $employee_id = $_GET['employee'];

    $sql = "SELECT * FROM employees WHERE employee_id = '$employee_id'";
    $result = mysqli_query($connection, $sql);
    $data = mysqli_fetch_assoc($result);
    $employee_id = $data['employee_id'];
    $fname = $data['fname'];
    $lname = $data['lname'];
    $personal_id = $data['personal_id'];
    $drivers_id = $data['drivers_id'];
    $phone = $data['phone'];
    $location = $data['location'];
    $email = $data['email'];
    $employee_username = $data['employee_username'];
    $password = $data['password'];

    if (isset($_POST['update'])) {
        $new_fname = $_POST['fname'];
        $new_lname = $_POST['lname'];
        $new_personal_id = $_POST['personal_id'];
        $new_drivers_id = $_POST['drivers_id'];
        $new_phone = $_POST['phone'];
        $new_location = $_POST['location'];
        $new_email = $_POST['email'];
        $new_employee_username = $_POST['employee_username'];
        $new_password = $_POST['password'];;

        $update = "UPDATE employees SET fname = '$new_fname', lname = '$new_lname', personal_id = '$new_personal_id', drivers_id = '$new_drivers_id', 
                   phone = '$new_phone', location = '$new_location', email = '$new_email', employee_username = '$new_employee_username',
                   password = '$new_password' WHERE employee_id = '$employee_id'";
        $result = mysqli_query($connection, $update);

        if ($result) {
            header("location: admin.php");
        } else {
            echo "Update failed: " . mysqli_error($connection);
        }
    }
}
?>
<div id="insert">
    <form id="form" method="post">
        <div id="form_container">
            <input type="text" id="fname" name="fname" maxlength="20" size="50" value="<?php echo $fname ?>">
            <br>
            <br>
            <input type="text" id="lname" name="lname" maxlength="20" size="50" value="<?php echo $lname ?>">
            <br>
            <br>
            <input type="text" id="personal_id" name="personal_id" maxlength="13" size="50" value="<?php echo $personal_id ?>">
            <br>
            <br>
            <input type="text" id="drivers_id" name="drivers_id" maxlength="9" size="50" value="<?php echo $drivers_id ?>">
            <br>
            <br>
            <input type="text" id="phone" name="phone" maxlength="11" size="50" value="<?php echo $phone ?>">
            <br>
            <br>
            <input type="text" id="location" name="location" maxlength="30" size="50" value="<?php echo $location ?>">
            <br>
            <br>
            <input type="text" id="email" name="email" maxlength="50" size="50" value="<?php echo $email ?>">
            <br>
            <br>
            <input type="text" id="employee_username" name="employee_username" maxlength="30" size="50" value="<?php echo $employee_username ?>">
            <br>
            <br>
            <input type="text" id="password" name="password" maxlength="60" size="50" value="<?php echo $password ?>">
            <br>
            <br>
            <input type="submit" id="accept" name="update" value="UPDATE">
            <input type="reset" id="back"  name="reset" value="RESET">
        </div>
    </form>
</div>
</body>
</html>