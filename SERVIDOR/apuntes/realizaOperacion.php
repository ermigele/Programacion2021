 <?php
   function realizaOperacion($dato1, $dato2, $operacion)
   {
      $total = 0;
      switch ($operacion) {
         case "restar":
            $total = $dato1 - $dato2;
            break;
         case "multiplicacion":
            $total = $dato1 * $dato2;
            break;
         case "division":
            $total = $dato1 / $dato2;
            break;
         default: // sumar
            $total = $dato1 + $dato2;
            break;
      }
      return $total;
   }
   ?>