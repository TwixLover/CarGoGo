<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
    <style>
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
            background-color: rgba(255, 255, 255, 0.8);
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
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }
        input:checked + .slider {
            background-color: #f39c12;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #f39c12;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
</head>
<body>
<div id="login">
    <form id="form" name="login" method="post" action="login_bg.php">
        <h3 id="log">Bejelentkezés</h3>
        <span style="color: black;">Felhasználó</span>
        <label class="switch">
            <input type="checkbox" name="checkbox" value="customer">
            <span class="slider round"></span>
        </label>
        <span style="color: black;">Személyzet</span>
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