<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Agrupa cartas repetidas
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Agrupa cartas repetidas</h1>
  <div>
    <?php
    $validado = true;
    if (!isset($_REQUEST['numero']) || empty($_REQUEST['numero'])) {
      print("<p>No se ha escrito el número de cartas.</p>");
      $validado = false;
    } else if ($_REQUEST['numero'] < 10 || $_REQUEST['numero'] > 30) {
      print("<p>El número de cartas a mostrar debe de ser entre 10 y 30</p>");
      $validado = false;
    } else {
      $num = $_REQUEST['numero'];
    }

    if (!isset($_REQUEST['palo']) || empty($_REQUEST['palo'])) {
      print("<p>No se ha seleccionado ningún palo.</p>");
      $validado = false;
    } else {
      $palo = $_REQUEST['palo'];
    }

    if ($validado) {
      $cartas = [];
      for ($i = 0; $i < $num; $i++)
        switch ($palo) {
          case "picas":
            $cartas[] = rand(127137, 127146);
            break;
          case "corazones":
            $cartas[] = rand(127153, 127162);
            break;
          case "diamantes":
            $cartas[] = rand(127169, 127178);
            break;
          case "tréboles":
            $cartas[] = rand(127185, 127194);
            break;
        }

      print("<h2>" . $num . " cartas del palo " . $palo . "</h2>");
      print("<p style=\"font-size: 400%; margin: 0;\">\n");
      foreach ($cartas as $clave => $valor)
        print("&#$valor");
      print("</p>\n");

      $total = array_count_values($cartas);
      krsort($total);
      arsort($total);

      print("<br /><h2>Número de cartas agrupadas (ordenada)</h2>");
      print("<p style=\"font-size: 400%; margin: 0;\">\n");
      foreach ($total as $clave => $valor) {
        print($valor . " - " . "&#$clave ");
      }
      print("</p>\n");
    }
    ?>
    <p>
      <a href="ejercicio-01-01.html">Volver</a>
    </p>
  </div>
</body>

</html>