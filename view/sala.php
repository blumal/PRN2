<?php //mirar si esta la sesion iniciada
    try {
        include_once '../services/mesa.php';
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
    <title>Mesas</title>
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/mesas.css">
</head>
<body>
<header>
    <div class="menu">
        <nav>
            <ul>
                <?php
                    echo "<li class='opcionesMenu'>Hola ".$_SESSION['email']."</li>";
                    echo "<li><a class='opcionesMenu' href='./menu.php'>Home</a></li>";
                    echo "<li><div class='logout'><a class='opcionesMenu' href='../services/kill-login.php'>Log out</a></div>";
                ?>
            </ul>
        </nav>
    </div>
</header>
<center>
    <?php
        $id_sal = $_GET['id_sal'];
        $sala=$pdo->prepare("SELECT nombre_sal from tbl_sala WHERE id_sal = $id_sal");
        $sala->execute();
        $sala = $sala->fetch(PDO::FETCH_NUM);
    ?>
    <h1>Mesas sala <?php echo $sala[0]?></h1>
</center>
    <div class="row container">
            <?php
                $id_sal = $_GET['id_sal'];
                //echo $id_sal;
                $mesa=$pdo->prepare("SELECT * from tbl_mesa WHERE id_sal_fk = $id_sal");
                $mesa->execute();
                $mesa=$mesa->fetchAll(PDO::FETCH_ASSOC);

                foreach ($mesa as $mesa) {
                    echo "<div class='card'>";
                        echo "<div class='mesas'>";
                        echo "<p>Mesa nº ".$mesa['id_mes']."</p>";
                        echo "<p>Capacidad de comensales: ".$mesa['capacidad_mes']."</p>";
                        echo "<p>Estado: ".$mesa['status_mes']."</p>";
                        echo "<a href='./reservaMesa.php?id_mes=".$mesa['id_mes']."'>Reservar mesa</a>";
                        echo "</div>";
                    echo "</div>";
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