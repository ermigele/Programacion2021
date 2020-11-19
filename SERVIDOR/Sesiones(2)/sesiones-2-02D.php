<?php
session_start();
if (isset($_SESSION["encuesta"])) {
    $_SESSION["encuesta"] = [$_REQUEST];
}
print_r($_SESSION["encuesta"]);
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
    print("Se ha contestado ". count( $_SESSION["encuesta"]). " pregunta(s) de un total de ". count( $_SESSION["encuesta"])."");

    print("<ul>");
    print("<li>A la pregunta .............. se ha contestado ...</li>");
    print("</ul>")
    ?>
</body>

</html>