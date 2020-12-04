<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Récord de dados
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Récord de dados</h1>

  <?php
  if (isset($_SESSION['dados'])) {
    $dados = [];
    $dados = $_SESSION['dados'][0];
    foreach ($dados as $clave => $valor) {
      print("<img src='img/" . $valor . ".svg' />");
    }
  } else {
    $_SESSION['dados'] = [0, 0, 0];
    for ($i = 0; $i < 6; $i++) {
      print("<img src=\"img/1.svg\" />");
    }
  }
  print("<br />Número de veces que han salido todos los dados diferentes: " . $_SESSION['dados'][1]);
  print("<br /> <br />");
  print("Puntuación más alta: " . $_SESSION['dados'][2]);
  print("<br /> <br />");
  ?>

  <form action="ejercicio-02-02.php" method="post">
    <input type="submit" name="tirada" value="Sacar de nuevo dados" />
    <input type="submit" name="tirada" value="Volver a empezar" />

  </form>
</body>

</html>