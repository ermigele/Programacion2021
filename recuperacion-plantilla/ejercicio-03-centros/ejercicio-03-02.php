<?php
try {
  $mysql = 'mysql:host=localhost;dbname=dwes_dic2020';
  $usuario = 'root';
  $contrasena = '';
  $conexion = new PDO($mysql, $usuario, $contrasena);
} catch (PDOException $e) {
  print "<p>" . $e->getMessage() . "</p>";
}

$nombre = $_REQUEST["centro"];
if ($nombre == "vacio")
  $error = "No has insertado el nombre del centro";
else if ($nombre == "existe")
  $error = "Ya está dado de alta elcentro";
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Empresa - Centros
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Editar Centro</h1>

  <div>
    <form action="ejercicio-03-03.php>">
      <label>Centro:</label>
      <?php
      // if ($nombre != "vacio" && $nombre != "existe") {
      if (!isset($error)) {
        print("<input type=\"text\" id=\"nuevoNombre\" value=\"$nombre\"/>");
      } else {
        $nombre = "";
        print("<input type=\"text\" id=\"nuevoNombre\" value=\"$nombre\"/><br/>");
        print("<p>" . $error . "</p>");
      }
      ?>
      <input type="submit" value="Guardar" />
    </form>
    <p>
      <a href="ejercicio-03-01.php">Volver</a>
    </p>
  </div>
</body>

</html>