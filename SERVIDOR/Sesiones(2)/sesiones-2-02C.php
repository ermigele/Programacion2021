<?php
$totalPreguntas = count($_REQUEST) - 1;
$totalRespuestas = $_REQUEST["respuestas"];
print_r($_REQUEST);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Encuesta-3</title>
</head>

<body>
    <h2>Encuesta</h2>
    <?php print("Valore de 1 de " . $totalPreguntas . " aspectos"); ?>
    <br /> <br />
    <table>
        <form action="sesiones-2-02D.php">
            <?php
            print("<thead>");
            print("<th></th>");
            for ($i = 1; $i <= $totalRespuestas; $i++) {
                print("<th>" . $i . "</th>");
            }
            print("</thead>");
            print("<thbody>");
            foreach ($_REQUEST as $clave => $valor) {
                if ($clave != "respuestas") {
                    print("<tr><td>$valor</td>");
                    for ($i = 1; $i <= $totalRespuestas; $i++) {
                        print("<td><input type=\"radio\" name=\"$valor\" value=\"$i\"></td>");
                    }
                }
                print("</tr>");
            }
            print("</thbody>");
            ?>
    </table>
    <br />
    <input type="submit" value="Valorar">
    </form>

</body>

</html>