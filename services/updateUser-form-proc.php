<?php
try {
    include '../services/connection.php';
    session_start();
    if (isset($_SESSION['email'])){

        $id_use = $_GET['id_use'];
        $name_use = $_POST['name_use'];
        $surname_use = $_POST['surname_use'];
        $mail_use = $_POST['mail_use'];
        $tipo_use = $_POST['tipo_use'];

        $updateUser = $pdo->prepare("UPDATE tbl_usuario SET nombre_use=?, apellido_use=?, email_use=?, tipo_use=? WHERE id_use=?;");
            $updateUser->bindParam(1, $name_use);
            $updateUser->bindParam(2, $surname_use);
            $updateUser->bindParam(3, $mail_use);
            $updateUser->bindParam(4, $tipo_use);
            $updateUser->bindParam(5, $id_use);
        if ($updateUser->execute()){
            echo "<script>alert('Datos actualizados correctamente');</script>";
            echo "<script>window.location.href = '../view/admon.php';</script>";

        }else{
            echo "<script>alert('Algo fue mal en la operación'); return window.location.href = '../view/admon.php';</script>";
        }
    }
} catch (\Throwable $th) {
    throw $th;
}
