<?php
session_start();
session_unset(); // Limpiar todas las variables de sesión
session_destroy(); // Destruir la sesión actual

// Redirigir al usuario a la página de inicio
header("Location: login.php");
exit();
?>
