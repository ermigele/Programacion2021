<?php

/**
 * matrices-3-03.php
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
    Ordenar dados.
    Matrices (3). Sin formularios.
    Miguel Ángel Martín Martín
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Ordenar dados</h1>

  <p>Actualice la página para mostrar una nueva tirada.</p>

  <?php

  $num = rand(2, 7);

  $dados = [];
  for ($i = 0; $i < $num; $i++) {
    $dados[$i] = rand(1, 6);
  }

  print "  <h2>Tirada de $num dados</h2>\n";
  print "\n";
  print "  <p>\n";
  foreach ($dados as $dado) {
    print "    <img src=\"$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
  }
  print "  </p>\n";

  sort($dados);

  print "  <h2>Tirada ordenada</h2>\n";
  print "\n";
  print "  <p>\n";
  foreach ($dados as $dado) {
    print "    <img src=\"$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
  }
  print "  </p>";
  ?>

  <footer>
    <p>Miguel Ángel Martín Martín</p>
  </footer>
</body>

</html>