<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>
    Alta de Alumnos
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<?php
            $conexion = new mysqli();
            $conexion->connect('localhost', 'root', '', 'ejemplo');
            $resultado = $conexion->query("SELECT * From cursos");
            $rows=$resultado->fetch_all(MYSQLI_NUM);
        ?>
    <form action="Base-de-datos(2)-01-2.php" method="post">

        <p><label>Nombre: <input type="text" name="nombre" value=""></label></p>
        
        <p><label>Apellidos: <input type="text" name="apellidos" value=""></label></p>
        
        <p><label>Correo electrónico: <input type="text" name="email" value=""></label></p>

        <label>Curso</label><select name="codigocurso">
        <?php
        foreach ($rows as $row){
            print "<option value=$row[0]>$row[1]</option>";
        }

        ?>
        
        </select>

        <p>
          <input type="submit" value="Enviar">
        </p>

</body>
</html>