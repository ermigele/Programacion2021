<?php
print_r($_REQUEST);
$conexion=new mysqli ();
$conexion->connect('localhost','root',"",'ejemplo');

$consulta = $conexion->stmt_init();
$consulta->prepare("insert into alumnos (nombre, apellidos, email, codigocurso) values (?,?,?,?)");
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$codigocurso = $_POST['codigocurso'];

        $consulta->bind_param('sssi', $nombre, $apellidos, $email, $codigocurso);
        $consulta->execute();

        $conexion->close();
        header("Location:../listado.php");
?>