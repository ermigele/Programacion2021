<?php
try {
  $conexion = new mysqli('localhost', 'root', '', 'dwes_ene2021');
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
    Itinerarios - Cursos
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Itinerarios Formativos</h1>

  <div>
    <table border=1.5>
      <thead>
      <th>Itinerario</th><th>Número de cursos</th>
      </thead>
      <thbody>
        <?php
          $consulta = $conexion->query("SELECT id, nombre FROM itinerarios");
          while ($fila = $consulta->fetch_assoc()) {
            $consulta2 = $conexion->query("SELECT count(*) total FROM cursos WHERE itinerario =".$fila['id']);
            $totalCursos = $consulta2->fetch_assoc();
            print("<tr><td>" . $fila['nombre'] . "</td>");
            print("<td><a href=ejercicio-02-02.php?id=".$fila['id']."&nombre=" . urlencode($fila['nombre']) . ">" . $totalCursos['total'] . "</td></tr>");
          }
        ?>
      </thbody>
    </table>
  </div>
</body>
</html>
