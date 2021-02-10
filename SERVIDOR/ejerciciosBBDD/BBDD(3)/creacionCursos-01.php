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
    <title>Creacion Cursos</title>
</head>

<body>
    <h1> Listado cursos </h1>


    <table border=1.5>
        <thead>
            <th>Codigo</th>
            <th>Nombre</th>
        </thead>
        <tbody>
            <?php
            $consulta = $conexion->query("SELECT * FROM cursos");
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                print("<tr><td>" . $fila['codigo'] . "</td><td>" . $fila['nombre'] . "</td></tr>");
            }
            ?>
        </tbody>
    </table>
    <br />
    <form action="creacionCursos-02.html">
        <input type="submit" value="Añadir curso" />
    </form>
</body>


</html>