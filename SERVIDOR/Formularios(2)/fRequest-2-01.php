<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Formulario de respuesta</title>
</head>

<body>
    <h2> Datos recibidos: </h2>
    <?php
    $segundos = $_REQUEST['segundos'];
    if ($segundos <= 0) {
        print "<p>Introduccido dato erroneo, debe ser superior a 0</p>";
    } else {
        $min =  floor($segundos / 60);
        $seg = $segundos % 60;
        print "<p> Los " . $segundos . " segundos:  " . $min . " minutos y " . $seg . " segundos </p>";
    }
    ?>
</body>

</html>