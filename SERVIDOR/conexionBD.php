<?php
//Utilizando em metodo connect
$conexion = new mysqli();
$conexion->connect('localhost', 'root', '', 'ejemplo');
$conexion->query('INSERT INTO alumnos(nombre,apellidos,email,codigo_curso) values("Miguel Angel", "Martin Martin", "ermigele@gmail.com", 1)') ;
$conexion->close();
?>