<?php
session_start();
if (!isset($_SESSION["dados"])) {
  $_SESSION["dados"] = [0, 0, 0, 0, 0];
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Juego dados
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Juego dados</h1>
  <?php
  $dadosJ1 = [];
  $dadosJ2 = [];
  $puntosJ1 = 0;
  $puntosJ2 = 0;
  $dadoExtJ1 = 0;
  $dadoExtJ2 = 0;

  print("<h3>Dados del jugador 1</h3>");
  print("<p style=\"font-size: 400%; margin: 0;\">\n");
  for ($i = 0; $i < 6; $i++) {
    $dado = rand(1, 6);
    $dadosJ1[] = $dado;
    print "<img src=\"img/$dado.svg\"  width=\"100\" height=\"100\">\n";
  }
  print("</p>\n");

  $dadosUnicosJ1 = array_unique($dadosJ1);
  while (count($dadosUnicosJ1) < 4) {
    $dado = rand(1, 6);
    if (!in_array($dado, $dadosUnicosJ1)) {
      $dadoExtJ1++;
      $dadosUnicosJ1[] = $dado;
    }
  }

  print("<h3>Dados del jugador 2</h3>");
  print("<p style=\"font-size: 400%; margin: 0;\">\n");
  for ($i = 0; $i < 6; $i++) {
    $dado = rand(1, 6);
    $dadosJ2[] = $dado;
    print "<img src=\"img/$dado.svg\"  width=\"100\" height=\"100\">\n";
  }
  print("</p>\n");

  $dadosUnicosJ2 = array_unique($dadosJ2);
  while (count($dadosUnicosJ2) < 4) {
    $dado = rand(1, 6);
    if (!in_array($dado, $dadosUnicosJ2)) {
      $dadoExtJ2++;
      $dadosUnicosJ2[] = $dado;
    }
  }

  print("<h3>Dados únicos del jugador 1</h3>");
  print("<p style=\"font-size: 400%; margin: 0;\">\n");
  foreach ($dadosUnicosJ1 as $d) {
    $puntosJ1 += $d;
    print "<img src=\"img/$d.svg\"  width=\"100\" height=\"100\">\n";
  }
  print("</p>\n");

  print("<h3>Dados únicos del jugador 2</h3>");
  print("<p style=\"font-size: 400%; margin: 0;\">\n");
  foreach ($dadosUnicosJ2 as $d) {
    $puntosJ2 += $d;
    print "<img src=\"img/$d.svg\"  width=\"100\" height=\"100\">\n";
  }
  print("</p>\n");

  print("<h2>Puntuaciones:</h2>");
  print("<p>Puntuaciones de jugador 1: <strong>" . $puntosJ1 . "</strong></p>");
  print("<p>Puntuaciones de jugador 2: <strong>" . $puntosJ2 . "</strong></p>");
  if ($puntosJ1 == $puntosJ2) {
    print("<strong>El jugador 1 y jugador 2 han empatado</strong>");
  } else if ($puntosJ1 > $puntosJ2) {
    print("<strong>Ha ganador jugador 1</strong>");
    $_SESSION["dados"][1] += 1;
  } else {
    print("<strong>Ha ganador jugador 2</strong>");
    $_SESSION["dados"][2] += 1;
  }
  $_SESSION["dados"][0] += 1;
  $_SESSION["dados"][3] += $dadoExtJ1;
  $_SESSION["dados"][4] += $dadoExtJ2;

  print("<h2>Resumen:</h2>");
  print("<p>Número de veces que han jugado: <strong>" . $_SESSION["dados"][0] . "</strong>");
  print("<p>Número de veces que ha ganado el jugador 1: <strong>" . $_SESSION["dados"][1] . "</strong>");
  print("<p>Número de veces que ha ganado el jugador 2: <strong>" . $_SESSION["dados"][2] . "</strong>");
  print("<p>Número de veces que el jugador 1 ha sacado un dado extra: <strong>" . $_SESSION["dados"][3] . "</strong>");
  print("<p>Número de veces que el jugador 2 ha sacado un dado extra: <strong>" . $_SESSION["dados"][4] . "</strong>");
  ?>

</body>

</html>