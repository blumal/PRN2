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
            echo "<script>alert('Algo fue mal en la operación');</script>";
            echo "<script>window.location.href = '../view/admon.php';</script>";
        }
    }
} catch (\Throwable $th) {
    throw $th;
}

//SE HA PODIDO EFECTUAR GRACIAS A WORKBENCH
//Mediante este comnado actualizo la tabla(fk) para poder eliminar en cascada, ya que no se puede elimniar un dato, con datos asociados. 

/* ALTER TABLE `db_2122_blumtorresalfredo`.`tbl_reserva` 
DROP FOREIGN KEY `fk_usuario_reserva`;
ALTER TABLE `db_2122_blumtorresalfredo`.`tbl_reserva` 
ADD CONSTRAINT `fk_usuario_reserva`
  FOREIGN KEY (`id_use_fk`)
  REFERENCES `db_2122_blumtorresalfredo`.`tbl_usuario` (`id_use`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION; */