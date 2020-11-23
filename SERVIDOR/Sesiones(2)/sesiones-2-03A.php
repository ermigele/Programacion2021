<?php
session_start();
if (!isset($_SESSION["tragaperras"])) {
    $_SESSION["tragaperras"] = [0, 0];
}
//session_destroy();
$_SESSION["tragaperras"][0];
$_SESSION["tragaperras"][1];
$frutas = [];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Juego de Frutas</title>
</head>

<body>
    <h1>Juego de Frutas</h1>
    <table border=1,5>
        <tr>
            <?php
            $cont = 1;
            $frutas = [];
            for ($i = 0; $i <= 2; $i++) {
                $frutaAleatoria = rand(127817, 127827);
                print("<td> <p style=\"font-size: 600%; margin: 0\"> &#$frutaAleatoria </p> </td>");

                if (isset($_REQUEST['opc']) && $_REQUEST['opc'] == 'Jugar') {
                    if (in_array($frutaAleatoria, $frutas)) {
                        $cont += 1;
                    }
                }
                $frutas[] = $frutaAleatoria;
            }

            if ($cont > 2) {
                $_SESSION["tragaperras"][0] += 10;
                $_SESSION["tragaperras"][1] += 1;
            }
            $cont = 0;
            ?>
            <td>
                <br /> <br />
                <form action="sesiones-2-03B.php">
                    <input type="submit" name="opc" value="Meter moneda" /> <br /> <br />
                    <?php print("<h1 style=\"font-size: 400%; margin: 0\">" . $_SESSION["tragaperras"][0] . "</h1>"); ?> <br /> <br />
                    <input type="submit" name="opc" value="Jugar" /> <br /> <br />
                    <p>Premio: <?php print($_SESSION["tragaperras"][1]); ?> </p>
                </form>
        </tr>
    </table>
</body>

</html>