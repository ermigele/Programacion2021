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
    Empresa - Empleados - Insertar
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de Empleados</h1>


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
      $consulta = $conexion->query("SELECT * FROM empleados e INNER JOIN paises p ON p.id=e.nacionalidad");
      while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        print("<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['apellidos'] . "</td><td>" . $fila['salario'] . "</td><td>" . $fila['hijos'] . "</td><td>" . $fila['nacionalidad'] . "</td></tr>");
      }
      ?>
    </tbody>
  </table>


  <div style="margin: 1em 0;">
    <button onclick="window.location.href='ejercicio-06-02.php';">
      Añadir Empleado
    </button>
  </div>
</body>

</html>