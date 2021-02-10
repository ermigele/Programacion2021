<?php
try {
  $mysql = 'mysql:host=localhost;dbname=dwes_ene2021';
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

if (isset($_REQUEST['nota']) && empty($_REQUEST['nota']))
  $validado = false;
else if ($_REQUEST['nota'] < 1 || $_REQUEST['nota'] > 10)
  $validado = false;

if (isset($_REQUEST['curso']) && empty($_REQUEST['curso']))
  $validado = false;

if (!$validado) {
  $request = "?nombre=" . $_REQUEST['nombre'] . "&apellidos=" . $_REQUEST['apellidos'] . "&nota=" . $_REQUEST['nota'] ."&curso=".  $_REQUEST['curso'];
  header("Location: ejercicio-04-02.php" . $request);
  $conexion = null;
} else {
  $consulta = $conexion->prepare("INSERT INTO alumnos (nombre, apellidos, nota, curso) values (:nombre, :apellidos, :nota, :curso)");
  $consulta->bindParam(':nombre', $_REQUEST['nombre']);
  $consulta->bindParam(':apellidos', $_REQUEST['apellidos']);
  $consulta->bindParam(':nota',  $_REQUEST['nota']);
  $consulta->bindParam(':curso', $_REQUEST['curso']);
  $consulta->execute();
  header("Location: ejercicio-04-01.php");
}
