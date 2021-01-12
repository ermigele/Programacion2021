<?php
$conexion = new mysqli();
$conexion->connect('localhost', 'root', '', 'dwes_dic2020');
$error = mysqli_connect_errno($conexion);
if ($error != null) {
  print "<p>Error $error conectando a la base de datos:" . mysqli_connect_error($conexion) . "</p>";
  exit();
}

if (isset($_REQUEST['mensaje']) && $_REQUEST['mensaje'] == -1) {
  $mensaje = true;
} else {
  $mensaje = false;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Empresa - Centros - Departamentos - Empleados
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Centros</h1>

  <div>
    <form action="ejercicio-02-02.php" method="post">
      <label>Centro:</label><select name="centros" />
      <?php
      print("<option name=\"centro\"  value=\"-1\" >Seleccione algun centro</option>");
      $resultado = $conexion->query("SELECT * from centros");
      while ($row = $resultado->fetch_array()) {
        print("<option name=\"centros\" value=" . $row[0] . ">" . $row[1] . "</option>");
      }
      ?>
      </select>
      <?php
      if ($mensaje)
        print("<br /><br />No se ha selecionado ningun centro");
      ?>
      <br /> <br />
      <input type="submit" value="Consultar" />
    </form>
  </div>
</body>

</html>