<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>
    <style>
        /* CSS for the registration form */
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
           /* filter: blur(5px); /* Elhomályosítás az autó háttérén */
        }

        #regist {
            max-width: 400px;
            padding: 20px;
            border-radius: 8px;
            background-color: rgba(255, 255, 255, 0.8); /* Áttetsző fehér háttér a formon */
        }

        h3#log {
            color: #f39c12;
            margin-top: 10;
            font-size: 35px;
            display: flex;
            justify-content: center;
            align-items: center;
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
            padding: 10px;
            margin-bottom: 20px;
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
        #register{
            background-color: #f39c12;
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
        @media only screen and (max-width: 600px) {
            #regist {
                max-width: 80%;
                padding: 10px;
            }

            h3#log {
                font-size: 28px;
                margin-top: 5px;
            }


            label,
            input[type="text"],
            input[type="password"] {
                font-size: 14px;
                padding: 8px;
                margin-bottom: 10px;
            }


            input[type="submit"],
            input[type="reset"] {
                padding: 8px 15px;
            }
        }
    </style>
</head>

<body>
<div id="regist">
    <form id="form" name="regist" method="post" action="register_bg.php">
        <h3 id="log">Regisztráció</h3>
        <label for="fname">Keresztnév:</label>
        <input type="text" id="fname" name="fname" maxlength="20" size="20" autofocus placeholder="Keresztnév">
        <span class="error" id="error_fname"> </span>
        <label for="lname">Vezetéknév:</label>
        <input type="text" id="lname" name="lname" maxlength="20" size="20" autofocus placeholder="Vezetéknév">
        <span class="error" id="error_lname"> </span>
        <label for="lname">Személyi szám</label>
        <input type="text" id="per_id" name="per_id" maxlength="20" size="20" autofocus placeholder="Személyi szám">
        <span class="error" id="error_lname"> </span>
        <label for="lname">Vezetői engedély szám:</label>
        <input type="text" id="dri_id" name="dri_id" maxlength="20" size="20" autofocus placeholder="Vezetői engedély szám">
        <span class="error" id="error_lname"> </span>
        <label for="lname">Engedély kiállításának helye:</label>
        <input type="text" id="location" name="location" maxlength="20" size="20" autofocus placeholder="Kiadás helye">
        <span class="error" id="error_lname"> </span>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" maxlength="50" size="60" autofocus placeholder="Email">
        <span class="error" id="error_email"> </span>
        <label for="username">Felhasználónév:</label>
        <input type="text" id="username" name="username" maxlength="30" size="60" autofocus placeholder="Felhasznalónév">
        <span class="error" id="error_username"> </span>
        <label for="password">Jelszó:</label>
        <input type="password" id="password" name="password" maxlength="60" size="60" autofocus placeholder="Jelszó">
        <span class="error" id="error_password"> </span>
        <input type="submit" id="register" name="regist" value="Regisztráció">
        <br>
        <input type="reset" id="cancel"  name="cancel" value="Mégsem" >
        <br>
        <p>Van már profilja? <a href="login.php""">Jelentkezzen be itt!</a></p>
    </form>
</div>

</body>
</html>