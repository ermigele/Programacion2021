<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Calculadora de divisiones</title>
</head>

<body>

    <?php
    if (!isset($_REQUEST['dividendo']) && empty($_REQUEST['divisor'])) {
    ?>
        <h1>Calculadora de divisiones</h1>
        <form action="" method="GET">
            <label>Dividendo:</label> <input type="number" name="dividendo"> <br>
            <label>Divisor:</label> <input type="number" name="divisor"> <br>
            <input type="submit" value="Calcular">
        </form>

    <?php
    } else {
        print("<h2>Resultado</h2>");
        $d1 = $_REQUEST['dividendo'];
        $d2 = $_REQUEST['divisor'];
        if ((!is_numeric($d1) && !is_numeric($d2)) || ($d1 >= 10000 && $d2 >= 10000)) {
            print("<br/>El dividendo y el divisor deben ser positivos e inferiores a 10.000.");
        } else if ($d2 == 0) {
            print("<br/>Divisor tiene que ser un número diferente de cero.");
        } else {
            $conciente = floor($d1 / $d2);
            $resto = $d1 - $conciente * $d2;
            echo ("<br/>Dividendo: " . $d1 . "<br/> Divisor: " . $d2 . "<br/>Conciente: " . $conciente . "<br/>Resto: " . $resto);
        }
    }
    ?>

</body>

</html>