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
    Empresa - Centros - Departamentos
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de Centros</h1>

  <div>
    <table border=1.5>
      <thead>
        <th>Centros</th>
        <th>Número de departamentos</th>
      </thead>
      <tbody>
        <?php
        $consulta = $conexion->query("SELECT id, nombre FROM centros");
        while ($fila = $consulta->fetch_assoc()) {
          $consulta2 = $conexion->query("SELECT count(*) as total FROM departamentos WHERE centro =".$fila['id']);
          $totalDepartamentos = $consulta2->fetch_assoc();
          print("<tr><td>" . $fila['nombre'] . "</td>");
          print("<td><a href=ejercicio-04-02.php?centro=" . $fila['id'] . ">" . $totalDepartamentos['total'] . "</td></tr>");
        }
        ?>
      </tbody>
    </table>

  </div>
</body>

</html>