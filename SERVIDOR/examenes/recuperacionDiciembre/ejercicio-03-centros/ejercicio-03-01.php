<?php
try {
  $conexion = new mysqli('localhost', 'root', '', 'dwes_dic2020');
} catch (mysqli_sql_exception $e) {
  print "<p>Error: No puede conectarse con la base de datos.</p>";
  print "<p>Error: " . $e->getMessage() . "</p>";
  exit();
}
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
  <h1>Listado de Centros</h1>

  <div>
    <table border=1.5>
      <thead>
        <th>Centros</th>
      </thead>
      <tbody>
        <?php
        $consulta = $conexion->query("SELECT id, nombre FROM centros");
        while ($fila = $consulta->fetch_assoc()) {
          print("<tr><td><a href=ejercicio-03-02.php?id=" . $fila['id'] . "&centro=" . urlencode($fila['nombre']) . ">");
          print($fila['nombre'] . "</td></tr>");
        }
        ?>
      </tbody>
    </table>

  </div>
</body>

</html>