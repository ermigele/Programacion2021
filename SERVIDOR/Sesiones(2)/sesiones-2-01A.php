<?php
session_start();
if (!isset($_SESSION["numero"])) {
    $_SESSION["numero"] = 0;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Subir y bajar número</title>
</head>

<body>
    <h2>Subir y bajar número</h2>
    <p>Haga clic en los botones para modificar el valor: </p>
    <form action="sesiones-2-01B.php">
        <input type="submit" value="BAJAR" name="opc">
        <?php print($_SESSION["numero"]); ?>
        <input type="submit" value="SUBIR" name="opc"> <br />
        <input type="submit" value="Poner a cero" name="opc">
    </form>

</body>

</html>