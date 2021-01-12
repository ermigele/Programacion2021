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
    PDO-3-01 - Listado de usuarios.
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de usuarios</h1>

  <div>
    <table border="1">
      <thead>
        <th>Login</th>
        <th>Rol</th>
        <th>Fecha de alta</th>
      </thead>
      <tbody>
        <?php
          
          // Obtenemos los usuarios
          $consultaUsuarios = "SELECT u.login as login, r.nombre as rol, DATE_FORMAT(u.fecha, '%d-%m-%Y') as fecha from usuarios as u INNER JOIN roles as r ON r.id=u.rol order by fecha";
          $consulta = $conexion->prepare($consultaUsuarios);
          $consulta->execute();

          // Ahora vamos a utilizar el fetch y obtenemos los datos como array asociativo
          while($row = $consulta->fetch(PDO::FETCH_ASSOC)){
            print "<tr>";
            foreach ($row as $key => $value) {
              print "<td>$value</td>";
            }
            
            print"</tr>";
          }

          $consulta = null;
        ?>
      </tbody>
    </table>
  </div>
  <div style="margin: 1em 0;">
    <button onclick="window.location.href='base-datos-pdo-3-02.php';">
      Añadir Usuario
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