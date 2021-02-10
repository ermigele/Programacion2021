<?php

header("Access-Control-Allow-Origin: *"); // allow request from all origin
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,PATCH,OPTIONS');
header("Access-Control-Allow-Headers: Access-Control-Allow-Headers, Origin, X-Requested-With, Content-Type, Accept, Authorization");

header('Content-Type: application/json');  //  Todo se devolverá en formato JSON.


//  Si no se recibe el parámetro servicio. NOS VAMOS!!!!
if (!isset($_GET["servicio"]))
	return;

include("../conexion/conexion.php");
//  Para poder obtener el resultset en forma de array asociativo
//  debemos de usar la función Conectar2:
$conn = Conectar2("provincias_localidades", "root", "");


//  Recogemos el servicio que se desea del servidor:
$servicio = $_GET["servicio"];

switch ($servicio) {
    case "provincias":
        listadoProvincias();
        break;
    case "localidades":
				listadoLocalidades();
        break;
}

function listadoProvincias() {
	global $conn;
	$rs = Consulta($conn, "Select * From provincias");
	//  Devolvemos la filas del cuerpo de la tabla:
	print json_encode($rs->fetchAll(PDO::FETCH_ASSOC));
}

function listadoLocalidades() {
	global $conn;
	$cp = -1;
	if (isset($_GET["codigop"]))
		$cp = $_GET["codigop"];
	
	$sc = "Select * From localidades Where CODIGO_PROVINCIA = " . $cp;
	$rs = Consulta($conn, $sc);
	//  Devolvemos la filas del cuerpo de la tabla:
	print json_encode($rs->fetchAll(PDO::FETCH_ASSOC));
}

?>




