<?php
    session_start();
    include_once 'connect.php';

    if(!$usuario = $_SESSION['nome']){
        header('Location:index.php');
        exit;
    }else{
        echo "<h2>Olá $usuario, seja bem vindo!<h2>";
    }
?>
 <a href="logout.php">Sair</a>