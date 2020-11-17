<?php
session_start();
$_SESSION["encuesta"] = [];
$preguntas = $_GET["pre"];
$respuestas = $_GET["res"];
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
        for ($i = 1; $i < $preguntas; $i++) {
            print("Pregunta " . $i . ":");
            print("<input type=\"text\"> <br /><br />");
        }
        ?>
        <input type="submit" value="Generar">
    </form>

</body>

</html>