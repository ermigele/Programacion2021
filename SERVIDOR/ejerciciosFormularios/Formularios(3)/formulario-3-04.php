<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Respuesta Cabeceras</title>
</head>

<body>
    <?php
    if (empty($_GET['nombre']) || ($_GET['estatura']  > 70  &&  $_GET['estatura'] < 250)) {
            header("Location: formulario-3-04.html");
        } else{
            print("<h2> Datos recogidos </h2>");
            print("Nombre: ".$_GET['nombre']. "<br />");
            print("Estatura: ".$_GET['estatura']);
        }
    ?>

</body>

</html>