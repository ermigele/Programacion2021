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
    <h1> Creacion de roles </h1>

    <form action="creacionRoles-02.html">

        <table border="1.5">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
            </thead>
            <?php
            $consulta = $conexion->query("SELECT * FROM roles");
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                print("<tr><td>" . $fila['id'] . "</td><td>" . $fila['nombre'] . "</td></tr>");
            }
            ?>
        </table>
        <br /> <br />
        <input type="submit" value="Añadir" />
    </form>
</body>


</html>