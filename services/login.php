<?php
    include_once './connection.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $stmt=$pdo->prepare("SELECT * FROM `tbl_usuario` WHERE pwd_use=? and email_use=?");
    $stmt->bindParam(1, $password);
    $stmt->bindParam(2, $username);


    $stmt->execute();

    $num=$stmt->fetch(PDO::FETCH_ASSOC);
    $num2=$stmt->rowCount(); //Cuenta el resultado, si es 1 o 0

    echo $num['tipo_use'];
    //Recogemos el tipo de usuario para efectuar una redirección u otra
    try {
        if ($num2==1){
            session_start();
            $_SESSION['email']=$username;
            if ($num['tipo_use'] == 'Admin') {
                header("Location:../view/admon.php");
            }else{
                header("Location:../view/menu.php");
            }
        }else{
            header("Location:../view/login.php");
        }
    }catch(PDOException $e){
        header("Location:../view/login.php");
    }

