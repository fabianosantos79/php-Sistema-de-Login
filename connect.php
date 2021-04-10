<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$bancoDados = 'canal_ti_login';

$conexao = mysqli_connect($servidor, $usuario, $senha, $bancoDados,) or die ('Não foi possivel conectar ao banco de dados');

?>