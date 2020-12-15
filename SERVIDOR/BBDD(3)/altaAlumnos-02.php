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
    <title>Alta alumnos</title>
</head>

<body>
    <h1> Alta alumnos </h1>

    <form action="altaAlumnos-03.php" method="POST">

        <label>Nombre: </label><input type="text" name="nombre" /> <br /> <br />
        <label>Email: </label><input type="text" name="apellidos" /> <br /> <br />
        <label>Curso: </label><select name="curso">
            <?php
            $consulta = $conexion->query("SELECT * FROM cursos");
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                print("<option name=\"rol\" value=\"$fila[codigo]\" >" . $fila['nombre'] . "</option>");
            }
            ?>
        </select>
        <br /> <br />
        <input type="submit" value="Añadir alumno" />
    </form>
</body>


</html>