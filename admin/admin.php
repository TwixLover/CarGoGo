<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="home_page_button">
        <a class="Kezdolap" href="http://localhost/CarGoGo/index.php"><button class="button">Kezdőlap</button></a>
    </div>
    <h2 id="log">INSERT</h2>
    <div id="insert">
        <form id="form" name="insert" method="post" action="insert.php" enctype="multipart/form-data">
            <div id="form_container">
                <br>
                <div id="input_div">
                <input type="text" id="brand" name="brand" maxlength="20" size="50" autofocus placeholder="Brand">
                </div>
                <br>
                <div id="input_div">
                <input type="text" id="model" name="model" maxlength="20" size="50" autofocus placeholder="Model">
                </div>
                <br>
                <div id="input_div">
                <input type="text" id="prod_year" name="prod_year" maxlength="4" size="50" autofocus placeholder="Production year">
                </div>
                <br>
                <div id="input_div">
                <input type="text" id="seats" name="seats" maxlength="1" size="50" autofocus placeholder="Seats">
                </div>
                <br>
                <div id="input_div">
                <input type="text" id="engine_size" name="engine_size" maxlength="10" size="50" autofocus placeholder="Engine size">
                </div>
                <br>
                <div id="input_div">
                <input type="text" id="fuel_type" name="fuel_type" maxlength="20" size="50" autofocus placeholder="Fuel type">
                </div>
                <br>
                <div id="input_div">
                <input type="text" id="trans_type" name="trans_type" maxlength="10" size="50" autofocus placeholder="Transmission">
                </div>
                <br>
                <div id="input_div">
                    <th>Kép:  </th>
                    <td><input type="file" name="image"></td>
                </div>
                <br>
                <div id="input_div">
                <input type="submit" id="accept" name="insert" value="INSERT">
                <input type="reset" id="back"  name="reset" value="RESET">
                </div>
            </div>
        </form>
    </div>
    <h2>CUSTOMERS</h2>
    <div class="table_wrapper">
        <table class="table" cellspacing="0">
            <tbody>
            <thead>
            <tr>
                <th>CUSTOMER_ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>PERSONAL_ID</th>
                <th>DRIVERS_ID</th>
                <th>LOCATION</th>
                <th>EMAIL</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>REGISTRATION_DATE</th>
                <th>IS_BLOCKED</th>
                <th>BLOCK</th>
                <th>UNBLOCK</th>
                <th>DELETE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $connection = "";
            require 'db_config.php';

            $sql_customer = "SELECT * FROM customers";
            $result_customer = mysqli_query($connection, $sql_customer);
            while ($data = mysqli_fetch_assoc($result_customer)) {
                echo '
                        <tr>
                            <td>'.$data['customer_id'].'</td>
                            <td>'.$data['fname'].'</td>
                            <td>'.$data['lname'].'</td>
                            <td>'.$data['personal_id'].'</td>
                            <td>'.$data['drivers_id'].'</td>
                            <td>'.$data['location'].'</td>
                            <td>'.$data['email'].'</td>
                            <td>'.$data['username'].'</td>
                            <td>'.$data['password'].'</td>
                            <td>'.$data['reg_date'].'</td>
                            <td>'.$data['is_blocked'].'</td>
                            <td><a href="customer_block.php?customer='.$data['customer_id'].'">BLOCK</td>
                            <td><a href="customer_unblock.php?customer='.$data['customer_id'].'">UNBLOCK</td>
                            <td><a href="customer_delete.php?customer='.$data['customer_id'].'">DELETE</td>
                        </tr>';
            }
            ?>
            <tbody>
        </table>
    </div>
    <h2>EMPLOYEES</h2>
    <div class="table_wrapper">
        <table class="table" cellspacing="0">
            <tbody>
            <thead>
            <tr>
                <th>EMPLOYEE_ID</th>
                <th>FIRST NAME</th>
                <th>LAST NAME</th>
                <th>PERSONAL_ID</th>
                <th>DRIVERS_ID</th>
                <th>PHONE</th>
                <th>LOCATION</th>
                <th>EMAIL</th>
                <th>USERNAME</th>
                <th>PASSWORD</th>
                <th>IS_BLOCKED</th>
                <th>BLOCK</th>
                <th>UNBLOCK</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $connection = "";
            require 'db_config.php';

            $sql_employee = "SELECT * FROM employees";
            $result_employee = mysqli_query($connection, $sql_employee);
            while ($data = mysqli_fetch_assoc($result_employee)) {
                echo '
                        <tr>
                            <td>'.$data['employee_id'].'</td>
                            <td>'.$data['fname'].'</td>
                            <td>'.$data['lname'].'</td>
                            <td>'.$data['personal_id'].'</td>
                            <td>'.$data['drivers_id'].'</td>
                            <td>'.$data['phone'].'</td>
                            <td>'.$data['location'].'</td>
                            <td>'.$data['email'].'</td>
                            <td>'.$data['employee_username'].'</td>
                            <td>'.$data['password'].'</td>
                            <td>'.$data['is_blocked'].'</td>
                            <td><a href="employee_block.php?employee='.$data['employee_id'].'">BLOCK</td>
                            <td><a href="employee_unblock.php?employee='.$data['employee_id'].'">UNBLOCK</td>
                            <td><a href="employee_edit.php?employee='.$data['employee_id'].'">EDIT</td>
                            <td><a href="employee_delete.php?employee='.$data['employee_id'].'">DELETE</td>
                        </tr>';
            }
            ?>
            <tbody>
        </table>
    </div>
    <h2>CARS</h2>
    <div class="table_wrapper">
        <table class="table" cellspacing="0">
            <thead>
            <tr>
                <th>CAR_ID</th>
                <th>BRAND</th>
                <th>MODEL</th>
                <th>PRODUCTION YEAR</th>
                <th>SEATS</th>
                <th>ENGINE SIZE</th>
                <th>FUEL TYPE</th>
                <th>TRANSMISSION</th>
                <th>PICTURE NAME</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $connection = "";
            $sql = "";
            $result = "";
            require 'db_config.php';

            $sql = "SELECT * FROM brands b JOIN cars c ON b.brand_id = c.brand_id";
            $result = mysqli_query($connection, $sql);
            while ($data = mysqli_fetch_assoc($result)) {
                echo '
            <tr>
                <td>'.$data['car_id'].'</td>
                <td>'.$data['brand'].'</td>
                <td>'.$data['model'].'</td>
                <td>'.$data['prod_year'].'</td>
                <td>'.$data['seats'].'</td>
                <td>'.$data['engine_size'].'</td>
                <td>'.$data['fuel_type'].'</td>
                <td>'.$data['trans_type'].'</td>
                <td>'.$data['pic_name'].'</td>
                <td><a href="edit.php?edit='.$data['car_id'].'">EDIT</a></td>
                <td><a href="functions.php?delete='.$data['car_id'].'">DELETE</a></td>
            </tr>';
            }
            ?>
            <tbody>
        </table>
    </div>
    <br>
    <h2>ORDERS</h2>
    <div class="table_wrapper">
        <table class="table" cellspacing="0">
            <tbody>
            <thead>
            <tr>
                <th>ORDER_ID</th>
                <th>USERNAME</th>
                <th>BRAND</th>
                <th>MODEL</th>
                <th>PRODUCTION YEAR</th>
                <th>ORDER TIME</th>
                <th>ORDER DATE</th>
                <th>PRICE</th>
                <th>DELETE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $connection = "";
            require 'db_config.php';
            $sql_order = "SELECT * FROM orders o JOIN customers cu ON o.customer_id = cu.customer_id JOIN cars ca ON o.car_id = ca.car_id JOIN brands b ON ca.brand_id = b.brand_id";
            $result_order = mysqli_query($connection, $sql_order);
            while ($data = mysqli_fetch_assoc($result_order)) {
                echo '
            <tr>
                <td>'.$data['order_id'].'</td>
                <td>'.$data['username'].'</td>
                <td>'.$data['brand'].'</td>
                <td>'.$data['model'].'</td>
                <td>'.$data['prod_year'].'</td>
                <td>'.$data['order_time'].'</td>
                <td>'.$data['order_date'].'</td>
                <td>'.$data['price'].'</td>
                <td><a href="order_delete.php?order='.$data['order_id'].'">DELETE</td>
            </tr>';
            }
            ?>
            <tbody>
        </table>
    </div>
    <br>
    <h2>ACCEPTED ORDERS</h2>
    <div class="table_wrapper">
        <table class="table" cellspacing="0">
            <tbody>
            <thead>
            <tr>
                <th>DRIVE_ID</th>
                <th>CUSTOMER_ID</th>
                <th>CAR_ID</th>
                <th>EMPLOYEE_ID</th>
                <th>ORDER_ID</th>
                <th>ORDER TIME</th>
                <th>ORDER DATE</th>
                <th>PRICE</th>
                <th>DELETE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $connection = "";
            require 'db_config.php';
            $sql_accepted_order = "SELECT * FROM drivers";
            $result_accepted_order = mysqli_query($connection, $sql_accepted_order);

            while ($data2 = mysqli_fetch_assoc($result_accepted_order)) {
                echo '
                    <tr>
                        <td>'.$data2['drive_id'].'</td>
                        <td>'.$data2['customer_id'].'</td>
                        <td>'.$data2['car_id'].'</td>
                        <td>'.$data2['employee_id'].'</td>
                        <td>'.$data2['order_id'].'</td>
                        <td>'.$data2['order_time'].'</td>
                        <td>'.$data2['order_date'].'</td>
                        <td>'.$data2['price'].'</td>
                        <td><a href="accepted_order_delete.php?drive='.$data2['drive_id'].'">DELETE</td>
                    </tr>';
            }
            ?>
            <tbody>
        </table>
    </div>
    <h2>COMPLETED ORDERS</h2>
    <div class="table_wrapper">
        <table class="table" cellspacing="0">
            <tbody>
            <thead>
            <tr>
                <th>COMP_ORDER_ID</th>
                <th>ORDER_ID</th>
                <th>CUSTOMER_ID</th>
                <th>CAR_ID</th>
                <th>ORDER DATE</th>
                <th>PRICE</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $connection = "";
            require 'db_config.php';
            $sql_completed_order = "SELECT * FROM completed_orders";
            $result_completed_order = mysqli_query($connection, $sql_completed_order);

            while ($data2 = mysqli_fetch_assoc($result_completed_order)) {
                echo '
                    <tr>
                        <td>'.$data2['comp_order_id'].'</td>
                        <td>'.$data2['order_id'].'</td>
                        <td>'.$data2['customer_id'].'</td>
                        <td>'.$data2['car_id'].'</td>
                        <td>'.$data2['order_date'].'</td>
                        <td>'.$data2['price'].'</td>
                    </tr>';
            }
            ?>
            <tbody>
        </table>
    </div>
</body>
</html>