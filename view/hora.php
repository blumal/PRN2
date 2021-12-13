<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        Día <br>
        <input type="date" name="date"></br>
        Hora de llegada  <br>
        <input type="time" name="time1"></br>
        Personas  <br>
        <input type="number" name="time1"></br>
        <input type="submit">
    </form>
</body>
    <?php
        $date = $_POST['date'];
        $arrive = $_POST['time1'];
        $leave = $_POST['time2'];
        echo "Día de reserva: ".$date;
        echo "<br>";
        echo "Hora de llegada: ".$arrive;
        echo "<br>";
        echo "Hora fin de reserva: ".$leave;
    ?>
</html>