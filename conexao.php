<?php 

$hostname = "127.0.0.1";
$bancodedados = "banco1";
$usuario = "root";
$senha = "";

$mysqli = new mysqli($hostname, $usuario, $senha, $bancodedados);
mysqli_set_charset($mysqli,"utf8");

if ($mysqli->error) {
	echo("Falha ao conectar: " . $mysqli->error);
}
?>