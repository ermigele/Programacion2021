<?php
try {
  $mysql = 'mysql:host=localhost;dbname=dwes_dic2020';
  $usuario = 'root';
  $contrasena = '';
  $conexion = new PDO($mysql, $usuario, $contrasena);
} catch (PDOException $e) {
  print "<p>" . $e->getMessage() . "</p>";
}

if (isset($_REQUEST['order'])) {
  $order = $_REQUEST['order'];
} else {
  $order = "centro, nombre";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Empresa - Departamentos
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de Departamentos</h1>

  <div>
    <table border="1.5">
      <thead>
        <th><a href="ejercicio-03-01.php?order=nombre">Departamento</a></th>
        <th><a href="ejercicio-03-01.php?order=presupuesto">Presupuesto</a></th>
        <th><a href="ejercicio-03-01.php?order=centro">Centro</a></th>
      </thead>
      <tbody>
        <?php
        $consulta = $conexion->query("SELECT d.nombre as nombre, presupuesto, c.nombre as centro FROM departamentos d INNER JOIN centros c ON d.centro=c.id ORDER BY " . $order);
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
          print("<tr><td><a href=ejercicio-03-02.php?dep=". $fila['nombre'].">" . $fila['nombre'] . "</a></td><td>" . $fila['presupuesto'] . "</td><td>" . $fila['centro'] . "</td></tr>");
        }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>