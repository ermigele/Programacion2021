<?php


  print "<p>Ejercicio incompleto</p>";


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Empresa - Empleados
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Listado de Empleados</h1>
  <div style="margin-bottom: 1em">
  	<fieldset style="width:50%">
  		<legend>Filtrado</legend>
  		<form name="filtrar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  			<p><label>Salario mínimo <input type="number" name="salarioMinimo" min="0"></label>
  			<label>Salario Máximo <input type="number" name="salarioMaximo" min="0"></label>
  			</p>
  			<p>Hijos: <select name="hijos">
  				<option value="">Seleccione el número de hijos</option>
  				<option value="0">0</option>
  				<option value="1">1</option>
  				<option value="2">2</option>
  				<option value="3">3</option>
  				<option value="4">4</option>
  			</select>
  			</p>
  			<input type="submit" value="Filtrar">
  		</form>
  	</fieldset>
  </div>
  <form action="ejercicio-04-02.php" method="POST">


    <!--  ESCRIBA AQUI EL CÓDIGO HTML Y/O PHP NECESARIO -->


  </form>
</body>
</html>
