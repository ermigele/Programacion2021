<?php

/**
 * matrices-1-01.php
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
    Dado.
    Matrices (1).
    Miguel Ángel Martín Martín
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Dado</h1>

  <p>Actualice la página para mostrar una nueva tirada.</p>

  <?php

  $dado = ["1.svg", "2.svg", "3.svg", "4.svg", "5.svg", "6.svg"];
  $num = ["uno", "dos", "tres", "cuatro", "cinco", "seis"];

  $aleatorio = rand(0, 5);

  ?>
  <img src="img/<?php echo $dado[$aleatorio]; ?>" width="256" height="200" />
  <p><strong>He sacado un <?php echo $num[$aleatorio]; ?> </strong></p>

  <footer>
    <p>Miguel Ángel Martín Martín</p>
  </footer>
</body>

</html>