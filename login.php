<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
    <style>
        /* CSS for the login form */
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/car_background.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-blend-mode: color-burn;
        }

        #login {
            max-width: 400px;
            padding: 30px;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8); /* Áttetsző fehér háttér a formon */
        }

        h3#log {
            color: #f39c12;
            margin-top: 0;
            font-size: 35px;
            display: flex;
            justify-content: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 5px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;

        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #f39c12;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #e67e22;
        }

        p {
            margin-top: 15px;
            text-align: center;
        }

        a {
            color: #f39c12;
        }

        a:hover {
            color: #e67e22;
        }
        #btnOk, #btnBack {
            border-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>
<body>
<div id="login">
    <form id="form" name="login" method="post" action="login_bg.php">
        <h3 id="log">Bejelentkezés</h3>
        <label for="username">Felhasználónév:</label>
        <input type="text" id="username" name="username" maxlength="30" size="60" autofocus placeholder="Felhasznalónév">
        <br>
        <span class="error" id="error_username"> </span>
        <br>
        <label for="password">Jelszó:</label>
        <input type="password" id="password" name="password" maxlength="60" size="60" autofocus placeholder="Jelszó">
        <span class="error" id="error_password"> </span>
        <br>
        <input type="submit" id="btnOk" name="sg" value="Bejelentkezés">
        <br>
        <input type="reset" id="btnBack"  name="rg" value="Mégsem">
        <p>Még nincs profilja? <a href="register.php">Regisztráljon itt!</a></p>
    </form>
</div>
<br>
<div></div>
</body>
</html>