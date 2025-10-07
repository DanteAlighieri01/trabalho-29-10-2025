<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
        echo "<a href='ouvidoria.php' style='color:gray;text-decoration:none;font-weight:bold;'>OUVIDORIA</a>";
        echo "<b><font color='gray'> | </font></b>";
        echo "<a href='avisos.php' style='color:gray;text-decoration:none;font-weight:bold;'>QUADRO DE AVISOS</a>";
        echo "<b><font color='gray'> | </font></b>";
        echo "<a href='eventos.php' style='color:gray;text-decoration:none;font-weight:bold;'>EVENTOS</a>";
        echo "<b><font color='gray'> | </font></b>";
        echo "<a href='esportes.php' style='color:gray;text-decoration:none;font-weight:bold;'>ESPORTES</a>";
        echo "<b><font color='gray'> | </font></b>";
?>