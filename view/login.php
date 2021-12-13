<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARA-CONNOR21-2.0</title>
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <center>
        <div class="container">
            <h1>Welcome to MyRestaurant App</h1>
            <form action="../services/login.php" method="POST"class="login-form shadow1">
                <label for="username">Correo:</label></br></br>
                <input type="email" placeholder="ej. pepito@gmail.com" id="login_username" class="login-input_username" name="username"></br></br>
                <label for="password">Contraseña:</label></br></br>
                <input type="password" placeholder="Password" id="login_password" class="login-input_password" name="password"></br></br>
                <input type="submit" name="Log in" value="Log in" id="login_btn_enviar" class="login-btn_enviar"></br></br>
            </form>
        </div>
    </center>
</body>
</html>