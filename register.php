<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
</head>
<body>
<div id="regist">
    <form id="form" name="regist" method="post" action="register_bg.php">
        <h3 id="log">Regisztráció</h3>
        <hr>
        <br>
        <label for="fname">Keresztnév:</label>
        <input type="text" id="fname" name="fname" maxlength="20" size="20" autofocus placeholder="Keresztnév">
        <br>
        <span class="error" id="error_fname"> </span>
        <br>
        <br>
        <label for="lname">Vezetéknév:</label>
        <input type="text" id="lname" name="lname" maxlength="20" size="20" autofocus placeholder="Vezetéknév">
        <br>
        <span class="error" id="error_lname"> </span>
        <br>
        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" maxlength="50" size="60" autofocus placeholder="Email">
        <br>
        <span class="error" id="error_email"> </span>
        <br>
        <br>
        <label for="username">Felhasználónév:</label>
        <input type="text" id="username" name="username" maxlength="30" size="60" autofocus placeholder="Felhasznalónév">
        <br>
        <span class="error" id="error_username"> </span>
        <br>
        <br>
        <label for="password">Jelszó:</label>
        <input type="password" id="password" name="password" maxlength="60" size="60" autofocus placeholder="Jelszó">
        <br>
        <span class="error" id="error_password"> </span>
        <br>
        <br>
        <input type="submit" id="regist" name="regist" value="Regisztráció">
        <input type="reset" id="cancel"  name="cancel" value="Mégsem">
    </form>
</div>
<br>
<p>Van már profilja? <a href="login.php">Jelentkezzen be itt!</a></p>
</body>
</html>