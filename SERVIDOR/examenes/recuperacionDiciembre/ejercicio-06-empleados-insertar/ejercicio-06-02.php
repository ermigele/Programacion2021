<?php
try {
  $mysql = 'mysql:host=localhost;dbname=dwes_dic2020';
  $usuario = 'root';
  $contrasena = '';
  $conexion = new PDO($mysql, $usuario, $contrasena);
} catch (PDOException $e) {
  print "<p>" . $e->getMessage() . "</p>";
}
$hijosArray = range(0, 4);
$validar = [];
$nombre = "";
$apellidos = "";
$salario = "";
$hijos = "";
$nacionalidad = "";
$departamento = "";
if (isset($_REQUEST['nombre']) && isset($_REQUEST['apellidos']) && isset($_REQUEST['salario']) && isset($_REQUEST['hijos']) && isset($_REQUEST['nacionalidad']) && isset($_REQUEST['departamento'])) {
  $nombre = $_REQUEST['nombre'];
  $apellidos = $_REQUEST['apellidos'];
  $salario = $_REQUEST['salario'];
  $hijos = $_REQUEST['hijos'];
  $nacionalidad = $_REQUEST['nacionalidad'];
  $departamento = $_REQUEST['departamento'];

  if (empty($nombre))
    $validar[] = "No ha escrito un nombre";

  if (empty($apellidos))
    $validar[] = "No ha escrito un apellidos";

  if (empty($salario)) {
    $validar[] = "No ha escrito un salario";
  } else {
    if ($salario < 15000 || $salario > 60000)
      $validar[] = "El salario debe estar compredido entre 15000€ y 60000€";
  }

  if (strlen($hijos) == 0) {
    $validar[] = "No ha seleccionado el número de hijos";
  }

  if (empty($nacionalidad))
    $validar[] = "No ha seleccionado una nacionalidad";

  if (empty($departamento))
    $validar[] = "No ha seleccionado el departamento";
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
  <h1>Insertar Empleado</h1>

  <div>
    <form action="ejercicio-06-03.php" method="POST">
      <label>Nombre: </label><input type="text" name="nombre" value="<?php print($nombre); ?>" /> <br /><br />
      <label>Apellidos: </label><input type="text" name="apellidos" value="<?php print($apellidos); ?>" /><br /><br />
      <label>Salario: </label><input type="text" name="salario" value="<?php print($salario); ?>" /><br /><br />
      <label>Hijos: </label><select name="hijos">
        <option value="">Seleccione el número de hijos</option>
        <?php
        foreach ($hijosArray as $valor) {
          $selected = "";
          if ($hijos == $valor && strlen($hijos))
            $selected = "selected";
          print("<option " . $selected . " value=" . $valor . ">" . $valor . "</option>");
        }
        ?>
      </select><br /><br />
      <label>Nacionalidad: </label> <select name="nacionalidad">
        <option value="">Seleccione nacionalidad</option>
        <?php
        $consulta = $conexion->query("SELECT * FROM paises");
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $selected = "";
          if ($nacionalidad == $fila['id'])
            $selected = "selected";
          print("<option " . $selected . " value=" . $fila['id'] . ">" . $fila['nacionalidad'] . "</option>");
        }
        ?>
      </select><br /><br />
      <label>Departamento: </label><select name="departamento">
        <option value="">Seleccione departamento</option>
        <?php
        $consulta = $conexion->query("SELECT * FROM departamentos");
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
          $selected = "";
          if ($departamento == $fila['id'])
            $selected = "selected";
          print("<option " . $selected . " value=" . $fila['id'] . ">" . $fila['nombre'] . "</option>");
        }
        ?>
      </select><br /><br />
      <?php
      foreach ($validar as $clave => $valor) {
        print("<p>" . $valor . "</p>");
      }
      ?>
      <input type="submit" value="Guardar" />
    </form>
    <p>
      <a href="ejercicio-06-01.php">Volver</a>
    </p>
  </div>
</body>

</html>