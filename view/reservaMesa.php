<!DOCTYPE html>
<?php
try {
    session_start();
    if (isset($_SESSION['email']))
    {
        include_once '../services/sala.php';
        include_once '../services/mesa.php';
        include_once '../services/connection.php';
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../js/code.js"></script>
    <link rel="stylesheet" href="../css/reserva.css">
    <title>Reserva</title>
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
    <h1>Reservas</h1>
</center>
<div class="container">
    <center>
        <div class="form-res">
            <form action="#" method="post">
                <h3>Fecha:</h3>
                    <input type="date" name="date_res" min=<?php $today=date("Y-m-d"); echo $today;?> />
                <h3>Hora:</h3>
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
                    </select>
                <!-- La cantidad de personas de la mesa, se recupera por url $ -->
                <!-- <h3>Cantidad de personas</h3>
                    <input type="number" placeholder="Cantidad de personas" required> -->
                <h3>Email de contacto:</h3>
                    <input type="text" name="mail_res" placeholder="example@gmail.com" size="30">
                <h3>Datos de reserva:</h3>
                <input type="text" name="datas_res" placeholder="Datos de la reserva, como el nombre por ejemplo..." size="30"></br></br></br></br>
                <input type="submit" name="submit" value="Reservar">
            </form>
        </div>
    </center>
    <?php
        $id_mes = $_GET['id_mes'];
        $date_mes = $_POST['date_mes'];
        $hour_res = $_POST['hour_res'];
        $timestamp = strtotime("$hour_res"); //Convertimos el string a formato fecha
        $correct_date_format = date('H:i:s', $timestamp); // Asignamos el correcto formato al string anterior
        $mail_res = $_POST['mail_res'];
        $datas_res = $_POST['datas_res'];

        $reservaMes=$pdo->prepare("INSERT INTO tbl_reserva (fecha_res, hora_res, datos_res, id_use_fk, id_mes_fk, email_res) 
        VALUES ('$date_mes', '$correct_date_format', '$datas_res', '1', '56', 'ewff');");
        $reservaMes->execute();
        $reservaMes = $reservaMes->fetch(PDO::FETCH_NUM);
    
        $timestamp = strtotime("$hour_res");
        $correct_date_format = date('H:i:s', $timestamp);

        //echo $timestamp;
        
        echo $correct_date_format;
        
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
    
