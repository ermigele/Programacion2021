<?php
try {
  $mysql = 'mysql:host=localhost;dbname=dwes_ene2021';
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
    Alumnos - Insertar
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de Alumnos</h1>

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
       $consulta = $conexion->query("SELECT a.nombre as nombre, apellidos, nota, c.nombre as curso, i.nombre as itinerario FROM itinerarios i INNER JOIN cursos c ON i.id=c.itinerario INNER JOIN alumnos a ON c.id=a.curso");
       while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
        print("<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['apellidos'] . "</td><td>" . $fila['nota'] . "</td><td>" . $fila['curso'] . "</td><td>".$fila['itinerario']. "</td></tr>");
      }
      ?>
    </tbody>
  </table>
  </div>
  
  <div style="margin: 1em 0;">
    <button onclick="window.location.href='ejercicio-04-02.php';">
      Añadir Alumno
    </button>
  </div>
</body>
</html>
