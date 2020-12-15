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
    if (!isset($_POST['usuario']) || !isset($_POST['rol']) || !isset($_POST['password'])) {
        header("Location: altaUsuarios-02.php");
    } else {
        $user = $_POST["usuario"];
        $pass = md5($_POST["password"]);
        $rol = $_POST["rol"];
    }

    $consulta = $conexion->query("SELECT * FROM usuarios");
    while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        if ($fila['login'] == $user) {
            header("Location: altaUsuarios-02.php");
            $conexion = null;
        }
    }
    $consulta = $conexion->prepare("INSERT INTO usuarios (login, password, rol) values (:user, :pass, :rol)");
    $consulta->bindParam(':user', $user);
    $consulta->bindParam(':pass', $pass);
    $consulta->bindParam(':rol', $rol);
    $consulta->execute();
    header("Location: altaUsuarios-01.php");
    ?>


</body>


</html>