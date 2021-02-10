<?php
session_start();
if (!isset($_SESSION["tragaperras"]) || !isset($_SESSION["frutas"])) {
    $_SESSION["tragaperras"] = [0, 0];
    $_SESSION["frutas"] = [];
}
//session_destroy();
$_SESSION["tragaperras"][0];
$_SESSION["tragaperras"][1];
$_SESSION["frutas"];
$FRESA = 127827;
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
            if (!isset($_REQUEST['opc'])) {
                for ($i = 0; $i <= 2; $i++) {
                    $frutaAleatoria = rand(127817, 127827);
                    print("<td> <p style=\"font-size: 600%; margin: 0\"> &#$frutaAleatoria </p> </td>");
                    $frutas[] = $frutaAleatoria;
                }
                $_SESSION["frutas"] = $frutas;
            } else if ($_REQUEST['opc'] == 'Jugar') {
                $contIgual = 0;
                $contFresa = 0;
                $frutas = [];
                for ($i = 0; $i <= 2; $i++) {
                    $frutaAleatoria = rand(127817, 127827);
                    print("<td> <p style=\"font-size: 600%; margin: 0\"> &#$frutaAleatoria </p> </td>");

                    if ($frutaAleatoria == $FRESA) {
                        $contFresa += 1;
                    } else if (in_array($frutaAleatoria, $frutas)) {
                        $contIgual += 1;
                    }
                    $frutas[] = $frutaAleatoria;
                }
                $_SESSION["frutas"] = $frutas;

                switch ($contFresa) {
                    case 1:
                        if ($contIgual > 1) {
                            $_SESSION["tragaperras"][0] += 3;
                            $_SESSION["tragaperras"][1] += 1;
                        } else {
                            $_SESSION["tragaperras"][0] += 1;
                            $_SESSION["tragaperras"][1] += 1;
                        }
                        break;
                    case 2:
                        $_SESSION["tragaperras"][0] += 4;
                        $_SESSION["tragaperras"][1] += 1;
                        break;
                    case 3:
                        $_SESSION["tragaperras"][0] += 10;
                        $_SESSION["tragaperras"][1] += 1;
                        break;
                }

                if (($contFresa == 0 && $contIgual) > 0 ){
                    $_SESSION["tragaperras"][0] += 2;
                    $_SESSION["tragaperras"][1] += 1;
                } else if ($contFresa == 0 && $contIgual > 1) {
                    $_SESSION["tragaperras"][0] += 5;
                    $_SESSION["tragaperras"][1] += 1;
                }

                if ($contFresa == 0 && $contIgual == 0)
                    $_SESSION["tragaperras"][0] -= 1;

                //$contFresa = 0;
                //$contIgual = 0;
            } else {
                foreach ($_SESSION["frutas"] as $f) {
                    print("<td> <p style=\"font-size: 600%; margin: 0\"> &#$f </p> </td>");
                }
            }
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