<?php
try {
  $conexion = new mysqli('localhost', 'root', '', 'dwes_dic2020');
} catch (mysqli_sql_exception $e) {
  print "<p>Error: No puede conectarse con la base de datos.</p>";
  print "<p>Error: " . $e->getMessage() . "</p>";
  exit();
}
$centro = "";
if (isset($_REQUEST['centro']))
  $centro = $_REQUEST['centro'];

if (isset($_REQUEST['order'])) {
  $order = $_REQUEST['order'];
} else {
  $order = "1, 2, 3";
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Empresa - Centros - Departamentos
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de Departamentos</h1>

  <div>
    <table border=1.5>
      <thead>
        <th><a href="ejercicio-04-02.php?centro=<?php print($centro); ?>&order=nombre">Departamento</a></th>
        <th><a href="ejercicio-04-02.php?centro=<?php print($centro); ?>&order=presupuesto">Presupuesto</a></th>
        <th><a href="ejercicio-04-02.php?centro=<?php print($centro); ?>&order=TOTAL">Número de Empleados</a></th>
      </thead>
      <tbody>
        <?php
        $consulta = $conexion->query("SELECT d.nombre as nombre, presupuesto, count(e.departamento) as TOTAL FROM departamentos d INNER JOIN Empleados e ON d.id=e.departamento WHERE d.centro =" . $centro . " GROUP BY d.nombre ORDER BY " . $order . " desc");
        while ($fila = $consulta->fetch_assoc()) {
          print("<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['presupuesto'] . "</td><td>" . $fila['TOTAL'] .  "</td></tr>");
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>