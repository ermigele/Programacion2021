<?php

/**
 * matrices-2-01.php
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
    Elimina un valor.
    Matrices (2)
    Miguel Ángel Martín Martín
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Elimina un valor</h1>

  <p>Actualice la página para mostrar una nueva tirada.</p>

  <?php
  $dados = ["1.svg", "2.svg", "3.svg", "4.svg", "5.svg", "6.svg"];
  $aleTiradas = rand(1, 10);
  $dadoEliminar;

  print "<h2>Tirada de $aleTiradas dados</h2>";
  for ($i = 0; $i < $aleTiradas; $i++) {
    $aleDados = rand(0, 5);
    print "<img src=\"img/$dados[$aleDados]\" width=\"256\" height=\"200\" />\n";
  }

  print "<h2>Dados a eliminar</h2>";

  print "<h2>Dados restantes</h2>";
  ?>





  <footer>
    <p>Miguel Ángel Martín Martín</p>
  </footer>
</body>

</html>