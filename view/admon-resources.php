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
    <link rel="stylesheet" href="../css/admon-resources.css">
    <title>Admon-resources</title>
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
<center>
    <h1>Admin Zone</h1>
    <div class="container">
        <div class="content">
            <table>
                <thead>
                    <tr>
                        <th>Nº de mesa</th>
                        <th>Capacidad de mesa</th>
                        <th>Pertenece a la sala</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $extractResources = $pdo->prepare("SELECT m.id_mes, m.capacidad_mes, s.nombre_sal FROM tbl_mesa m 
                        INNER JOIN tbl_sala s ON m.id_sal_fk=s.id_sal ORDER BY s.nombre_sal DESC;");
                        $extractResources->execute();
                        $extractResources = $extractResources->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($extractResources as $datas) {
                            echo "<tr>";
                                echo "<td>".$datas['id_mes']."</td>";
                                echo "<td>".$datas['capacidad_mes']."</td>";
                                echo "<td>".$datas['nombre_sal']."</td>";
                                echo "<td><a href='./updateResource-form.php?id_mes=".$datas['id_mes']."'>Actualizar mesa</a></td>";
                                echo "<td><a href='../services/dropResource-proc.php?id_mes=".$datas['id_mes']."'>Eliminar mesa</a></td>";
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