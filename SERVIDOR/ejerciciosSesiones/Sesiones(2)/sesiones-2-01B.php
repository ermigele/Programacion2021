<?php
session_start();
$opc = $_REQUEST["opc"];

switch ($opc) {
    case "SUBIR":
        $_SESSION["numero"] += 1;
        break;
    case "BAJAR":
        if ($_SESSION["numero"] > 0)
            $_SESSION["numero"] -= 1;
        break;
    default:
        $_SESSION["numero"] = 0;
        break;
}
header("Location: sesiones-2-01A.php");
