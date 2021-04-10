<?php
session_start();
include_once 'connect.php';

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

if(empty($usuario) or empty($senha)){
    header('Location: index.php');
}

$sql = "SELECT nome FROM `clientes` WHERE usuario = '$usuario' AND senha = md5($senha)";
$resultado = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
$dados = mysqli_num_rows($resultado);

if($dados == 1){
    $usuario_bd = mysqli_fetch_assoc($resultado);
    $_SESSION['nome'] = $usuario_bd['nome'];
    header('Location: painel.php');
    exit();
}else{
    $_SESSION['nao-autenticado'] = true;
    header('Location: index.php');
    exit();
}

?>