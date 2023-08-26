<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Admin Login</title>
</head>
<body>
<div id="login-container">
    <h2>Admin Login</h2>
    <form class="form-horizontal" method="post" action="admin_verify.php">
        <div class="form-group">
            <label for="name" class="control-label col-md-4">Név</label>
            <div class="col-md-4">
                <input type="text" name="name" class="form-control">
            </div>
        </div>
        <div class="form-group">
            <label for="pass" class="control-label col-md-4">Jelszó</label>
            <div class="col-md-4">
                <input type="password" name="pass" class="form-control">
            </div>
        </div>
        <input type="submit" name="submit" class="btn" style="background-color: #f39c12; color: white;">
    </form>
</div>
</body>
</html>
