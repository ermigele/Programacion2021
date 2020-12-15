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
    <title>Alta usuarios</title>
</head>

<body>
    <?php
    if (!isset($_POST['nombre']) || !isset($_POST['apellidos']) || !isset($_POST['email']) || !isset($_POST['curso'])) {
        header("Location: altaAlumnos-02.php");
    } else {
        $nombre = $_POST["nombre"];
        $apellidos = $_POST["apellidos"];
        $email = $_POST["email"];
        $curso = $_POST["curso"];
    }

    $consulta = $conexion->query("SELECT * FROM alumnos");
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        if ($fila['email'] == $email && $fila['nombre'] == $nombre || $fila['apellidos'] == $apellidos) {
            header("Location: altaAlumnos-02.php");
            $conexion = null;
        }
    }
    $consulta = $conexion->prepare("INSERT INTO alumnos (nombre, apellidos, email, codigo_curso) values (:nombre, :apellidos, :email, :curso)");
    $consulta->bindParam(':nombre', $nombre);
    $consulta->bindParam(':apellidos', $apellidos);
    $consulta->bindParam(':email', $email);
    $consulta->bindParam(':curso', $curso);
    $consulta->execute();
    header("Location: altaAlumnos-01.php");
    ?>


</body>


</html>