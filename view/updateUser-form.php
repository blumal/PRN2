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
<div class="container">
    <div class="form-update">
        <?php
            $id_use = $_GET['id_use'];
            $extractUsers = $pdo->prepare("SELECT * FROM tbl_usuario WHERE id_use = $id_use");
            $extractUsers->execute();
            $extractUsers = $extractUsers->fetchAll(PDO::FETCH_ASSOC);

            foreach ($extractUsers as $datas) {
        ?>
        <h1>Actualización de datos</h1>
        <!--Volvemos a pasar el id del usuario por url -->
        <form action="../services/updateUser-form-proc.php?id_use=<?php echo $datas['id_use'];?>" method="post">
            <h3>Nombre del usuario:</h3>
                <input type="text" name="name_use" size="20" value="<?php echo $datas['nombre_use'];?>" required>
            <h3>Apellido del usuario:</h3>
                <input type="text" name="surname_use" size="20" value="<?php echo $datas['apellido_use'];?>" required>
            <h3>Email:</h3>
                <input type="text" name="mail_use" size="20" value="<?php echo $datas['email_use'];?>" required></br>
                <h3>Tipo de usuario</h3>
                <select name="tipo_use" required>
                    <?php
                        //Extracción de datos de la BBDD. para el select
                        $query = $pdo->prepare("SELECT tipo_use FROM tbl_usuario GROUP BY tipo_use;");
                        $query->execute();
                        $query = $query->fetchAll(PDO::FETCH_ASSOC);
                        echo "<option value = ''></option>";
                            foreach ($query as $result) {
                                echo "<option value='{$result['tipo_use']}'>{$result['tipo_use']}</option>";
                            }
                    ?>
                </select></br></br>
                <!-- <input type="hidden" name="id_use" value="<?php $id_use ?>"> -->
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