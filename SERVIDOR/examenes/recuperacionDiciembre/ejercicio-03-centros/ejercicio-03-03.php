<?php
try {
  $conexion = new mysqli('localhost', 'root', '', 'dwes_dic2020');
} catch (mysqli_sql_exception $e) {
  print "<p>Error: No puede conectarse con la base de datos.</p>";
  print "<p>Error: " . $e->getMessage() . "</p>";
  exit();
}

$id = $_REQUEST['id'];
$nuevoNombre = $_REQUEST['nuevoNombre'];
if (empty($nuevoNombre)) {
  header("Location: ejercicio-03-02.php?id=" . $id . "&centro=vacio");
} else {
  $resultado = $conexion->query("SELECT count(*) as total FROM centros WHERE nombre='" . $nuevoNombre . "'");
  $row = $resultado->fetch_assoc();

  if ($row['total'] > 0) {
    header("Location: ejercicio-03-02.php?id=" . $id . "&centro=existe");
  } else {
    $consulta = $conexion->stmt_init();
    $consulta->prepare("UPDATE centros SET nombre = ? WHERE id = ?");
    $consulta->bind_param('si', $nuevoNombre, $id);
    $consulta->execute();
    $consulta->close();
    header("Location: ejercicio-03-01.php");
  }
}
