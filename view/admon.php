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
    <link rel="stylesheet" href="../css/admon.css">
    <title>Admon</title>
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
    <h1>Admin Zone</h1>
    <div class="container">
        <div class="content">
            <table border="1px">
                <tr>
                    <th>Nombre del empleado</th>
                    <th>Apellido del empleado</th>
                    <th>Email</th>
                    <th>Perfil</th>
                    <th>UPDATE</th>
                    <th>DELETE</th>
                </tr>

            <?php
                $extractUsers = $pdo->prepare("SELECT * FROM tbl_usuario");
                $extractUsers->execute();
                $extractUsers = $extractUsers->fetchAll(PDO::FETCH_ASSOC);

                foreach ($extractUsers as $datas) {
                    echo "<tr>";
                        echo "<td>".$datas['nombre_use']."</td>";
                        echo "<td>".$datas['apellido_use']."</td>";
                        echo "<td>".$datas['email_use']."</td>";
                        echo "<td>".$datas['tipo_use']."</td>";
                        echo "<td><a href='./updateUser-form.php?id_use=".$datas['id_use']."'>Actualizar usuario</a></td>";
                        echo "<td><a href='./deluser-proc.php?id_use=".$datas['id_use']."'>Eliminar usuario</a></td>";
                    echo "</tr>";
                }
            ?>

            </table>
        </div>
    </div>
</center>
</body>
</html>