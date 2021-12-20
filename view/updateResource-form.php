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
    <link rel="stylesheet" href="../css/updateUser-form.css">
    <title>Update resource</title>
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
<div class="container">
    <div class="form-update">
        <?php
            $id_mes = $_GET['id_mes'];
            $extractResource2 = $pdo->prepare("SELECT * FROM tbl_mesa WHERE id_mes = $id_mes");
            $extractResource2->execute();
            $extractResource2 = $extractResource2->fetchAll(PDO::FETCH_ASSOC);

            foreach ($extractResource2 as $datas) {
        ?>
        <h1>Actualización de datos</h1>
        <!--Volvemos a pasar el id del usuario por url -->
        <form action="../services/updateResource-proc.php?id_mes=<?php echo $datas['id_mes'];?>" method="post">
            <h3>Nº de mesa</h3>
                <input type="number" name="id_mes" value="<?php echo $datas['id_mes'];?>" required disabled>
            <h3>Capacidad de mesa actual</h3>
                <input type="number" name="capacidad_mes" value="<?php echo $datas['capacidad_mes'];?>" required disabled>
            <h3>Capacidad de mesa a modificar</h3>
                <select name="capacidad_mes" required>
                    <option value = ''></option>
                    <option value = '2'>2</option>
                    <option value = '4'>4</option>
                    <option value = '6'>6</option>
                    <option value = '8'>8</option>
                </select>
            <h3>Sala</h3>
                <select name="sala_mes" required>
                    <?php
                        //Extracción de datos de la BBDD. para el select
                        $query = $pdo->prepare("SELECT * FROM tbl_sala GROUP BY nombre_sal;");
                        $query->execute();
                        $query = $query->fetchAll(PDO::FETCH_ASSOC);
                        echo "<option value = ''></option>";
                            foreach ($query as $result) {
                                echo "<option value='{$result['id_sal']}'>{$result['nombre_sal']}</option>";
                            }
                    ?>
                </select></br></br>
                <!-- <input type="hidden" name="id_use" value=?php $id_use ?>-->
                <input type="submit" name="submit" value="Update">
            <?php
            }
            ?>
        </form></br>
    </div>
</div>

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