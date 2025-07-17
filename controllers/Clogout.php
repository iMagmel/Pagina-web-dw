<?php
session_start();
session_destroy();
header("Location: /Pagina-web-dw/controllers/Clogin.php");
exit();
?>