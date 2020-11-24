<?php
$conexion = new mysqli();
$conexion->connect('localhost', 'root', '', 'ejemplo');
//print "<p>" . $conexion->server_info . "</p>";
?>

<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Listado de alumnos</title>
</head>

<body>
    <h1> Listado de alumnos </h1>

    <table border="1.5">
        <thead>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Curso </th>
        </thead>
        <thbody>
            <?php
            $resultado = $conexion->query("SELECT * FROM alumnos");
            $rows = $resultado->fetch_all(MYSQLI_ASSOC);
            foreach ($rows as $alumno) {
                print("<tr>");
                foreach ($alumno as $clave => $valor)
                    if ($clave != "codigo")
                        print("<td>" . $valor . "</td>");
            }
            print("</tr>");
            ?>
        </thbody>
    </table>
    <br />
    <form action="anyadeAlumno.php">
        <input type="submit" value="Añadir alumno" />
    </form>
</body>


</html>