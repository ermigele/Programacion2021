<?php
session_name("login");
session_start();

try {
    $mysql = 'mysql:host=localhost;dbname=ejemplo';
    $usuario = 'root';
    $contrasena = '';
    $conexion = new PDO($mysql, $usuario, $contrasena);
} catch (PDOException $e) {
    print "<p>" . $e->getMessage() . "</p>";
    die();
}

if (isset($_REQUEST['login']) || isset($_REQUEST['pass'])) {
}
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <h1> Login </h1>

    <form action="altaAlumnos-03.php" method="POST">

        <label>Usuario: </label><input type="text" name="user" />
        <?php

        ?>
        <br /> <br />
        <label>Contraseña: </label><input type="password" name="pass" /> <br /> <br />
        <?php

        ?>
        <br /> <br />
        <input type="submit" value="Entrar" />
    </form>
</body>


</html>