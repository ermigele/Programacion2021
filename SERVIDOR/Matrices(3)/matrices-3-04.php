<?php

/**
 * matrices-3-04.php
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
    Ordenar cartas.
    Matrices (3)
    Miguel Ángel Martín Martín
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Ordenar cartas</h1>

  <p>Actualice la página para mostrar una nueva mano.</p>

  <?php
  $num = rand(5, 10);

  $cartas = [];
  for ($i = 0; $i < $num; $i++) {
    $cartas[$i] = rand(127169, 127173);
  }

  print "<h2>Mano de $num cartas</h2>\n";
  print "  <p style=\"font-size: 600%; margin: 0\">\n";
  foreach ($cartas as $c) {
    print "    &#$c;\n";
  }
  print " </p>\n";
  print "\n";

  $cartaS = array_unique($cartas);
  sort($cartaS);

  print "  <h2>Cartas distintas obtenidas (ordenadas)</h2>\n";
  print "\n";
  print "  <p style=\"font-size: 600%; margin: 0\">\n";
  foreach ($cartaS as $ca) {
    print "    &#$c;\n";
  }
  print "  </p>\n";
  print "\n";

  $cartasT = array_count_values($cartas);

  print "  <h2>Número de cartas obtenidas (sin ordenar)</h2>\n";
  print "\n";
  print "  <p style=\"line-height: 600%;\">\n";
  foreach ($cartasT as $i => $v) {
    print "    <span style=\"font-size: 500%;\">$v</span> <span style=\"font-size: 600%;\">&#$i; - </span>\n";
  }
  print "  </p>\n";

  arsort($cartasT);

  print "<h2>Número de cartas obtenidas (ordenadas)</h2>\n";
  print "  <p style=\"line-height: 600%;\">\n";
  foreach ($cartasT as $i => $v) {
    print "    <span style=\"font-size: 500%;\">$v</span> <span style=\"font-size: 700%;\">&#$i; - </span>\n";
  }
  print "  </p>";
  ?>

  <footer>
    <p>Miguel Ángel Martín Martín</p>
  </footer>
</body>

</html>