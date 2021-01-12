<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Formulario de respuesta</title>
</head>

<body>
    <h2>TABLA</h2>
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

    $numCol = $_REQUEST['columnas'];
    $numCel = $_REQUEST['celdas'];

    if (!is_numeric($numCol) && !is_numeric($numCel) || !ctype_digit($numCol) && !ctype_digit($numCel)) {
        print("No se deben admiten números decimales ni negativos.");
    } else if (!($numCol > 0 && $numCol <= 100) && !($numCol > 0 && $numCol <= 100)) {
        print("Sólo se deben admitir enteros positivos inferiores o iguales a 100 y
        superiores a 0 en el número de columnas e inferiores o iguales a 1.000 en el
        número de celdas numeradas.");
    } else {

        $filas = ceil($numCel / $numCol);
        $cont = 1;
        print("<table border =\" 1 \">");
        for ($i = 0; $i < $filas; $i++) {
            print("<tr>");
            for ($j = 0; $j < $numCol; $j++) {
                if ($cont <= $numCel) {
                    print("<td>"  . $cont . "</td>");
                    $cont += 1;
                }
            }
            print("</tr>");
        }
        print("</table>");
    }
    ?>
</body>

</html>