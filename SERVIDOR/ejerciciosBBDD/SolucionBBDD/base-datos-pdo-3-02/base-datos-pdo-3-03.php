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

	$loginOK = False;
	$passwdOK = False;
	$rolOK = False;

	$login = obtenerValor("login");
	$passwd = obtenerValor("passwd");
	$rol = obtenerValor("rol");
	$_SESSION['loginAlumno'] = $login;


	if ($login == "") {
		$_SESSION['mensajeErrorLogin'] .="<p>No ha escrito un login.</p>";
	} else {
		$loginOK = True;
	}

	if ($passwd == "") {
		$_SESSION['mensajeErrorLogin'] .="<p>No ha escrito una contraseña.</p>";
	// Añado una condición más de que la contraseña tiene que tener una longitud mínima de 5 caracteres
	} elseif (strlen($passwd)<5) {
		$_SESSION['mensajeErrorLogin'] .="<p>La contraseña debe tener como mínimo 5 caracteres.</p>";
	} else{
		$passwdOK = True;
	}

	if ($rol == "") {
		$_SESSION['mensajeErrorLogin'] .="<p>No ha seleccionado ningún rol para el usuario.</p>";
	} else {
		$rolOK = True;
	}
	print_r($_REQUEST);
	
	// Si todos los datos son correctos
	if ($loginOK && $passwdOK && $rolOK){
		//Realizamos el INSERT en la base de datos
		
		$consulta = "insert into usuarios(login, password, rol) values(:login, :passwd, :rol)";
		$insert = $conexion->prepare($consulta);
		$passwd = md5($passwd);
		
		$insert->bindParam(':login', $login);
		$insert->bindParam(':passwd', $passwd);
		$insert->bindParam(':rol', $rol);

		$insert->execute();

		
		// PODEMOS SABER SI SE PROUCE UN ERROR USANDO
		/* 
		PDOStatement::errorCode() => Devuelve el códido del error o 00000 en caso de que no haya error.
		
		Para obtener información del error se puede usar

		PDOStatement::errorInfo() devuelve un array con la información del error sobre la última operación realizada por el manejador de la base de datos. El array contiene los siguientes campos:
		En la posición 0: Código de error SQLSTATE (un identificador de cinco caracteres alfanuméricos definidos según el estándar ANSI SQL).
		En la posición 1: Código de error específico del driver.
		En la posición 2: Mensaje del error específico del driver.
		*/

		// SI NO SE PRODUCE ERROR
		if ($insert->errorCode() != '00000'){
			//CONTROLAMOS EL ERROR 23000 de clave duplicada para el login
			if ($insert->errorCode() == '23000'){
				$_SESSION['mensajeErrorLogin'] .="<p>Utilice otro login.</p>";
				header("Location: base-datos-pdo-3-02.php");
				exit();
			}	
		}

		$insert = null;
		header("Location: base-datos-pdo-3-01.php");
		
	}else{
		header("Location: base-datos-pdo-3-02.php");
	}
	
	$conexion =null;
?>
