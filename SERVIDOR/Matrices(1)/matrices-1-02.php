<?php

/**
 * matrices-1-02.php
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
    Animales.
    Matrices (1)
    Miguel Ángel Martín Martín
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Animales</h1>

  <p>Actualice la página para mostrar un nuevo animal.</p>

  <?php

  $animal = ["ballena.svg", "caballito-mar.svg", "camello.svg", "cebra.svg", "elefante.svg", "hipopotamo.svg", "jirafa.svg", "leon.svg", "leopardo.svg", "medusa.svg", "mono.svg", "oso.svg", "oso-blanco.svg", "pajaro.svg", "pinguino.svg", "rinoceronte.svg", "serpiente.svg", "tigre.svg", "tortuga.svg", "tortuga-marina.svg"];
  $aleatorio = rand(0, count($animal) - 1);
  print "<img src=\"img/animales/$animal[$aleatorio]\" width=\"256\" height=\"200\" /> ";
  ?>
  <footer>
    <p>Miguel Ángel Martín Martín</p>
  </footer>
</body>

</html>