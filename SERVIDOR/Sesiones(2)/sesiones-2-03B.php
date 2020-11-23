<?php
session_start();
$opc = $_REQUEST["opc"];

if ($opc == "Jugar") {
    if ($_SESSION["tragaperras"][0] > 0) {
        $_SESSION["tragaperras"][0] -= 1;
        header("Location: sesiones-2-03A.php?opc=" . $opc);
    } else {
        header("Location: sesiones-2-03A.php");
    }
} else {
    $_SESSION["tragaperras"][0] += 1;
    header("Location: sesiones-2-03A.php?opc=" . $opc);
}
