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
    <title>Nuevo usuario</title>
</head>

<body>
    <h1> Nuevo usuario </h1>

    <form action="anyade.php">

        <label>Nombre: </label><input type="text" name="usuario" /> <br /> <br />
        <label>Contraseña: </label><input type="password" name="password" /> <br /> <br />
        <label>Rol: </label><select name="rol">
            <?php
            print_r("holas");
            $consulta = $conexion->query("SELECT * FROM roles");
            while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
                print("<option name=\"rol\" value=\"$fila[nombre]\" >" . $fila['nombre'] . "</option>");
            }
            ?>
        </select>
        <br /> <br />
        <input type="submit" value="Añadir alumno" />
    </form>
</body>


</html>