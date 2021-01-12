<?php
try {
  $conexion = new mysqli('localhost', 'root', '', 'dwes_dic2020');
} catch (mysqli_sql_exception $e) {
  print "<p>Error: No puede conectarse con la base de datos.</p>";
  print "<p>Error: " . $e->getMessage() . "</p>";
  exit();
}
$id = "";
$nombre = "";
if (isset($_REQUEST['id']) && isset($_REQUEST['centro'])) {
  $id = $_REQUEST["id"];
  $nombre = $_REQUEST["centro"];
}
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
    <form action="ejercicio-03-03.php">
      <label>Centro:</label>
      <?php
      print("<input type=\"hidden\" name=\"id\" value=\"$id\"/>");
      if (!isset($error)) {
        print("<input type=\"text\" name=\"nuevoNombre\" value=\"$nombre\"/>");
      } else {
        $nombre = "";
        print("<input type=\"text\" name=\"nuevoNombre\" value=\"$nombre\"/><br /> ");
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