<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Cuenta cartas
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Cuenta cartas</h1>

  <?php

  if (!isset($_POST['numCartas']) && !isset($_POST['paridad'])  && !isset($_POST['palo'])) {
    print("Se ha accededio a la página sin pasar por el formulario");
  } else {
    $validado = true;
    if (empty($_POST['numCartas']) || empty($_POST['paridad']) || empty($_POST['palo'])) {
      $validado = false;
      if (empty($_POST['numCartas']))
        print("No ha escrito el número de cartas. <br />");

      if (empty($_POST['paridad']))
        print("No se ha seleccionado ninguna paridad <br />");

      if (empty($_POST['palo']))
        print("No se ha seleccionado ningún palo. <br />");
    } else {
      $num = $_POST['numCartas'];
      $paridad = $_POST['paridad'];
      $palo = $_POST['palo'];

      if ($num < 5 || $num > 20) {
        print("El número escrito para las cartas debe ser de entre 5 y 20 <br />");
        $validado = false;
      }
      if ($palo == "palo") {
        print("Se debe seleccionar un tipo de palo de cartas <br />");
        $validado = false;
      }
    }

    if ($validado) {
      print("<h2>" . $num . " cartas del palo " . $palo . "</h2>");
      $cartas = [];
      for ($i = 0; $i < $num; $i++) {
        switch ($palo) {
          case "corazones":
            $c = rand(127137, 127146);
            break;
          case "diamantes":
            $c = rand(127153, 127162);
            break;
          case "picas":
            $c = rand(127169, 127178);
            break;
          case "trebol":
            $c = rand(127185, 127194);
            break;
        }
        print("<span style=\"font-size: 600%; margin: 0\"> &#$c </span>");
        array_push($cartas, $c);
      }
      $cartasParImpar = [];

      foreach ($cartas as $clave => $valor) {
        $parImpar = $valor % 2;
        if ($paridad == "par" && $parImpar == 0) {
          array_push($cartasParImpar, $valor);
        } else if ($paridad == "impar" &&  $parImpar != 0) {
          array_push($cartasParImpar, $valor);
        }
      }
      print("<h2>Hay " . count($cartasParImpar) . " cartas " . $paridad . "es del palo " . $palo . "</h2>");
      foreach ($cartasParImpar as $clave => $valor) {
        print("<span style=\"font-size: 600%; margin: 0\"> &#$valor </span>");
      }

      $cartasUnicas = array_unique($cartasParImpar);
      print("<h2>Hay " . count($cartasUnicas) . " cartas " . $paridad . "es distintas del palo " . $palo . "</h2>");
      foreach ($cartasUnicas as $clave => $valor) {
        print("<span style=\"font-size: 600%; margin: 0\"> &#$valor </span>");
      }
    }
  }
  ?>

</body>

</html>