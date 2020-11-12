<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Datos personales</title>
</head>

<body>

    <?php
    $lista = [];
    $validado = true;
    if (isset($_GET['nombre']) || isset($_GET['apellidos']) || isset($_GET['edad']) || isset($_GET['genero']) || isset($_GET['aficiones'])) {
        if (empty($_GET['nombre'])) {
            $lista[] = 'nombre';
            $validado = false;
        }
        if (empty($_GET['apellidos'])) {
            $lista[] = 'apellidos';
            $validado = false;
        }
        if (empty($_GET['edad'])) {
            $lista[] = 'edad';
            $validado = false;
        }
        if (empty($_GET['genero'])) {
            $lista[] = 'genero';
            $validado = false;
        }
        if (empty($_GET['aficiones'])) {
            $lista[] = 'aficiones';
            $validado = false;
        }
        if ($validado) {
            print("<h2>Datos recogidos</h2> <br/>");
            print("Nombre: " . $_GET['nombre'] . "<br/>");
            print("Apellidos: " . $_GET['apellidos'] . "<br/>");
            print("Edad: " . $_GET['edad'] . "<br/>");
            print("Genero: " . $_GET['genero'] . "<br/>");
            print("Aficiones: <br />");
            foreach ($_GET['aficiones'] as $key => $valor) {
                $key += 1;
                print($key . ". " . $valor . "<br />");
            }
        } else {
            print("<h2>Error</h2> <br/>");
            foreach ($lista as $i) {
                print("El campo " . $i . " está vacio <br/>");
            }
        }
    } else {
    ?>

        <h1>Datos personales</h1>
        <form action="" method="GET">
            <label>Nombre:</label>
            <input type="text" name="nombre"> <br /> <br />
            <label>Apellidos:</label>
            <input type="text" name="apellidos"> <br /> <br />
            <label>Edad:</label>
            <select name="edad">
                <?php
                for ($i = 10; $i <= 90; $i++) {
                    print("<option value=\"$i\">$i</option>");
                }
                ?>
            </select> <br /> <br />
            <label>Género:</label> <br />
            <input type="radio" value="Hombre" name="genero">Hombre
            <input type="radio" value="Mujer" name="genero">Mujer <br /> <br />
            <label>Aficiones:</label><br>
            <input type="checkbox" value="Música" name="aficiones[]">Música <br>
            <input type="checkbox" value="Deporte" name="aficiones[]">Deporte <br>
            <input type="checkbox" value="Cine" name="aficiones[]">Cine <br>
            <input type="checkbox" value="Lectura" name="aficiones[]">Lectura <br>
            <input type="checkbox" value="Videojuegos" name="aficiones[]">Videojuegos <br>
            <input type="checkbox" value="Viajes" name="aficiones[]">Viajes <br /> <br />
            <input type="submit" value="Enviar">
        </form>
    <?php
    }
    ?>


</body>

</html>