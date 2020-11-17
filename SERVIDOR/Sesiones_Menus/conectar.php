<?php
   session_start();
   $_SESSION["nombre"] = "Miguel Angel";
   print "<p>El nombre es $_SESSION[nombre]</p>";
?>