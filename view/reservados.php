<?php
    try {
        session_start();
        if (isset($_SESSION['email']))
        {
            include_once '../services/connection.php';
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/reservados.css">
    <title>Reservados</title>
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
<div class="container">
    <div class="reservadosHist">
        <center>
        <h1>Reservados</h1>
        <table border="1px">
        <form action="#" method="POST">
            <tr>
                <th><input type="number" id="" name="id_res" placeholder="Número de reserva"></th>
                <th><input type="date" name="date_res" min=<?php $today=date("Y-m-d"); echo $today;?>/></th>
                <th><h3>Hora:</h3>
                            <select name="hour_res" id="">
                                <optgroup label="Comida">
                                    <option value="13:00">13:00h</option>
                                    <option value="13:30">13:30h</option>
                                    <option value="14:00">14:00h</option>
                                    <option value="14:30">14:30h</option>
                                    <option value="15:00">15:00h</option>
                                    <option value="15:30">15:30h</option>
                                    <option value="16:00">16:00h</option>
                                    <option value="16:30">16:30h</option>
                                <optgroup label="Cena">
                                    <option value="20:30">20:30h</option>
                                    <option value="21:00">21:00h</option>
                                    <option value="21:30">21:30h</option>
                                    <option value="22:00">22:00h</option>
                                    <option value="22:30">22:30h</option>
                                    <option value="23:00">23:00h</option>
                                    <option value="23:30">23:30h</option>
                            </select></th>
                <th><h3>Mail Reserva: <input type="email_res" id="" name="email_res" placeholder="ej: paco@test.com"></h3></th>
                <th><h3> Datos: <input type="text" id="" name="datos_res" placeholder="Nombre, teléfono, etc..."></h3></th>
                <th><h3> Camarer@: <select name="user_res"></h3><?php
                        //Extracción de datos de la BBDD. para el select
                        $query = $pdo->prepare("SELECT * FROM tbl_usuario GROUP BY email_use;");
                        $query->execute();
                        $query = $query->fetchAll(PDO::FETCH_ASSOC);
                        echo "<option value = ''></option>";
                            foreach ($query as $result) {
                                echo "<option value='{$result['nombre_use']}'>{$result['nombre_use']}</option>";
                            }
                    ?></select></th>
                <th><h3> Nº de mesa: <input type="number" id="" name="id_mes"></h3></th>
                <th><h3> Sala: <select name="nombre_sal"></h3><?php
                        //Extracción de datos de la BBDD. para el select
                        $query = $pdo->prepare("SELECT * FROM tbl_sala GROUP BY nombre_sal;");
                        $query->execute();
                        $query = $query->fetchAll(PDO::FETCH_ASSOC);
                        echo "<option value = ''></option>";
                            foreach ($query as $result) {
                                echo "<option value='{$result['nombre_sal']}'>{$result['nombre_sal']}</option>";
                            }
                    ?></select></th>
                    <th><input type="submit" value="Filtrar" name="submit"></th>
            </tr>
        </form>
        </table>
        </center>
    </div>

    <?php
        if (!isset($_POST['submit'])) {
            $id_res_ = $_POST['id_res'];
            $date_res = $_POST['date_res'];
            $hour_res = $_POST['hour_res'];
                $timestamp = strtotime("$hour_res"); //Convertimos el string a formato fecha
                $correct_date_format = date('H:i:s', $timestamp); // Asignamos el correcto formato al string anterior
                $correctDate = $correct_date_format;
            $email_res = $_POST['email_res'];
            $datos_res = $_POST['datos_res'];
            $user_res = $_POST['user_res'];
            $nombre_sal = $_POST['nombre_sal'];

            $queryGeneral = "SELECT r.id_res, r.fechas_res, r.hora_res, r.email_res, r.datos_res, u.nombre_use, m.id_mes, s.nombre_sal
            FROM tbl_reserva r
            INNER JOIN tbl_usuario u ON r.id_use_fk=u.id_use 
            INNER JOIN tbl_mesa m ON r.id_mes_fk=m.id_mes
            INNER JOIN tbl_sala s ON m.id_sal_fk=s.id_sal";
        }else{
            $queryGeneral = "SELECT r.id_res, r.fechas_res, r.hora_res, r.email_res, r.datos_res, u.nombre_use, m.id_mes, s.nombre_sal
            FROM tbl_reserva r
            INNER JOIN tbl_usuario u ON r.id_use_fk=u.id_use 
            INNER JOIN tbl_mesa m ON r.id_mes_fk=m.id_mes
            INNER JOIN tbl_sala s ON m.id_sal_fk=s.id_sal WHERE id_res LIKE '%%'";

            if(isset($_POST['id_res'])){
                $id_res = $_POST['id_res'];
                $queryid_res = "AND r.id_res LIKE '%$id_res%'";
                $queryGeneral = $queryGeneral.$queryid_res;
            }

            if(isset($_POST['fecha_res'])){
                $fecha_res = $_POST['fecha_res'];
                $queryfecha_res = "AND r.fecha_res LIKE '%$fecha_res%'";
                $queryGeneral = $queryGeneral.$queryfecha_res;
            }

            if(!empty($_POST['horaFin_res'])){//hacerlo con addtime
                $horaFin_res = $_POST['horaFin_res'];
                $queryhoraFin = "AND r.horaFin_res LIKE '%$horaFin_res%'";
                $queryGeneral = $queryGeneral.$queryhoraFin;
            }

            if(isset($_POST['datos_res'])){
                $datos_res = $_POST['datos_res'];
                $querydatos_res = "AND r.datos_res LIKE '%$datos_res%'";
                $queryGeneral = $queryGeneral.$querydatos_res;
            }

            if(isset($_POST['nombre_use'])){
                $nombre_use = $_POST['nombre_use'];
                $querynombreuse = "AND u.nombre_use LIKE '%$nombre_use%'";
                $queryGeneral = $queryGeneral.$querynombreuse;
            }

            if(isset($_POST['id_mes'])){
                $id_mes = $_POST['id_mes'];
                $queryidmes = "AND m.id_mes LIKE '%$id_mes%'";
                $queryGeneral = $queryGeneral.$queryidmes;
            }

            if(isset($_POST['nombre_sal'])){
                $nombre_sal = $_POST['nombre_sal'];
                $querynombresal = "AND s.nombre_sal LIKE '%$nombre_sal%'";
                $queryGeneral = $queryGeneral.$querynombresal;
            }
        }

    ?>

                <tr>
                    <th>ID reserva</th>
                    <th>Inicio</th>
                    <th>Final</th>
                    <th>Nombre reserva</th>
                    <th>Responsable reserva</th>
                    <th>Mesa</th>
                    <th>Sala</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $datas) { ?>
                <tr>
                    <td><?php echo $datas['id_res'] ?></td>
                    <td><?php echo $datas['horaIni_res'] ?></td>
                    <td><?php echo $datas['horaFin_res'] ?></td>
                    <td><?php echo $datas['datos_res'] ?></td>
                    <td><?php echo $datas['nombre_use'] ?></td>
                    <td><?php echo $datas['id_mes'] ?></td>
                    <td><?php echo $datas['nombre_sal'] ?></td>
                </tr>

                <?php } ?>
            </tbody>
        </table>
  
    
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