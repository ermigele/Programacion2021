<?php
$conexion = new mysqli();
$conexion->connect('localhost', 'root', '', 'ejemplo');
//print "<p>" . $conexion->server_info . "</p>";
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Resultado email</title>
</head>

<body>
    <h1>Resultado busqueda</h1>

    <?php
 
    $email = $_GET['email'];
    print($email);
    $resultado = $conexion->query("SELECT * FROM alumnos WHERE email LIKE . '$email'");
    if ($resultado == false) {
        print("<h2> Ningun email encontrado </h2>");
    } else {
      //  $rows = $resultado->fetch_all(MYSQLI_ASSOC);
      $rows = $resultado->fetch_object();
        foreach ($rows as $alumno)
            print($alumno["email"]);

        print("El email es del alumno: ");
        print_r($rows);
    }
    ?>


</body>

</html>