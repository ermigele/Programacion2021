<?php
$conexion = new mysqli();
$conexion->connect('localhost', 'root', '', 'ejemplo');
//print "<p>" . $conexion->server_info . "</p>";
?>


<!DOCTYPE html>

<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Añadir alumno</title>
</head>

<body>
    <?php
    $validado = true;

    if (isset($_GET['editar'])) {
        $id = $_GET['editar'];
        $resultado = $conexion->query("SELECT * FROM alumnos WHERE codigo=" . $id);
        $row = $resultado->fetch_array(MYSQLI_ASSOC);
        $nombre = $row['nombre'];
        $apellidos = $row['apellidos'];
        $email = $row['email'];
        $codigocurso = $row['codigo_curso'];
        print_r($row);
    }

    if (isset($_GET['nombre']) || isset($_GET['apellidos']) || isset($_GET['email']) || isset($_GET['codigo_curso'])) {
        if ($_GET['nombre'] == "") {
            print("Error el nombre del alumno no puede estar vacio <br />");
            $validado = false;
        }
        if ($_GET['apellidos'] == "") {
            print("Error los apellidos del alumno no puede estar vacio <br />");
            $validado = false;
        }
        if ($_GET['codigo_curso'] == "") {
            print("Error el curso no puede estar vacio <br />");
            $validado = false;
        }

        if ($validado) {
            $consulta = $conexion->stmt_init();
            if ($id == null) {
                $consulta->prepare("insert into alumnos (nombre, apellidos, email, codigo_curso) values (?,?,?,?)");
                $nombre = $_GET['nombre'];
                $apellidos = $_GET['apellidos'];
                $email = $_GET['email'];
                $codigocurso = $_GET['codigo_curso'];
            } else {
               // $consulta->prepare("UPDATE alumnos SET nombre values (?,?,?,?)");
            }
            $consulta->bind_param('sssi', $nombre, $apellidos, $email, $codigocurso);
            $consulta->execute();
            $consulta->close();

            header("Location: listado.php");
        }
    } else {
    ?>
        <h1>Añadir alumno </h1>

        <form action="">
            <label>Nombre </label> <input type="text" name="nombre" <?php print("value=" . $nombre); ?> /> <br /> <br />
            <label>Apellidos </label> <input type="text" name="apellidos" <?php print("value=" . $apellidos); ?> /> <br /> <br />
            <label>Email </label> <input type="text" name="email" placeholder="nombre@gmail.com" <?php print("value=" . $email); ?> /> <br /> <br />
            <label>Curso </label> <input type="text" name="codigo_curso" <?php print("value=" . $codigocurso); ?> /> <br /> <br />

            <input type="submit" value="Guardar" />
        </form>

    <?php


    }
    ?>

</body>


</html>