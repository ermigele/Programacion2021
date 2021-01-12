<?php

/**
 * matrices-2-02.php
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
    Elimina valores repetidos.
    Matrices (2)
    Miguel Ángel Martín Martín
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Elimina valores repetidos</h1>

  <p>Actualice la página para mostrar un nuevo grupo de valores.</p>

  <?php

  $aleatorio = rand(5, 15);

  $bolas = [];
  for ($i = 0; $i < $aleatorio; $i++) {
    $bolas[$i] = rand(10102, 10111);
  }

  print "<h2> Entre estas $aleatorio bolas..</h2>";

  print " <p style=\"font-size: 400%; margin: 0;\">\n";
  foreach ($bolas as $b) {
    print " &#$b\n";
  }

  $restante = array_unique($bolas);
  print "<h2>... hay " . count($restante) . " bolas distinas</h2>";
  print " <p style=\"font-size: 400%; margin: 0;\">\n";
  foreach($restante as $r){
    print " &#$r\n";
  }


  ?>

  <footer>
    <p>Miguel Ángel Martín Martín</p>
  </footer>
</body>

</html>