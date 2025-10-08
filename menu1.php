<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <body>
        <div>
            <a href="noticias.php" style="color:white; text-decoration:none; font-weight:bold;">NOTICIAS</a>
            <b><span style="color:gray;">|</span></b>
            <a href="eventos.php" style="color:white; text-decoration:none; font-weight:bold;">EVENTOS</a>
            <b><span style="color:gray;">|</span></b>
            <a href="esportes.php" style="color:white; text-decoration:none; font-weight:bold;">ESPORTES</a>
            <b><span style="color:gray;">|</span></b>
            <a href="cursos.php" style="color:white; text-decoration:none; font-weight:bold;">CURSOS</a>
            <b><span style="color:gray;">|</span></b>
            <a href="sujestões.php" style="color:white; text-decoration:none; font-weight:bold;">SUSJESTÕES</a>
        </div>
    </body>
</html>