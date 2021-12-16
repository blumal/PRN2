<?php
    include_once '../services/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/updateUser-form.css">
    <title>Update user</title>
</head>
<body>
<header>
    <div class="menu">
        <nav>
            <ul>
                <?php
                    //echo "<li class='opcionesMenu'>Hola ".$_SESSION['email']."</li>";
                    echo "<li><a class='opcionesMenu' href='./admon.php'>Administración de Usuarios</a></li>";
                    echo "<li><a class='opcionesMenu' href='./admon-mesas.php'>Administración de Mesas</a></li>";
                    echo "<li><a class='opcionesMenu' href='../services/kill-login.php'>Log out</a></div>";
                ?>
            </ul>
        </nav>
    </div>
</header>
<center>
    <h1>Actualización de datos</h1>
</center>
</body>
</html>