<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Convertidor de segundos</title>

</head>

<body>
    <h1>Convertidor de segundos a minutos y segundos</h1>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="GET" />
    Segundos: <input type="number" name="segundos"> <br> <br>
    <input type="submit" value="Enviar">
    </form>

    <?php
    function obtenerValor($valor)
    {
        if (!isset($_REQUEST[$valor])) {
            $valor = "";
        } else {
            $valor = trim(strip_tags($_REQUEST[$valor]));
        }
        return $valor;
    }
    ?>
</body>

</html>