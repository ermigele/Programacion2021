<?php
  session_name("BBDD-PDO-03");
  session_start();
  // incluimos el fichero de comprobar el rol y vemos si estamos logado y tenemos rol administrador o gestor
  require_once ("../checkRol.php");
  isLogged();
  isGestor();
  
  $curso = '';
  $mensaje = '';
  // Compruebo si en la variable de sesión está definida el mensaje de error del Curso
  if(isset($_SESSION['mensajeErrorCurso'])){
    $mensaje = $_SESSION['mensajeErrorCurso'];
    $curso = $_SESSION['nombreCurso'];

    // Borro de la sesión ambas variables
    unset($_SESSION['mensajeErrorCurso']);
    unset($_SESSION['nombreCurso']);
  }
  $conexion = null;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    PDO-3-03 - Añadir Curso.
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Añadir Curso</h1>

  <div>
    <form action="base-datos-pdo-3-03.php" method="post">

      <p><label>Curso: <input type="text" name="curso" value="<?php echo $curso;?>"></label></p>
      
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
