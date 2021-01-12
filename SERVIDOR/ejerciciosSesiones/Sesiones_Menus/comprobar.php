<?php
    session_start();
    if(isset($_SESSION["nombre"]))
    print("La sesion es de: ".$_SESSION["nombre"]);
    else
    print("La sesion no está iniciada");
?>