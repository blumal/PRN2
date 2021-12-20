<?php
    try {
        include '../services/connection.php';
        session_start();
        if (isset($_SESSION['email'])){
    
            $id_mes = $_GET['id_mes'];
            $capacidad_mes = $_POST['capacidad_mes'];
            $sala_mes = $_POST['sala_mes'];
            
            $updateresource = $pdo->prepare("UPDATE tbl_mesa SET capacidad_mes=?, id_sal_fk=? WHERE id_mes=?;");
                $updateresource->bindParam(1, $capacidad_mes);
                $updateresource->bindParam(2, $sala_mes);
                $updateresource->bindParam(3, $id_mes);
            if ($updateresource->execute()){
                echo "<script>alert('Datos actualizados correctamente');</script>";
                echo "<script>window.location.href = '../view/admon-resources.php';</script>";
    
            }else{
                echo "<script>alert('Algo fue mal en la operación');</script>";
                echo "<script>window.location.href = '../view/admon-resources.php';</script>";
            }
        }
    } catch (\Throwable $th) {
        throw $th;
    }

/* ALTER TABLE `db_2122_blumtorresalfredo`.`tbl_reserva` 
DROP FOREIGN KEY `fk_mesa_reserva`;
ALTER TABLE `db_2122_blumtorresalfredo`.`tbl_reserva` 
ADD CONSTRAINT `fk_mesa_reserva`
  FOREIGN KEY (`id_mes_fk`)
  REFERENCES `db_2122_blumtorresalfredo`.`tbl_mesa` (`id_mes`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION; */

