<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Formulario de respuesta</title>
</head>

<body>
    <h2> Datos recibidos: </h2>
    <?php
    print "<p>Nombre: " .$_REQUEST['nombre']. " <br> Juego: "  .$_REQUEST['juego']."</p>";
    ?>
</body>

</html>