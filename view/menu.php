<!DOCTYPE html>
    <?php
    try {
        session_start();
        if (isset($_SESSION['email']))
        {
            include_once '../services/sala.php';
            include_once '../services/mesa.php';
            include_once '../services/connection.php';
            $salas=$pdo->prepare("SELECT * from tbl_sala");
            $salas->execute();
            $salas=$salas->fetchAll(PDO::FETCH_ASSOC);
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salas</title>
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
    <div class="menu">
        <nav>
            <ul>
                <?php
                    echo "<li class='opcionesMenu'>Hola ".$_SESSION['email']."</li>";
                    echo "<li><a class='opcionesMenu' href='./menu.php'>Home</a></li>";
                    echo "<li><a class='opcionesMenu' href='./reservados.php'>Reservados</a></li>";
                    echo "<li><div class='logout'><a class='opcionesMenu' href='../services/kill-login.php'>Log out</a></div>";
                ?>
            </ul>
        </nav>
    </div>
</header>
    <div class="row container">
    <center>
        <h1>Salas</h1>
    </center>
    <?php
        foreach ($salas as $salas) {
            $capacidad_libre=$pdo->prepare("SELECT SUM(capacidad_mes) from tbl_mesa where id_sal_fk=?");
            $capacidad_libre->bindParam(1, $salas['id_sal']);
            $capacidad_libre->execute();
            $capacidad_libre = $capacidad_libre->fetch(PDO::FETCH_NUM);

            $cantidad_mes=$pdo->prepare("SELECT COUNT(id_mes) AS 'cantidad' FROM tbl_mesa WHERE id_sal_fk = ?");
            $cantidad_mes->bindParam(1, $salas['id_sal']);
            $cantidad_mes->execute();
            $cantidad_mes=$cantidad_mes->fetchAll(PDO::FETCH_ASSOC);
                
            $mesas_libres=$pdo->prepare("SELECT * from tbl_mesa WHERE status_mes = 'Libre' && id_sal_fk = ?");
            $mesas_libres->bindParam(1, $salas['id_sal']);
            $mesas_libres->execute();
            $mesas_libres=$mesas_libres->fetchAll(PDO::FETCH_ASSOC);


            $mesas_ocupadas=$pdo->prepare("SELECT * from tbl_mesa WHERE status_mes = 'Ocupado/Reservado' && id_sal_fk = ?");
            $mesas_ocupadas->bindParam(1, $salas['id_sal']);
            $mesas_ocupadas->execute();
            $mesas_ocupadas=$mesas_ocupadas->fetchAll(PDO::FETCH_ASSOC);
    ?>
        <div class='salas'>
            <h2>Nombre de sala: <?php echo $salas['nombre_sal'] ?></h2>
            <h3>Aforo máximo de sala: <?php echo $salas['capacidad_sal'] ?> personas </h3>
            <h3>Cantidad de mesas: <?php foreach($cantidad_mes as $row){echo $row['cantidad'];} ?> mesas</h3>
            <a href="./sala.php?id_sal=<?php echo $salas['id_sal']?>">Mostrar sala</a>
        </div>
    <?php
        } 
    ?>
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

