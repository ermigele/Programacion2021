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

	$cursoOK = False;
	$curso = obtenerValor("curso");
	$_SESSION['nombreCurso'] = $curso;

	if ($curso == "") {
		$_SESSION['mensajeErrorCurso'] ="<p>No ha escrito un curso.</p>";
	} else {
		//Comprobamos si exite el curso en la base de datos
		$consulta = "select * from cursos where nombre = '$curso'";
		$resultado = $conexion->prepare($consulta);
		$resultado->execute();

		// Si tenemos algún registro es que ya existe. Ponemos en la sesión el mensaje de error
		if ($resultado->rowCount()!=0){
			$_SESSION['mensajeErrorCurso'] ="<p>Ya está dado de alta el curso $curso.</p>";
		}else{
			$cursoOK = true;
		}

		$resultado = null;

	}

	if ($cursoOK){
		//Realizamos el INSERT del curso
		$consulta = "insert into cursos(nombre) values(?)";
		$insert = $conexion->prepare($consulta);
		$insert->bindParam(1, $curso);
		$insert->execute();

		$insert = null;
		header("Location: base-datos-pdo-3-01.php");
		
	}else{
		header("Location: base-datos-pdo-3-02.php");
	}
	
	$conexion =null;
?>
