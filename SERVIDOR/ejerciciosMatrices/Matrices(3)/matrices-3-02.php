<?php

/**
 * matrices-3-02.php
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
    Cuenta corazones.
    Matrices (3)
    Miguel Ángel Martín Martín
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Cuenta corazones</h1>

  <p>Actualice la página para mostrar un nuevo grupo de corazones.</p>

  <?php

  $num = rand(7, 20);

  $corazones = [];
  for ($i = 0; $i < $num; $i++) {
    $corazones[$i] = rand(128147, 128152);
  }

  print "<h2>$num corazones</h2>\n";

  print "\n";
  print "  <p style=\"font-size: 200%; margin: 0;\">\n";
  foreach ($corazones as $c) {
    print "    &#$c;\n";
  }
  print " </p>\n";

  $total = array_count_values($corazones);

  print "  <h2>Conteo</h2>\n";
  print "\n";

  foreach ($total as $i => $v) {
    print " <p style=\"font-size: 200%; margin: 0;\">&#$i; $v</p>\n";
  }
  ?>

  <footer>
    <p>Miguel Ángel Martín Martín</p>
  </footer>
</body>

</html>