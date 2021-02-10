<?php
/**
 * matrices-3-01.php
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
    Busca emoticono.
    Matrices (3)
    Miguel Ángel Martín Martín
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Busca emoticono</h1>

  <p>Actualice la página para mostrar un nuevo grupo de emoticonos.</p>

 <?php
 $num= rand(10, 20);
 
 $emoti = [];
 for ($i = 0; $i < $num; $i++) {
     $emoti[$i] = rand(128512, 128580);
 }
 
 print "  <h2>$num emoticonos ...</h2>\n";
 print "  <p style=\"font-size: 200%; margin: 0;\">\n";
 foreach ($emoti as $e) {
     print "&#$e;\n";
 }
 print "  </p>\n";
 
 $buscar = rand(128512, 128580);
 if (in_array($buscar, $emoti)) {
   print "  <p>El emoticono <span style=\"font-size: 200%;\">&#$buscar;</span> está entre ellos.</p>\n";
 } else {
   print "  <p>El emoticono <span style=\"font-size: 200%;\">&#$buscar;</span> NO está entre ellos.</p>\n";
 }
 ?>

  <footer>
    <p>Miguel Ángel Martín Martín</p>
  </footer>
</body>
</html>
