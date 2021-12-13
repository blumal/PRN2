<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SARA-CONNOR21-2.0</title>
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="login">
        <form action="../services/login.php" method="POST"class="login-form shadow1">
            <label for="username">Correo</label>
            <input type="email" placeholder="ej. pepito@gmail.com" id="login_username" class="login-input_username" name="username">
            <label for="password">Contraseña</label>
            <input type="password" placeholder="Password" id="login_password" class="login-input_password" name="password">
            <input type="submit" name="Log in" value="enviar" id="login_btn_enviar" class="login-btn_enviar">
        </form>
    </div>
</body>
</html>