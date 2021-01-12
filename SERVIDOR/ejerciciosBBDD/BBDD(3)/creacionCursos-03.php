<?php
$mysql = 'mysql:host=localhost;dbname=ejemplo';
$usuario = 'root';
$contrasena = '';
$conexion = new PDO($mysql, $usuario, $contrasena);
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Creacion de curso</title>
</head>

<body>
    <?php
    if (!isset($_GET['nombre']))
        header("Location: creacionRoles-02.html");
    else
        $nombre = $_GET["nombre"];

    $consulta = $conexion->query("SELECT * FROM cursos");
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        if ($fila['nombre'] == $nombre) {
            header("Location: creacionCursos-02.html");
            $conexion = null;
        }
    }
    $consulta = $conexion->prepare("INSERT INTO cursos (nombre) values (:nombre)");
    $consulta->bindParam(':nombre', $nombre);
    $consulta->execute();
    header("Location: creacionCursos-01.php");
    ?>


</body>


</html>