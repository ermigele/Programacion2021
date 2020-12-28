<?php
  session_name("BBDD-PDO-03");
  session_start();
  // incluimos el fichero de comprobar el rol y vemos si estamos logado y tenemos rol administrador
  require_once ("../checkRol.php");
  isLogged();
  isAdmin();

  $rol = '';
  $mensaje = '';
  // Compruebo si en la variable de sesión está definida el mensaje de error del Rol
  if(isset($_SESSION['mensajeErrorRol'])){
    $mensaje = $_SESSION['mensajeErrorRol'];
    $rol = $_SESSION['nombreRol'];

    // Borro de la sesión ambas variables
    unset($_SESSION['mensajeErrorRol']);
    unset($_SESSION['nombreRol']);
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    PDO-3-01 - Añadir Rol.
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Añadir Rol</h1>

  <div>
    <form action="base-datos-pdo-3-03.php" method="post">

      <p><label>Rol: <input type="text" name="rol" value="<?php echo $rol;?>"></label></p>
      
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
