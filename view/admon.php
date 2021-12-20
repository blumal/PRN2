<?php
    try {
        include_once '../services/connection.php';
        session_start();
        if (isset($_SESSION['email'])){
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
                    echo "<li class='opcionesMenu'>Hola Adm ".$_SESSION['email']."</li>";
                    echo "<li><a class='opcionesMenu' href='./admon.php'>Administración de Usuarios</a></li>";
                    echo "<li><a class='opcionesMenu' href='./admon-resources.php'>Administración de Mesas</a></li>";
                    echo "<li><a class='opcionesMenu' href='../services/kill-login.php'>Log out</a></div>";
                ?>
            </ul>
        </nav>
    </div>
</header>
<center></br>
    <div class="container">
        <div class="content">
        <h1>Admin zone</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nombre del empleado</th>
                        <th>Apellido del empleado</th>
                        <th>Email</th>
                        <th>Perfil</th>
                        <th>UPDATE</th>
                        <th>DELETE</th>
                    </tr>
                <thead>
                <tbody>
                <?php
                        $extractUsers = $pdo->prepare("SELECT * FROM tbl_usuario ORDER BY tipo_use DESC");
                        $extractUsers->execute();
                        $extractUsers = $extractUsers->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($extractUsers as $datas) {
                            echo "<tr>";
                                echo "<td>".$datas['nombre_use']."</td>";
                                echo "<td>".$datas['apellido_use']."</td>";
                                echo "<td>".$datas['email_use']."</td>";
                                echo "<td>".$datas['tipo_use']."</td>";
                                echo "<td><a href='./updateUser-form.php?id_use=".$datas['id_use']."'>Actualizar usuario</a></td>";
                                //Mediante este condicional comparamos el current login user(email) con los datos obtenidos de la db, si el email coincide no sé podrá entrar al apartado delete
                                if ($_SESSION['email'] == $datas['email_use']) {
                                    echo "<td>Action banned</td>";
                                }else{
                                    echo "<td><a href='../services/dropUser-proc.php?id_use=".$datas['id_use']."'>Eliminar usuario</a></td>";
                                }
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</center>
<?php
    }else{
        header("Location:../view/login.php");
    }
} catch (\Throwable $th) {
    throw $th;
}

?>
</body>
</html>