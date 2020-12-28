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

	$rolOK = False;
	$rol = obtenerValor("rol");
	$_SESSION['nombreRol'] = $rol;

	if ($rol == "") {
		$_SESSION['mensajeErrorRol'] ="<p>No ha escrito un rol.</p>";
	} else {
		//Comprobamos si exite el Rol en la base de datos
		$consulta = "select * from roles where nombre = '$rol'";
		$resultado = $conexion->prepare($consulta);
		$resultado->execute();

		// Si tenemos algún registro es que ya existe. Ponemos en la sesión el mensaje de error
		if ($resultado->rowCount()!=0){
			$_SESSION['mensajeErrorRol'] ="<p>Ya está dado de alta el rol $rol.</p>";
		}else{
			$rolOK = true;
		}

		$resultado = null;

	}

	if ($rolOK){
		//Realizamos el INSERT del rol si todo está bien
		$consulta = "insert into roles(nombre) values(?)";
		$insert = $conexion->prepare($consulta);
		$insert->bindParam(1, $rol);
		$insert->execute();

		$insert = null;
		// Vamos a la página del listado de roles
		header("Location: base-datos-pdo-3-01.php");
		
	}else{
		// Si hay error vamos a la página del formulario de insertar el rol
		header("Location: base-datos-pdo-3-02.php");
	}
	
	$conexion =null;
?>
