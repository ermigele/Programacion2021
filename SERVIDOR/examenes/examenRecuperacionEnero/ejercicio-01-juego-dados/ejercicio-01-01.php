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
  $dadosPar = [];
  $dadosImpar = [];
  $puntosExtJ1 = 0;
  $puntosExtJ2 = 0;

  print("<h3>Dados del jugador 1</h3>");
  print("<p style=\"font-size: 400%; margin: 0;\">\n");
  for ($i = 0; $i < 6; $i++) {
    $dado = rand(1, 6);
    $dadosJ1[] = $dado;
    $puntosJ1 = $puntosJ1+ $dado;
    print "<img src=\"img/$dado.svg\"  width=\"100\" height=\"100\">\n";
  }
  print("</p>\n");

  $dadosUnicosJ1 = array_unique($dadosJ1);
  if(count($dadosUnicosJ1) == 6){
    $puntosExtJ1=3;
  }else{
    foreach($dadosJ1 as $valor){
      if($valor == 2 ||$valor == 4 || $valor == 6 )
        $dadosPar[] = $valor;
      if($valor == 1 ||$valor == 3 || $valor == 5 )
        $dadosImpar[] = $valor;
    }

    if(count($dadosPar) > 2){
      $puntosExtJ1 = $puntosExtJ1 +1;
    }

    if(count($dadosImpar) > 2 ){
      $puntosExtJ1 = $puntosExtJ1 +1;
    }
  }
  $dadosPar = [];
  $dadosImpar = [];

  print("<h3>Dados del jugador 2</h3>");
  print("<p style=\"font-size: 400%; margin: 0;\">\n");
  for ($i = 0; $i < 6; $i++) {
    $dado = rand(1, 6);
    $dadosJ2[] = $dado;
    $puntosJ2 = $puntosJ2+ $dado;
    print "<img src=\"img/$dado.svg\"  width=\"100\" height=\"100\">\n";
  }
  print("</p>\n");

  $dadosUnicosJ2 = array_unique($dadosJ2);
  if(count($dadosUnicosJ2) == 6){
    $puntosExtJ2=3;
  }else{
    foreach($dadosJ2 as $valor){
      if($valor == 2 ||$valor == 4 || $valor == 6 )
        $dadosPar[] = $valor;
      if($valor == 1 ||$valor == 3 || $valor == 5 )
        $dadosImpar[] = $valor;
    }

    if(count($dadosPar) > 2){
      $puntosExtJ2 = $puntosExtJ2 +1;
    }

    if(count($dadosImpar) > 2 ){
      $puntosExtJ2 = $puntosExtJ2 +1;
    }
  }
  $puntosJ1 =  $puntosJ1 + $puntosExtJ1;
  $puntosJ2 =  $puntosJ2 + $puntosExtJ2;

  print("<h2>Puntuaciones:</h2>");
  print("<p>Puntuaciones de jugador 1: <strong>" . $puntosJ1 . "</strong></p>");
  print("<p>Puntuaciones de jugador 2: <strong>" . $puntosJ2 . "</strong></p>");
  if ($puntosJ1 == $puntosJ2) {
    print("<strong>El jugador 1 y jugador 2 han empatado</strong>");
  } else if ($puntosJ1 > $puntosJ2) {
    print("<strong>Ha ganado jugador 1</strong>");
    $_SESSION["dados"][1] += 1;
  } else {
    print("<strong>Ha ganado jugador 2</strong>");
    $_SESSION["dados"][2] += 1;
  }
  $_SESSION["dados"][0] += 1;
  $_SESSION["dados"][3] += $puntosExtJ1;
  $_SESSION["dados"][4] += $puntosExtJ2;

  print("<h2>Resumen:</h2>");
  print("<p>Número de veces que han jugado: <strong>" . $_SESSION["dados"][0] . "</strong>");
  print("<p>Número de veces que ha ganado el jugador 1: <strong>" . $_SESSION["dados"][1] . "</strong>");
  print("<p>Número de veces que ha ganado el jugador 2: <strong>" . $_SESSION["dados"][2] . "</strong>");
  print("<p>Número de veces que el jugador 1 ha obtenido puntuación extra: <strong>" . $_SESSION["dados"][3] . "</strong>");
  print("<p>Número de veces que el jugador 2 ha obtenido puntuación extra: <strong>" . $_SESSION["dados"][4] . "</strong>");
  ?>
</body>
</html>
