<?php
	session_name("BBDD-PDO-03");
	session_start();
	// destruimos la sesión
	session_destroy();
	// redireccionamos a la página de login
	header("Location: base-datos-pdo-3-05/base-datos-pdo-3-01.php");
	exit();
?>