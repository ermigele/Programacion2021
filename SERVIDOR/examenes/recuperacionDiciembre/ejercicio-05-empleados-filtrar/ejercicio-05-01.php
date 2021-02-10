<?php
try {
	$mysql = 'mysql:host=localhost;dbname=dwes_dic2020';
	$usuario = 'root';
	$contrasena = '';
	$conexion = new PDO($mysql, $usuario, $contrasena);
} catch (PDOException $e) {
	print "<p>" . $e->getMessage() . "</p>";
}
$filtro = [];
$filtroDet = [];
if (!empty($_REQUEST['apellidos'])) {
	$filtro[] = "apellidos";
	$filtroDet[] = "Apellidos: " . $_REQUEST['apellidos'];
}

if (!empty($_REQUEST['salarioMinimo']) && !empty($_REQUEST['salarioMaximo'])) {
	$filtro[] = "salMin&salMax";
	$filtroDet[] = "Salario Mínimo: " . $_REQUEST['salarioMinimo'];
	$filtroDet[] = "Salario Máximo: " . $_REQUEST['salarioMaximo'];
} else {
	if (!empty($_REQUEST['salarioMinimo'])) {
		$filtro[] = "salMin";
		$filtroDet[] = "Salario Mínimo: " . $_REQUEST['salarioMinimo'];
	}

	if (!empty($_REQUEST['salarioMaximo'])) {
		$filtro[] = "salMax";
		$filtroDet[] = "Salario Máximo: " . $_REQUEST['salarioMaximo'];
	}
}

if (isset($_REQUEST['hijos']) && strlen($_REQUEST['hijos'])) {
	$filtro[] = "hijos";
	$filtroDet[] = "Número de hijos: " . $_REQUEST['hijos'];
}

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
				<p><label>Apellidos <input type="text" name="apellidos"></label></p>
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

		<?php
		if (count($filtroDet) > 0) {
			print("<h2>Criterios de búsqueda:</h2>");
			print("<ul>");
			for ($i = 0; $i < count($filtroDet); $i++)
				print("<li>" . $filtroDet[$i] . "</li>");
			print("</ul>");
		}
		$sql = "SELECT e.nombre as nombre, e.apellidos as apellidos, e.salario as salario, e.hijos as hijos, p.nacionalidad as nacionalidad, d.nombre as departamento, c.nombre as centro FROM centros c INNER JOIN departamentos d ON c.id=d.centro INNER JOIN empleados e ON d.id=e.departamento INNER JOIN paises p ON p.id=e.nacionalidad";
		if (count($filtro) > 0) {
			$sql = $sql . " WHERE ";
			$i = 0;
			while ($i < count($filtro)) {
				switch ($filtro[$i]) {
					case "apellidos":
						$sql = $sql . " apellidos LIKE '%" . $_REQUEST['apellidos'] . "%'";
						break;
					case "salMin":
						$sql = $sql . " salario > " . $_REQUEST['salarioMinimo'];
						break;
					case "salMax":
						$sql = $sql . " salario < " . $_REQUEST['salarioMaximo'];
						break;
					case "salMin&salMax":
						$sql = $sql . " salario BETWEEN " . $_REQUEST['salarioMinimo'] . " AND " . $_REQUEST['salarioMaximo'];
						break;
					case "hijos":
						$sql = $sql . " hijos=" . $_REQUEST['hijos'];
						break;
				}
				$i++;
				if ($i < count($filtro))
					$sql = $sql . " AND ";
			}
		}
		$consulta = $conexion->query($sql);
		if ($consulta->rowCount() < 1) {
			print("<p>No hay registros con los criterios de búsqueda introducidos.</p>");
		} else {
		?>
			<table border="1.5">
				<thead>
					<th>Nombre</th>
					<th>Apellidos</th>
					<th>Salario</th>
					<th>Hijos</th>
					<th>Nacionalidad</th>
					<th>Departamento</th>
					<th>Centro</th>
				</thead>
				<tbody>
				<?php

				while ($fila = $consulta->fetch(PDO::FETCH_ASSOC)) {
					print("<tr><td>" . $fila['nombre'] . "</td><td>" . $fila['apellidos'] . "</td><td>" . $fila['salario'] . "</td><td>" . $fila['hijos'] . "</td>");
					print("<td>" . $fila['nacionalidad'] . "</td><td>" . $fila['departamento'] . "</td><td>" . $fila['centro'] . "</td></tr>");
				}
			}
				?>
				</tbody>
			</table>

	</form>
</body>

</html>