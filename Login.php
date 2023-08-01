<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
</head>
<body>
<div id="login">
    <form id="form" name="login" method="post" action="login_bg.php">
        <h3 id="log">Bejelentkezés</h3>
        <hr>
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
        <input type="submit" id="btnOk" name="sg" value="Bejelentkezés">
        <input type="reset" id="btnBack"  name="rg" value="Mégsem">
    </form>
</div>
<br>
<p>Még nincs profilja? <a href="register.php">Regisztráljon itt!</a></p>
</body>
</html>