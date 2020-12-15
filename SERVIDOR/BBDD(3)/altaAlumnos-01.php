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
            <th>Curso)</th>
        </thead>
        <tbody>
            <?php
            $consulta = $conexion->query("SELECT login, nombre, password, fecha FROM usuarios u INNER JOIN roles r ON u.rol=r.id ORDER BY u.fecha asc");
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
               md5($fila['password']);
                print("<tr><td>" . $fila['login'] . "</td><td>" . $fila['nombre'] . "</td><td>" . $fila['fecha'] . "</td></tr>");
            }
            ?>
        </tbody>
    </table>
    <br />
    <form action="altaUsuarios-02.php">
        <input type="submit" value="Añadir alumno" />
    </form>
</body>


</html>