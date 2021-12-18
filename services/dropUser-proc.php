<?php
try {
    include '../services/connection.php';
    session_start();
    if (isset($_SESSION['email'])){

        $id_use = $_GET['id_use'];

        $dropUser = $pdo->prepare("DELETE FROM tbl_usuario WHERE id_use = ?");
            $dropUser->bindParam(1, $id_use);
        if ($dropUser->execute()){
            echo "<script>alert('Datos eliminados correctamente');</script>";
            echo "<script>window.location.href = '../view/admon.php';</script>";

        }else{
            echo "<script>alert('Algo fue mal en la operación'); return window.location.href = '../view/admon.php';</script>";
        }
    }
} catch (\Throwable $th) {
    throw $th;
}
