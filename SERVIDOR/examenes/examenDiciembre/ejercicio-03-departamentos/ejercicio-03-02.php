<?php
try {
  $mysql = 'mysql:host=localhost;dbname=dwes_dic2020';
  $usuario = 'root';
  $contrasena = '';
  $conexion = new PDO($mysql, $usuario, $contrasena);
} catch (PDOException $e) {
  print "<p>" . $e->getMessage() . "</p>";
}

if (isset($_REQUEST['dep'])) {
  $dep = $_REQUEST['dep'];
}

$resultado = $conexion->query("SELECT*  FROM departamentos WHERE id=" . $dep);
$departamento = $resultado->fetch(PDO::FETCH_ASSOC);
$nombre = $departamento['nombre'];
$presupuesto = $departamento['presupuesto'];

$resultado2 = $conexion->query("SELECT * FROM centros WHERE departamento=" . $departamento['centro']);
$centro = $resultado2->fetch(PDO::FETCH_ASSOC);

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
  <h1>Editar Departamento</h1>

  <div>
    <form action="ejercicio-03-03.php" method="post">

      <label>Email </label> <input type="text" name="email" placeholder="nombre@gmail.com" value="<?php print($email); ?>" /> <br /> <br />
      <label>Nombre</label> <input type="text" name="nombre" value=readonly />
      <label>Presupuesto</label> <input type="text" name="nombre" readonly />
      <label>Centro</label> <select name="centro">
        <?php
        $consulta = $conexion->query("SELECT * FROM departamentos");
        print("<option> </option>");
        while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
          print("<option>" . $fila['nombre'] . "</option>");
        }
        ?>
      </select>



    </form>
    <p>
      <a href="ejercicio-03-01.php">Volver</a>
    </p>
  </div>
</body>

</html>