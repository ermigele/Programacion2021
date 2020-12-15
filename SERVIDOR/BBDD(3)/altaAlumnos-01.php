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
    <h1> Listado alumnos </h1>

    <table border=1.5>
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Curso</th>
        </thead>
        <tbody>
            <?php
            $consulta = $conexion->query("SELECT a.nombre as nombre, apellidos, email, c.nombre as curso FROM alumnos a INNER JOIN cursos c ON a.codigo_curso=c.codigo ORDER BY apellidos asc");
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                print("<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['apellidos'] . "</td><td>" . $fila['email'] . "</td><td>" . $fila['curso'] . "</td></tr>");
            }
            ?>
        </tbody>
    </table>
    <br />
    <form action="altaAlumnos-02.php">
        <input type="submit" value="Añadir alumno" />
    </form>
</body>


</html>