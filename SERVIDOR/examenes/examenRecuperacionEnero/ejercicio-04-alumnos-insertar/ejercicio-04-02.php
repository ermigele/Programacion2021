<?php
try {
  $mysql = 'mysql:host=localhost;dbname=dwes_ene2021';
  $usuario = 'root';
  $contrasena = '';
  $conexion = new PDO($mysql, $usuario, $contrasena);
} catch (PDOException $e) {
  print "<p>" . $e->getMessage() . "</p>";
}
$validar = [];
$nombre = "";
$apellidos = "";
$nota = "";
$curso = "";
if (isset($_REQUEST['nombre']) && isset($_REQUEST['apellidos']) && isset($_REQUEST['nota']) && isset($_REQUEST['curso'])) {
  $nombre = $_REQUEST['nombre'];
  $apellidos = $_REQUEST['apellidos'];
  $nota = $_REQUEST['nota'];
  $curso = $_REQUEST['curso'];

  if (empty($nombre))
  $validar[] = "No ha insertado el nombre.";

  if (empty($apellidos))
    $validar[] = "No ha insertado los apellidos.";

  if (empty($nota)) {
    $validar[] = "No ha insertado la nota.";
  } else {
    if ($nota < 1 || $nota > 10)
      $validar[] = "La nota final tiene que estar entre 1 y 10.";
  }

  if (empty($curso))
    $validar[] = "No ha insertado el curso.";
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
  <h1>Insertar Alumno</h1>

  <div>
    <form action="ejercicio-04-03.php" method="post">
    <label>Nombre: </label><input type="text" name="nombre" value="<?php print($nombre); ?>" /> <br /><br />
      <label>Apellidos: </label><input type="text" name="apellidos" value="<?php print($apellidos); ?>" /><br /><br />
      <label>Nota: </label><input type="text" name="nota" value="<?php print($nota); ?>" /><br /><br />
      <label>Curso: </label> <select name="curso">
        <option value="">Seleccione curso</option>
        <?php
        $consulta = $conexion->query("SELECT i.nombre as itinerario, c.id as idCurso, c.nombre as curso FROM itinerarios i INNER JOIN cursos c ON i.id=c.itinerario");
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $selected = "";
          if ($curso == $fila['idCurso'])
            $selected = "selected";
          print("<option " . $selected . " value=" . $fila['idCurso'] . ">" . $fila['curso']."-".$fila['itinerario'] . "</option>");
        }
        ?>
      </select><br /><br />
      <?php
      foreach ($validar as $clave => $valor) {
        print("<p>" . $valor . "</p>");
      }
      ?>
      <p>
        <input type="submit" value="Guardar">
      </p>
    </form>
    <p>
      <a href="ejercicio-04-01.php">Volver</a>
    </p>
  </div>
</body>
</html>
