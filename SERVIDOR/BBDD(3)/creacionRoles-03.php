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
    <title>Creacion de roles</title>
</head>

<body>
    <?php
    if (!isset($_GET['nombre']))
        header("Location: creacionRoles-02.html");
    else
        $nombre = $_GET["nombre"];

    $consulta = $conexion->query("SELECT * FROM roles");
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        if ($fila['nombre'] == $nombre) {
            header("Location: creacionRoles-02.html");
            $conexion = null;
        }
    }
    $consulta = $conexion->prepare("INSERT INTO roles (nombre) values (:nombre)");
    $consulta->bindParam(':nombre', $nombre);
    $consulta->execute();
    header("Location: creacionRoles-01.php");
    ?>


</body>


</html>