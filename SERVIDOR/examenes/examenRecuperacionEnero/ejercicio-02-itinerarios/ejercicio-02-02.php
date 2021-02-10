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
    Itinerario - Cursos
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php
  $idIterario = "";
  $nombre = "";
    if(!isset($_REQUEST['nombre'])){
      header("Location: ejercicio-02-01.php");
     } else{
      $idIterario = $_REQUEST['id'];
      $nombre = $_REQUEST['nombre'];
     }
    print("<h1>Listado de cursos de ".$nombre."</h1>");
  ?>

  <div>
  <table border=1.5>
      <thead>
      <th>Nombre</th><th>Número de grupos</th><th>Número de alumnos</th>
      </thead>
      <thbody>
        <?php
          $consulta = $conexion->query("SELECT c.id as id, c.nombre as nombre, c.grupos as grupos FROM cursos c INNER JOIN alumnos a ON c.id=a.curso GROUP BY c.nombre ORDER BY c.id");
          while ($fila = $consulta->fetch_assoc()) {
            $consulta2 = $conexion->query("SELECT count(*) total FROM alumnos WHERE curso =".$fila['id']);
            $totalAlumnos = $consulta2->fetch_assoc();
            print("<tr><td>".$fila['nombre']."</td>");
            print("<td>" . $fila['grupos'] . "</td>");
            print("<td>". $totalAlumnos['total'] . "</td></tr>");
          }
        ?>
      </thbody>
    </table>

    <p>
      <a href="ejercicio-02-01.php">Volver</a>
    </p>
  </div>
</body>
</html>
