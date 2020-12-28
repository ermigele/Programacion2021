<?php
try {
  $mysql = 'mysql:host=localhost;dbname=dwes_dic2020';
  $usuario = 'root';
  $contrasena = '';
  $conexion = new PDO($mysql, $usuario, $contrasena);
} catch (PDOException $e) {
  print "<p>" . $e->getMessage() . "</p>";
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
        $consulta = $conexion->query("SELECT nombre FROM centros");
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $nombre = $fila['nombre'];
          print("<tr><td>");
          print("<a href=ejercicio-03-02.php?centro=" . $nombre . "/>");
          print($nombre . "</td></tr>");
        }
        ?>
      </tbody>
    </table>

  </div>
</body>

</html>