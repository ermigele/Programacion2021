<?php
$conexion = new mysqli();
$conexion->connect('localhost', 'root', '', 'dwes_dic2020');
$error = mysqli_connect_errno($conexion);
if ($error != null) {
  print "<p>Error $error conectando a la base de datos:" . mysqli_connect_error($conexion) . "</p>";
  exit();
}
$dep = $_REQUEST['dep'];


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
  <h1>Listado de Empleados del Departamento</h1>

  <div>

    <table border="1.5">
      <thead>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Salario</th>
        <th>Hijos</th>
        <th>Nacionalidad</th>
      </thead>
      <tbody>
        <?php
        $resultado = $conexion->query("SELECT * from empleados WHERE departamento=" . $dep);
        while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) {
          print("<tr><td>" . $row['nombre'] . "</td><td>" . $row['apellidos'] . "</td><td>" . $row['salario'] . "</td><td>" . $row['hijos'] . "</td><td>" . $row['nacionalidad'] . "</td></tr>");
        }
        ?>
      </tbody>
    </table>
    <p>
      <a href="ejercicio-02-01.php">Volver</a>
    </p>
  </div>
</body>

</html>