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

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    PDO-3-01 - Listado de alumnos.
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de alumnos</h1>

  <div>
    <table border="1">
      <thead>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Correo electrónico</th>
        <th>Curso</th>
      </thead>
      <tbody>
        <?php
          
          // Obtenemos los alumnos con los curssos
          $consultaAlumnos = "SELECT alu.nombre as nombre, alu.apellidos as apellidos, alu.email as email, cur.nombre as curso from alumnos as alu INNER JOIN cursos as cur ON cur.codigo=alu.codigocurso order by apellidos";
          $consulta = $conexion->prepare($consultaAlumnos);
          $consulta->execute();

          // Ahora vamos a utilizar el fetch y obtenemos los datos como un objeto
          while($row = $consulta->fetch(PDO::FETCH_OBJ)){
            print "<tr>";
            print "<td>$row->nombre</td>";
            print "<td>$row->apellidos</td>";
            print "<td>$row->email</td>";
            print "<td>$row->curso</td>";
            print"</tr>";
          }

          $consulta = null;
        ?>
      </tbody>
    </table>
  </div>
  <div style="margin: 1em 0;">
    <button onclick="window.location.href='base-datos-pdo-3-02.php';">
      Añadir Alumno
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