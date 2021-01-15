<?php
try {
	$mysql = 'mysql:host=localhost;dbname=dwes_ene2021';
	$usuario = 'root';
	$contrasena = '';
	$conexion = new PDO($mysql, $usuario, $contrasena);
} catch (PDOException $e) {
	print "<p>" . $e->getMessage() . "</p>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Alumnos - Ordenar
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de Alumnos</h1>
  <div style="margin-bottom: 1em">
  	<fieldset style="width:50%">
  		<legend>Criterio de ordenación</legend>
  		<form name="filtrar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  			
      <label>Primer campo: </label> <select name="orden1">
        <option value="">Seleccione el primer campo por el que desea ordenar</option>
        <option value="nombre">Nombre</option>
        <option value="apellidos">Apellidos</option>
        <option value="nota">Nota</option>
        <option value="curso">Curso</option>
        <option value="itinerario">Itinerario</option>
        </select> <br /><br />

      <label>Segundo campo: </label> <select name="orden2">
        <option value="">Seleccione el primer campo por el que desea ordenar</option>
        <option value="nombre">Nombre</option>
        <option value="apellidos">Apellidos</option>
        <option value="nota">Nota</option>
        <option value="curso">Curso</option>
        <option value="itinerario">Itinerario</option>
        </select><br /><br />
  			
        <input type="submit" value="Ordenar">
  		</form>
  	</fieldset>
  </div>
  <div>
				<?php
        $mensaje = "";
        $sql ="";
        if(!empty($_REQUEST['orden2']) && empty($_REQUEST['orden1'])){
          $mensaje="No puede dejar el primer desplegable vacio";
        }else{
            $sql = "SELECT a.nombre as nombre, apellidos, nota, c.nombre as curso, i.nombre as itinerario FROM itinerarios i INNER JOIN cursos c ON i.id=c.itinerario INNER JOIN alumnos a ON c.id=a.curso";
            if(!empty($_REQUEST['orden1']) && empty($_REQUEST['orden2'])){
              $mensaje="Listado ordenado por: El campo ".$_REQUEST['orden1'];
              $sql = $sql . " ORDER BY ".$_REQUEST['orden1'];
            }else if(!empty($_REQUEST['orden1']) && !empty($_REQUEST['orden2'])){
              if($_REQUEST['orden1'] == $_REQUEST['orden2']){
                $mensaje = "Ha seleccionado el mismo campo para los 2 desplegables. Deben ser distintos";
                $sql = "";
              }else{
                $sql = $sql . " ORDER BY ".$_REQUEST['orden1'].", ".$_REQUEST['orden2'];
                $mensaje="Listado ordenado por: El campo ".$_REQUEST['orden1']. " y luego por el campo: ".$_REQUEST['orden2'];
              }
            }
        }
        print("<p>".$mensaje."</p>");
        if(strlen($sql) >0){
          ?>
          <table border="1.5">
				    <thead>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Nota</th>
              <th>Curso</th>
              <th>Itinerario</th>
          </thead>
          <tbody>
          <?php
          $consulta = $conexion->query($sql);
				  while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
				  	print("<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['apellidos'] . "</td><td>" . $fila['nota'] . "</td><td>" . $fila['curso'] . "</td><td>".$fila['itinerario']. "</td></tr>");
         }
       }
				?>
				</tbody>
			</table>
    
  </div>
</body>
</html>
