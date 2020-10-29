<?php
/**
 * matrices-1-03.php
 *
 * @author Miguel Ángel Martín Martín
 *
 */
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Nombres de animales.
    Matrices (1)
    Miguel Ángel Martín Martín
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Nombres de animales</h1>

  <p>Actualice la página para mostrar un nuevo animal.</p>

<?php
$animal = ["ballena", "caballito-mar", "camello", "cebra", "elefante", "hipopotamo", "jirafa", "leon", "leopardo", "medusa", "mono", "oso", "oso-blanco", "pajaro", "pinguino", "rinoceronte", "serpiente", "tigre", "tortuga", "tortuga-marina"];
$aleatorio = rand(0, count($animal) - 1);

print "<img src=\"img/animales/$animal[$aleatorio].svg\" width=\"256\" height=\"200\" /> ";
print "<p><strong>$animal[$aleatorio]</strong></p>";

?>
  <footer>
    <p>Miguel Ángel Martín Martín</p>
  </footer>
</body>
</html>

