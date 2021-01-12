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

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    PDO-3-01 - Listado de roles.
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de roles</h1>

  <div>
    <table border="1">
      <thead>
        <th>Nombre</th>
      </thead>
      <tbody>
        <?php
          
          // Obtenemos los roles
          $consultaRoles = "SELECT * from roles order by nombre";
          $consulta = $conexion->prepare($consultaRoles);
          $consulta->execute();

          // Ahora vamos a utilizar el fetch y obtenemos los datos como objetos:
          while($row = $consulta->fetch(PDO::FETCH_OBJ)){
            print "<tr>";
            print "<td>$row->nombre</td>";
            print"</tr>";
          }

          $consulta = null;
        ?>
      </tbody>
    </table>
  </div>
  <div style="margin: 1em 0;">
    <button onclick="window.location.href='base-datos-pdo-3-02.php';">
      Añadir Rol
    </button>
    <button onclick="window.location.href='../base-datos-pdo-3-05/base-datos-pdo-3-02.php';">
      Volver al Menú
    </button>
  </div>
</body>
</html>
<?php
  $conexion = null;
?>