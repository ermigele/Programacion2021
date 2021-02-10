<?php
session_start();
session_destroy();

if(isset($_SESSION["nombre"])){
    print("La sesion ha finalizado");
}
?>