<?php
try {
    include '../services/connection.php';
    session_start();
    if (isset($_SESSION['email'])){

        $id_mes = $_GET['id_mes'];

        $dropResource = $pdo->prepare("DELETE FROM tbl_mesa WHERE id_mes = ?");
            $dropResource->bindParam(1, $id_mes);
        if ($dropResource->execute()){
            echo "<script>alert('Datos eliminados correctamente');</script>";
            echo "<script>window.location.href = '../view/admon-resources.php';</script>";

        }else{
            echo "<script>alert('Algo fue mal en la operación');</script>";
            echo "<script>window.location.href = '../view/admon-resources.php';</script>";
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