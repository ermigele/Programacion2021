<?php
	// función para comprobar si existe la variable de sesión
	function isLogged(){
		if (!isset($_SESSION['rolAcceso'])){
			header("Location: ../salir.php");
		}
	}

	// función para comprobar si el usuario es distinto de administrador
	function isAdmin(){
		if (strtoupper ($_SESSION['rolAcceso'])!="ADMINISTRADOR"){
			header("Location: ../salir.php");
		}
	}

	// función para comprobar si el usuario es distinto de administrador y gestor
	function isGestor(){
		if (strtoupper ($_SESSION['rolAcceso'])!="GESTOR" && strtoupper ($_SESSION['rolAcceso'])!="ADMINISTRADOR"){
			header("Location: ../salir.php");

		}
	}

	
?>