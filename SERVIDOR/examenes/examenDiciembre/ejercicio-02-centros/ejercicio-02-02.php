<?php
$conexion = new mysqli();
$conexion->connect('localhost', 'root', '', 'dwes_dic2020');
$error = mysqli_connect_errno($conexion);
if ($error != null) {
  print "<p>Error $error conectando a la base de datos:" . mysqli_connect_error($conexion) . "</p>";
  exit();
}

if (!isset($_REQUEST['centros']) || $_REQUEST['centros'] == -1) {
  header("Location: ejercicio-02-03.php?mensaje=-1");
} else {
  $centro = $_REQUEST['centros'];
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
    <h1>Listado de Departamentos</h1>

    <div>

      <table border="1.5">
        <thead>
          <th>Nombre</th>
          <th>Presupuesto</th>
          <th>Número de empleados</th>
        </thead>
        <tbody>
          <?php
          $totalEmpleados['total'] = 0;
          $resultado = $conexion->query("SELECT * from departamentos WHERE centro=" . $centro);
          while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
            $resultado2 = $conexion->query("SELECT count(*) as total FROM empleados WHERE departamento=" . $row['id']);
            $totalEmpleados = $resultado2->fetch_array(MYSQLI_ASSOC);
            print("<tr><td>" . $row['nombre'] . "</td><td>" . $row['presupuesto'] . "</td><td><a href=ejercicio-02-03.php?dep=" . $row['id'] . ">" . $totalEmpleados['total'] . "</a></td></tr>");
          }
          ?>
        </tbody>
      </table>

      <p>
        <a href="ejercicio-02-01.php">Volver</a>
      </p>
    </div>
  </body>
<?php
}
?>

  </html>