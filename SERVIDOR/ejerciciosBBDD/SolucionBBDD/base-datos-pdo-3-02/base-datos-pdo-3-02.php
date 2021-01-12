<?php
  session_name("BBDD-PDO-03");
  session_start();
  // incluimos el fichero de comprobar el rol y vemos si estamos logado y tenemos rol administrador
  require_once ("../checkRol.php");
  isLogged();
  isAdmin();

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

  $login = '';
  $mensaje = '';
  // Compruebo si en la variable de sesión está definida el mensaje de error del Login
  if(isset($_SESSION['mensajeErrorLogin'])){
    $mensaje = $_SESSION['mensajeErrorLogin'];
    $login = $_SESSION['loginAlumno'];

    // Borro de la sesión la variable
    unset($_SESSION['mensajeErrorLogin']);
    unset($_SESSION['loginAlumno']);
  }

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    PDO-3-02 - Añadir Usuario.
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Añadir Usuario</h1>

  <div>
    <form action="base-datos-pdo-3-03.php" method="post">

      <p><label>Login: <input type="text" name="login" value="<?php echo $login;?>"></label></p>
      <p><label>Contraseña: <input type="password" name="passwd"></label></p>
      <p><label>Rol: <select name="rol">
        <option value="">Seleccione un rol</option>
        <?php
          $consulta = "select * from roles order by nombre";
          // Una ventaja del query() es que permite iterar sobre el conjunto de filas devueltos por una ejecución de una sentencia SELECT con éxito.
          foreach ($conexion->query($consulta) as $row) {
            print "<option value='".$row['id'] . "'>".$row['nombre']."</option>";
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
