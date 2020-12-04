<?php
session_start();
if (!isset($_SESSION['dados'])) {
	header("Location: ejercicio-02-01.php");
}

$opc = $_REQUEST["tirada"];

if ($opc == "Volver a empezar") {
	session_destroy();
} else {
	$dados = [];
	$suma = $_SESSION['dados'][2];
	for ($i = 0; $i < 6; $i++) {
		$d = rand(1, 6);
		$suma += $d;
		array_push($dados, $d);
	}
	$_SESSION['dados'][0] = $dados;
	$dadosUnicos = array_unique($dados);
	foreach ($dadosUnicos as $clave => $valor)
		$_SESSION['dados'][1] += $clave;
	$_SESSION['dados'][2] = $suma;
}
header("Location: ejercicio-02-01.php");
