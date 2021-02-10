<?php
//Utilizando em metodo connect
$conexion = new mysqli();
$conexion->connect('localhost', 'root', '', 'ejemplo');
//$conexion->query('INSERT INTO alumnos(nombre,apellidos,email,codigo_curso) values("Miguel Angel", "Martin Martin", "ermigele@gmail.com", 1)') ;
$conexion->query('INSERT INTO alumnos(nombre,apellidos,email,codigo_curso) values("Manuel", "Martin Fer", "manue@gmail.com", 2)') ;
$conexion->query('INSERT INTO alumnos(nombre,apellidos,email,codigo_curso) values("Federico", "Garcia Perez", "ermigele@gmail.com", 3)') ;
$conexion->query('INSERT INTO alumnos(nombre,apellidos,email,codigo_curso) values("Maria del Valle", "Ortiz Lopez", "marichu@hotail.com", 4)') ;
$conexion->query('INSERT INTO alumnos(nombre,apellidos,email,codigo_curso) values("Rocio", "Gonzalez Ostos", "roco@yahoo.es", 5)') ;
$conexion->query('INSERT INTO alumnos(nombre,apellidos,email,codigo_curso) values("Amalia", "Martinez Delgado", "amalia@yahoo.com", 6)') ;
$conexion->query('INSERT INTO alumnos(nombre,apellidos,email,codigo_curso) values("Carlos", "Perez Avila", "carloss@gmail.es", 7)') ;

$conexion->close();
?>