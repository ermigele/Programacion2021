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
	$_SESSION['mensajeErrorAlumno'] = "";

	$nombreOK = False;
	$apellidosOK = False;
	$emailOK = False;
	$cursoOK = False;

	// Recogemos los datos
	$nombre = obtenerValor("nombre");
	$apellidos =  obtenerValor("apellidos");
	$email =  obtenerValor("email");
	$curso =  obtenerValor("curso");

	// Validamos el nombre
	if ($nombre == "") {
		$_SESSION['mensajeErrorAlumno'] .="<p>No ha escrito un nombre.</p>";
	} else{
		$nombreOK = True;
	}
	// Validamos el/los apellidos
	if ($apellidos == "") {
		$_SESSION['mensajeErrorAlumno'] .="<p>No ha escrito el/los apellidos.</p>";
	} else {
		$apellidosOK = True;
	}
	// Validamos el correo electrónico
	if ($email == "") {
		$_SESSION['mensajeErrorAlumno'] .="<p>No ha escrito el correo electrónico del alumno.</p>";
	} else {
		$emailOK = True;
	}
	// Validamos el curso
	if ($curso == "") {
		$_SESSION['mensajeErrorAlumno'] .="<p>No ha seleccionado ningún curso para el alumno.</p>";
	} else {
		$cursoOK = True;
	}
	
	// Si todos los campos recibidos están bien
	if ($nombreOK && $apellidosOK && $emailOK && $cursoOK){
		unset($_SESSION['mensajeErrorAlumno']);
		//Creamos la consulta para insertar los datos
		$consulta = "insert into alumnos(nombre, apellidos, email, codigocurso) values(:nombre, :apellidos, :email, :curso)";
		$insert = $conexion->prepare($consulta);
		// En este caso usamos el array para insertar los datos
		$insert->execute(array(':nombre'=>$nombre, ':apellidos'=>$apellidos, ':email'=>$email , ':curso'=>$curso));
		
		$insert = null;
		header("Location: base-datos-pdo-3-01.php");
		
	}else{
		header("Location: base-datos-pdo-3-02.php");
	}
	
	$conexion =null;
?>
