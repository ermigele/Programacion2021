<?php
  session_name("BBDD-PDO-03");
  session_start();
  // incluimos el fichero de comprobar el rol y vemos si estamos logado y tenemos rol administrador o gestor
  require_once ("../checkRol.php");
  isLogged();
  isGestor();

  // conexión a la base de datos
  try{
    $mysql = 'mysql:host=localhost;dbname=ejemplo';
    $usuario = 'root';
    $contrasena = '';
    $conexion = new PDO($mysql, $usuario, $contrasena);
    
  }catch (PDOException $e){
      print "<p>" .$e->getMessage()."</p>";
      die();
  }

  $rol = '';
  $mensaje = '';
  // Compruebo si en la variable de sesión está definida el mensaje de error del Login
  if(isset($_SESSION['mensajeErrorAlumno'])){
    $mensaje = $_SESSION['mensajeErrorAlumno'];

    // Borro de la sesión la variable
    unset($_SESSION['mensajeErrorAlumno']);
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    PDO-3-02 - Añadir Alumno.
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Añadir Alumno</h1>

  <div>
    <form action="base-datos-pdo-3-03.php" method="post">

      <p><label>Nombre: <input type="text" name="nombre"></label></p>
      <p><label>Apellidos: <input type="text" name="apellidos"></label></p>
      <p><label>Correo electrónico: <input type="text" name="email"></label></p>
      <p><label>Curso: <select name="curso">
        <option value="">Seleccione un curso</option>
        <?php
          $consulta = "select * from cursos order by nombre";
          // Una ventaja del query() es que permite iterar sobre el conjunto de filas devueltos por una ejecución de una sentencia SELECT con éxito.
          foreach ($conexion->query($consulta) as $row) {
            print "<option value='".$row['codigo'] . "'>".$row['nombre']."</option>";
          }
        ?>
      </select></label></p>
      <?php
      if (!empty($mensaje)){
        print "<p>$mensaje</p>";
      }
      ?>

      <p>
        <input type="submit" value="Guardar">
      </p>
    </form>
    <a href="base-datos-pdo-3-01.php">Volver</a>
  </div>
</body>
</html>
