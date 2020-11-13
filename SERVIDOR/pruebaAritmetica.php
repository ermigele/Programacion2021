<!DOCTYPE html>


<head>
    <title>Prueba operacion aritmetica</title>
</head>

<body>
    <h2>Calcular </h2>
    <?php
    include("realizaOperacion.php");
    if (isset($_REQUEST['dato1']) && isset($_REQUEST['dato2'])) {
        $valor1 =  $_GET['dato1'];
        $valor2 =  $_GET['dato2'];
        $ope =  $_GET['operacion'];
        print("El resultado de la operación es: " . realizaOperacion($valor1, $valor2, $ope));
    } else {
    ?>
        <form action="" method="GET">
            <br />
            Valor 1 <input type="number" name="dato1"> <br />
            Valor 2 <input type="number" name="dato2"> <br /> <br />
            <label>Tipo de operación: </label> <br />
            <input type="radio" name="operacion" value="sumar"> Sumar <br />
            <input type="radio" name="operacion" value="restar"> Restar <br />
            <input type="radio" name="operacion" value="multiplicacion"> Multiplicación <br />
            <input type="radio" name="operacion" value="division"> División <br /> <br />
            <input type="submit" value="Calcular">
        </form>
    <?php
    }
    ?>
</body>

</html>