<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Formulario 1</title>
    <form action="fRequest-1-02.php" method="GET" />
</head>

<body>
    <form>
        Nombre: <input type="text" name="nombre"> <br>
        <input type="checkbox" name="juego[]" value="fútbol"> Fútbol <br>
        <input type="checkbox" name="juego[]" value="baloncesto"> Baloncesto<br>
        <input type="checkbox" name="juego[]" value="tenis"> Tenis<br>
        <input type="checkbox" name="juego[]" value="padel"> Padel <br>
        <input type="checkbox" name="juego[]" value="balonmano"> Balonmano<br>
        <input type="checkbox" name="juego[]" value="atletismo"> Atletismo<br>
    
        <input type="submit" value="Enviar">
    </form>
</body>

</html>