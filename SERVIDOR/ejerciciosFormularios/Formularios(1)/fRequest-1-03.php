<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Formulario de respuesta</title>
</head>

<body>
    <h2> Datos recibidos: </h2>
    <?php
    print "<p>Numero: " . $_REQUEST['num1']. " <br>";
    print "<p>Numero: " . $_REQUEST['num2']. " <br>";
    switch($_REQUEST['tipo']){
        case "suma":
        $total = $_REQUEST['num1'] + $_REQUEST['num2'];
        break;
        case "resta":
            $total = $_REQUEST['num1'] - $_REQUEST['num2'];
        break;
        case "multi":
            $total = $_REQUEST['num1'] * $_REQUEST['num2'];
        break;
    }
        print "<br> Resultado: "  .$total. "</p>";
    ?>
</body>

</html>