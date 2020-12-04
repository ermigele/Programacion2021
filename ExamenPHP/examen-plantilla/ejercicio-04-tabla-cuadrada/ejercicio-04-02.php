<?php
if (!isset($_REQUEST['numCasillas']) || $_REQUEST['numCasillas'] > 15 || $_REQUEST['numCasillas'] < 1)
  header("Location: ejercicio-04-01.php");
$num = $_REQUEST['numCasillas'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>
    Tabla cuadrada con casillas de verificación
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1>Tabla cuadrada con casillas de verificación</h1>
  <h3>Marque las casillas de verificación que quiera y contaré cuántas ha marcado.</h3>
  <form action="ejercicio-04-03.php" method="post">
    <table border="1.5">
      <?php
      $cont = 1;
      for ($i = 0; $i < $num; $i++) {
        print("<tr>");
        for ($j = 1; $j <= $num; $j++) {
          print("<td><input type=\"checkbox\" name=\"casillas[]\" value=\"$cont\" />" .  $cont . "</td>");
          $cont++;
        }
        print("</tr>");
      }
      print("<input type=\"hidden\" name=\"numCasillas\" value=\"$num\" />");
      ?>
    </table>
    <br /> <br />
    <input type="submit" value="Contar" />
  </form>
</body>

</html>