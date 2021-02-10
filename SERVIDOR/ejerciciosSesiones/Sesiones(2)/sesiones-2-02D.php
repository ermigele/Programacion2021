<?php
session_start();
if (!isset($_SESSION["encuesta"])) {
    $_SESSION["encuesta"] = [$_REQUEST];
} else {
    array_push($_SESSION["encuesta"], $_REQUEST);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Encuesta(Resultado)</title>
</head>

<body>
    <h1>Encuesta(Resultado)</h1>
    <?php
    print("<ul>");
    foreach ($_SESSION["encuesta"] as $clave => $array) {
        foreach ($array as $clave2 => $valor)
            print("<li>A la pregunta " . $clave2 . " se ha contestado " . $valor . " </li>");
    }
    print("</ul>")
    ?>
</body>

</html>