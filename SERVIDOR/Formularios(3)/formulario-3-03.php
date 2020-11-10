<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Datos personales</title>
</head>

<body>
    <h1>Datos personales</h1>
    <form action="" method="GET" />
    <label>Nombre:</label> <input type="text" name="nombre"> <br>
    <label>Apellidos:</label> <input type="text" name="apellidos"> <br>
    <label>Edad:</label> <select name="edad"> <br/>  <br>
    <label>Género:</label> 
    <input type="radio" value="Hombre" name="genero">Hombre
    <input type="radio" value="Mujer" name="genero">Mujer <br>
    <label>Aficiones:</label><br>
    <input type="checkbox" value="Música" name="aficiones[]">Música <br>
    <input type="checkbox" value="Deporte" name="aficiones[]">Deporte <br>
    <input type="checkbox" value="Cine" name="aficiones[]">Cine <br>
    <input type="checkbox" value="Lectura" name="aficiones[]">Lectura <br>
    <input type="checkbox" value="Videojuegos" name="aficiones[]">Videojuegos <br>
    <input type="checkbox" value="Viajes" name="aficiones[]">Viajes <br>
    <input type="submit" value="Enviar">
    </form>















    <?php
    if (!isset($_REQUEST['dividendo']) && !isset($_REQUEST['divisor'])) {
        $d1 = 0;
        $d2 = 0;
    } else {

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