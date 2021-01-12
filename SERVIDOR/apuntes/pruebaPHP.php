<?php
echo "Mensaje<br>", "Otro mensaje<br>";
print "Hola<br>";


$suma = 1 + 51 + 18;
$resta = $suma - 22;


print "La resta es: " . $resta . "<br>";

$fec = date("d");

print "La fecha es: " . $fec . "<br>";

if ($fec < 15)
    print "La fecha está en la primera quincena del mes<br>";
else
    print "La fecha está en la segunda quincena del mes<br>";


$aletorio = rand(1, 999);

print "El número premiado de la loteria de hoy es el: " . $aletorio. "<br>";

if ($aletorio <= 9)
    print "El número es de una cifra <br>";
elseif ($aletorio < 99)
    print "El número es de dos cifras <br>";
else
    print "El número es de tres cifras  <br>";


$numeros = [12, 14, 16, 18];
print_r($numeros);
print "<br>";
$personas =[['nombre'=>'Juan', 'edad'=> 20, 'peso'=> 80], ['nombre'=>'Maria', 'edad'=> 28, 'peso'=> 60], ['nombre'=>'Pepe', 'edad'=> 39, 'peso'=> 76]];
print_r($personas);
print "<br>";
$arrayRango = range(2,20,2);
print_r($arrayRango);
?>
<hr>