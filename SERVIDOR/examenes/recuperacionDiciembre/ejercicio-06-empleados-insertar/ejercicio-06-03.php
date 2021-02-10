<?php
try {
  $mysql = 'mysql:host=localhost;dbname=dwes_dic2020';
  $usuario = 'root';
  $contrasena = '';
  $conexion = new PDO($mysql, $usuario, $contrasena);
} catch (PDOException $e) {
  print "<p>" . $e->getMessage() . "</p>";
}
$request = "";
$validado = true;
if (isset($_REQUEST['nombre']) && empty($_REQUEST['nombre']))
  $validado = false;

if (isset($_REQUEST['apellidos']) && empty($_REQUEST['apellidos']))
  $validado = false;

if (isset($_REQUEST['salario']) && empty($_REQUEST['salario']))
  $validado = false;
else if ($_REQUEST['salario'] < 15000 || $_REQUEST['salario'] > 60000)
  $validado = false;

if (isset($_REQUEST['hijos']) && strlen($_REQUEST['hijos']) == 0)
  $validado = false;

if (isset($_REQUEST['nacionalidad']) && empty($_REQUEST['nacionalidad']))
  $validado = false;

if (isset($_REQUEST['departamento']) && empty($_REQUEST['departamento']))
  $validado = false;

if (!$validado) {
  $request = "?nombre=" . $_REQUEST['nombre'] . "&apellidos=" . $_REQUEST['apellidos'] . "&salario=" . $_REQUEST['salario'] . "&hijos=" . $_REQUEST['hijos'] . "&nacionalidad=" . $_REQUEST['nacionalidad'] . "&departamento=" .  $_REQUEST['departamento'];
  header("Location: ejercicio-06-02.php" . $request);
  $conexion = null;
} else {
  $consulta = $conexion->prepare("INSERT INTO empleados (nombre, apellidos, salario, hijos, nacionalidad, departamento) values (:nombre, :apellidos, :salario, :hijos, :nacionalidad, :departamento)");
  $consulta->bindParam(':nombre', $_REQUEST['nombre']);
  $consulta->bindParam(':apellidos', $_REQUEST['apellidos']);
  $consulta->bindParam(':salario',  $_REQUEST['salario']);
  $consulta->bindParam(':hijos', $_REQUEST['hijos']);
  $consulta->bindParam(':nacionalidad', $_REQUEST['nacionalidad']);
  $consulta->bindParam(':departamento', $_REQUEST['departamento']);
  $consulta->execute();
  header("Location: ejercicio-06-01.php");
}
