<?php
$preguntas = $_GET["preguntas"];
$respuestas = $_GET["respuestas"];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Encuesta-2</title>
</head>

<body>
    <h2>Encuesta</h2>
    <p>Escribe el enunciado de cada una de las preguntas</p>
    <form action="sesiones-2-02C.php">
        <?php
        for ($i = 1; $i <= $preguntas; $i++) {
            print("Pregunta " . $i . ":");
            print("<input type=\"text\" name=\"pregunta$i\"> <br /> <br />");
        }
        print("<input type=\"hidden\" name=\"respuestas\" value=\"$respuestas\">");
        ?>

        <input type="submit" value="Generar">
    </form>

</body>

</html>