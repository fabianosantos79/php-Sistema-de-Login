<?php
session_start();
include 'connect.php';

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

if(empty($nome) or empty($usuario) or empty($senha)){
    header('Location:cadastro.php');
    exit();
}

$sql = "SELECT usuario FROM clientes WHERE usuario = '$usuario'";
$query = mysqli_query($conexao, $sql);
$resultado = mysqli_num_rows($query);

if($resultado === 1){
    $_SESSION['usuario_existe'] = true;
    header('Location:cadastro.php');
    exit();
}

    $inserir = "INSERT INTO clientes (nome, usuario, senha, data_cadastro) VALUES ('$nome', '$usuario', '$senha', NOW())";
    $query2 = mysqli_query($conexao, $inserir);

    if($query2){
        $_SESSION['usuario_cadastrado'] = true;
        header('Location:cadastro.php');
        exit();
    }
    else{
        $_SESSION['usuario_existe'] = true;
        header('Location:cadastro.php');
        exit();
    }

?>