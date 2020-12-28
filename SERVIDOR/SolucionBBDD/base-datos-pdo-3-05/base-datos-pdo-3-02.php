<?php
  session_name("BBDD-PDO-03");
  session_start();
  // incluimos el fichero de comprobar el rol y vemos si estamos logado
  require_once ("../checkRol.php");
  isLogged();
  
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

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    PDO-3-05 - Login.
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style type="text/css">
    .enlace {
      padding: 1em;
      margin: 0.5em;
      border: 1px solid black;
    }
    .enlace:hover {
      border: 1px solid blue;
    }
  </style>
</head>

<body>
  <h1>Acceso con usuario con rol <?php echo $_SESSION['rolAcceso']; ?> </h1>

  <div style="display: flex">
    <?php
      
      // Obtenemos todos los COUNT en una única consulta
      $consultaCount = "SELECT * from (SELECT COUNT(nombre) as numeroAlumnos from alumnos) as alumnos, (SELECT COUNT(nombre) as numeroCursos from cursos) as cursos, (SELECT COUNT(nombre) as numeroRoles from roles) as roles, (SELECT COUNT(login) as numeroUsuarios from usuarios) as usuarios";
      
      $consulta = $conexion->prepare($consultaCount);
      $consulta->execute();

      // Mostramos los botones en función del rol
      $datos = $consulta->fetch(PDO::FETCH_OBJ);
      if (strtoupper ($_SESSION['rolAcceso'])=="ADMINISTRADOR" ){
        print "<div class=\"enlace\"><a href=\"../base-datos-pdo-3-02/base-datos-pdo-3-01.php\">Usuarios ($datos->numeroUsuarios)</a></div>";
        print "<div class=\"enlace\"><a href=\"../base-datos-pdo-3-01/base-datos-pdo-3-01.php\">Roles ($datos->numeroRoles)</a></div>";
      }
      print "<div class=\"enlace\"><a href=\"../base-datos-pdo-3-04/base-datos-pdo-3-01.php\">Alumnos ($datos->numeroAlumnos)</a></div>";
      print "<div class=\"enlace\"><a href=\"../base-datos-pdo-3-06/base-datos-pdo-3-01.php\">Alumnos Bis ($datos->numeroAlumnos)</a></div>";
      print "<div class=\"enlace\"><a href=\"../base-datos-pdo-3-03/base-datos-pdo-3-01.php\">Cursos ($datos->numeroCursos)</a></div>";

      print "<div style=\"margin-left: 2em\"><a href=\"../salir.php\">Salir</a></div>";
      $consulta = null;
    ?>
  </div>
</body>
</html>
<?php
  $conexion = null;
?>