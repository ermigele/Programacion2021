<?php
if (!isset($_REQUEST['casillas']))
  header("Location: ejercicio-04-01.php");
$casillas = [];
$casillas = $_REQUEST['casillas'];
$num = $_REQUEST['numCasillas'];
$total = $num * $num;
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Tabla cuadrada con casillas de verificación
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Tabla cuadrada con casillas de verificación</h1>
  <?php
  print("De una tabla de " . $total . " casillas ha marcado " . count($casillas));
  print("<br /> <br />");
  print("Las casillas marcadas son: ");
  foreach ($casillas as $clave => $valor) {
    print($valor . " ");
  }

  ?>
  </form>
</body>

</html>