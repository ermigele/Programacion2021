<?php
  session_name("BBDD-PDO-03");
  session_start();
  
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

  // Función para obtener el valor del campo pasado como párametro
  function obtenerValor($var){
    // Comprobamos si nos llega el nombre del campo
    if (!isset($_REQUEST[$var])) {
    $value = "";
    } else {
    // Limpiamos el campo de etiquetas y espacios
    $value = trim(strip_tags($_REQUEST[$var]));
    }
    return $value;
  }

  $loginOK = False;
  $passwdOK = False;
  $_SESSION['mensaje'] = "";

  $login = obtenerValor("login");
  $passwd = obtenerValor("passwd");

  
  if ($login == "") {
    $_SESSION['mensaje'] .="<p>No ha escrito un usuario.</p>";
  } else {
    $loginOK = True;
  }

  if ($passwd == "") {
    $_SESSION['mensaje'] .="<p>No ha escrito una contraseña.</p>";
  } else {
    // Si la contraseña no es vacía hacemos un md5 para compararla con la almacenada en BBDD 
    $passwd = md5($passwd);
    $passwdOK = True;
  }  
  
  // Comprobamos si todo está bien
  if ($loginOK && $passwdOK){
    // Obtenemos el rol para los datos de login y contraseña
    $consultaLogin = "SELECT r.nombre from usuarios as u INNER JOIN roles as r ON r.id=u.rol where u.login = :login AND u.password = :passwd";
    $consulta = $conexion->prepare($consultaLogin);
    $consulta->execute(array(':login'=>$login, ':passwd'=>$passwd));
    
    // OBTENEMOS EL ROL DE LA CONSULTA
    $rol = $consulta->fetchColumn();

    $consulta = null;
    $conexion = null;
    
    if ($rol == null){
      $_SESSION['mensaje'] ="<p>Usuario y/o contraseña incorrecto.</p>";
    }else{
      $_SESSION['rolAcceso'] = $rol;
      header("Location: base-datos-pdo-3-02.php");
      exit();
    }
  
  }

  // Si el RQUEST está vacío o tenemos un mensaje mostramos el formulario
  if (empty($_REQUEST) || $_SESSION['mensaje']!=""){
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    PDO-3-02 - Acceso Usuario.
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

  <div>
    <form action="base-datos-pdo-3-01.php" method="post">
      <p><label>Usuario: <input type="text" name="login"></label></p>
      <p><label>Contraseña: <input type="password" name="passwd"></label></p>
      <?php
        // Sólo mostramos el mensaje si he ha ralizado un submit y por tanto se han enviado datos
        if (count($_REQUEST)>0){
          print "<div style=\"color:red\">".$_SESSION['mensaje']."</div>";
        }
      ?>
      <p>
        <input type="submit" value="Entrar">
      </p>
    </form>
  </div>
</body>
</html>
<?php
  }
?>